<?php

namespace App\Http\Controllers;


use App\models\Account;
use App\models\Tarif;
use App\models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user/home', compact('user'));
    }

    public function accounts()
    {
        $user = Auth::user();
        return view('user/userAccounts', compact('user'));
    }

    public function personal()
    {
        $accounts = Auth::user()->accounts()->where('type_id', '1')->get();
        return view('user/userPersonal', compact('accounts'));
    }

    public function investor()
    {
        $accounts = Auth::user()->accounts()->where('type_id', '2')->get();
        return view('user/userInvestor', compact('accounts'));
    }

    public function moneyTransfer()
    {
        $accounts = Auth::user()->accounts;
        return view('user/moneyTransfer', compact('accounts'));
    }

    public function transfer(Request $request)
    {

        $user = Auth::user();
        if ($request->from && $request->to && $request->sum) {
            DB::beginTransaction();
            try {
                $accountFrom = Account::find($request->from);
                $accountTo = Account::find($request->to);
                if ($request->sum < 0){
                    return redirect()->route('moneyTransfer', $user->id)->with('less0', 'Сумма должна быть больше нуля');
                }
                $balanceFrom = $accountFrom->balance - $request->sum;
                if ($balanceFrom < 0) {
                    return redirect()->route('moneyTransfer', $user->id)->with('noMoney', 'На счету недостаточно средств для проведения этой транзакции');
                }
                Account::where('id', $request->from)
                    ->where('balance', '>=', $request->sum)
                    ->update(['balance' => DB::raw('balance -'. $request->sum)]);
                Account::where('id', $request->to)
                    ->update(['balance' => DB::raw('balance +'. $request->sum)]);
                Transaction::create(['user_id' => $user->id,
                    'account_id_from' => $accountFrom->number,
                    'account_id_to' => $accountTo->number,
                    'amount' => $request->sum,
                    'type' => 1,
                    'status' => true]);

                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                return redirect()->route('moneyTransfer', $user->id)->with('success', 'Everything went great');
            } else return redirect()->route('moneyTransfer', $user->id)->with('noSuccess', 'Чтото пошло не так, повторите попытку еще раз');
        }
        return redirect()->route('moneyTransfer', $user->id)->with('fail', 'Please, check your input');
    }

    public function accountTransactions($id, $number)
    {
        $user = Auth::user();
        $transactions = $user->transactions()
            ->where('account_id_from', $number)
            ->orWhere('account_id_to', $number)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user/userAccountTransactions', compact('user', 'transactions'));
    }

    public function transactions()
    {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();

        return view('user/userTransactions', compact('transactions', 'user'));
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();

        if($request->editUser) {

            $user->update([
                'name' => $request->name ?: $user->name,
                'surname' => $request->surname ?: $user->surname,
                'phone' => $request->phone ?: $user->phone,
            ]);

            return redirect()->route('home');
        }
        return view('user/editForm', compact('user'));
    }

    public function addAccount(Request $request)
    {
        $user = Auth::user();

        if($request->addtarif) {

            Session::forget('SelectTarif');
            $personal = $user->accounts()->where('type_id', 1)->first();
            Session::flash('Transfer', 'Перевод средств');
            $tarifs_id = $request->tarif;
            return view('user/addAccount', compact('personal', 'user', 'tarifs_id'));
        }

        if($request->transfer){
            $personal = $user->accounts()->where('type_id', 1)->first();

            if ($request->sum <= $personal['balance']){

                DB::beginTransaction();
                try {

                    Account::where('id', $personal['id'])
                        ->where('balance', '>=', $request->sum)
                        ->update(['balance' => DB::raw('balance -'. $request->sum)
                        ]);

                    $new = Account::create([
                        'number' => (DB::table('accounts')->max('number') + 1),
                        'user_id' => $user->id,
                        'type_id' => 2,
                        'balance' => $request->sum,
                        'tarif_id' => $request->tarifs_id,
                        ]);

                    Transaction::create(['user_id' => $user->id,
                        'account_id_from' => $personal['number'],
                        'account_id_to' => $new->number,
                        'amount' => $request->sum,
                        'type' => 1,
                        'status' => 1,
                        ]);

                    DB::commit();
                    $success = true;
                } catch (\Exception $e) {
                    $success = false;
                    DB::rollback();
                }
                if ($success) {
                    Session::flash('addedAccount', 'Счет создан успешно!');
                    return view('user/userAccounts', compact('user'));
                }
            } else {
                Session::flash('noMoney', 'На счету недостаточно средств, пополните свой лицевой счет!');
                return view('user/userAccounts', compact('user'));
            }
        }

        $tarifs = Tarif::where('enabled', 1)->get();
        Session::flash('SelectTarif', 'Выбор тарифа');

        return view('user/addAccount', compact('user', 'tarifs'));
    }
}
