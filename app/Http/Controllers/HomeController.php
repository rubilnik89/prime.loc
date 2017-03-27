<?php

namespace App\Http\Controllers;


use App\Account;
use App\Tarif;
use App\Transaction;
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
        return view('home', compact('user'));
    }

    public function accounts()
    {
        $accounts = Auth::user()->accounts;
        return view('userAccounts', compact('accounts'));
    }

    public function moneyTransfer()
    {
        $accounts = Auth::user()->accounts;
        return view('moneyTransfer', compact('accounts'));
    }

    public function transfer(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        if ($data['from'] && $data['to'] && $data['sum']) {
            DB::beginTransaction();
            try {
                $accountFrom = Account::find($data['from']);
                $accountTo = Account::find($data['to']);
                if ($data['sum'] < 0){
                    return redirect()->route('moneyTransfer', $user->id)->with('less0', 'Сумма должна быть больше нуля');
                }
                $balanceFrom = $accountFrom->balance - $data['sum'];
                if ($balanceFrom < 0) {
                    return redirect()->route('moneyTransfer', $user->id)->with('noMoney', 'На счету недостаточно средств для проведения этой транзакции');
                }
                Account::where('id', $data['from'])
                    ->where('balance', '>=', $data['sum'])
                    ->update(['balance' => DB::raw('balance -'. $data['sum'])]);
                Account::where('id', $data['to'])
                    ->update(['balance' => DB::raw('balance +'. $data['sum'])]);
                Transaction::create(['user_id' => $user->id,
                    'account_id_from' => $accountFrom->number,
                    'account_id_to' => $accountTo->number,
                    'amount' => $data['sum'],
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

        return view('userAccountTransactions', compact('user', 'transactions'));
    }

    public function transactions()
    {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();

        return view('userTransactions', compact('transactions', 'user'));
    }

    public function editForm()
    {
        $user = Auth::user();
        return view('editForm', compact('user'));
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $user->update([
            'name' => $data['name'] ?: $user->name,
            'surname' => $data['surname'] ?: $user->surname,
            'phone' => $data['phone'] ?: $user->phone,
        ]);

        return redirect()->route('home');
    }

    public function addAccount(Request $request)
    {
        $user = Auth::user();

        if($request->addtarif) {

            Account::create([
                'number' => (DB::table('accounts')->max('number') + 1),
                'user_id' => $user->id,
                'type_id' => 2,
                'balance' => 0,
                'tarif_id' => $request->tarif,
            ]);
            Session::flash('addedAccount', 'Счет создан успешно!');
            $accounts = $user->accounts;
            return view('userAccounts', compact('accounts'));
        }
        $tarifs = Tarif::all();

        return view('addAccount', compact('user', 'tarifs'));
    }
}
