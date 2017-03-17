<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;

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
        $accounts = [];
        foreach ($user->accounts as $index => $account){
            if ($account->type_id == "2"){
                $accounts[$index] = $account;
            }
        }
        return view('userAccounts', compact('user', 'accounts'));
    }
}
