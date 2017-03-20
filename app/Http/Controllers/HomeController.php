<?php

namespace App\Http\Controllers;


use App\Account;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function accounts($id)
    {
        $user = User::with('accounts')->find($id);

        return view('userAccounts', compact('user'));
    }

    public function moneyTransfer($id)
    {
        $user = User::with('accounts')->find($id);

        return view('moneyTransfer', compact('user'));
    }

    public function transfer($id, Request $request)
    {
        $data = $request->all();

        $user = User::find($id);
        if ($data['from'] && $data['to'] && $data['sum']) {
            DB::beginTransaction();
            try {
                $accountFrom = Account::where('number', $data['from'])->first();
                $accountTo = Account::where('number', $data['to'])->first();
                $balanceFrom = $accountFrom->balance - $data['sum'];
                if ($balanceFrom < 0){
                    return redirect()->route('moneyTransfer', $user->id)->with('noMoney', 'На счету недостаточно средств для проведения этой транзакции');
                }
                $balanceTo = $accountTo->balance + $data['sum'];

                Account::where('number', $data['from'])
                ->update(['balance' => $balanceFrom]);

                Account::where('number', $data['to'])
                    ->update(['balance' => $balanceTo]);
                Transaction::create(['user_id' => $user->id,
                'account_id_from' => $accountFrom->number,
                'account_id_to' => $accountTo->number,
                'amount' => $data['sum']]);

                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                return redirect()->route('moneyTransfer', $user->id)->with('success', 'Everything went great');
            }
        }
        return redirect()->route('moneyTransfer', $user->id)->with('fail', 'Please, check your input');
    }
}
