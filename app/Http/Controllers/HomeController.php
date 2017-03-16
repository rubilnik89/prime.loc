<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
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
        if (empty($user->accounts[1])) {
            $investor = 'Не существует';
        } else {
            $investor = $user->accounts[1]->number;
        }

        return view('home', compact('user', 'investor'));
    }

    public function investorAccount($id)
    {
        $user = User::find($id);
        $investorAccount = array();
        if (empty($user->accounts[1])) {
            $investorAccount[0] = 'Не существует';
            $investorAccount[1] = 'Не существует';
            $investorAccount[2] = 'Не существует';
        } else {
            $investorAccount[0] = $user->accounts[1]->number;
            $investorAccount[1] = $user->accounts[1]->created_at;
            $investorAccount[2] = $user->accounts[1]->updated_at;
        }
        return view('homeInvestor', compact('user', 'investorAccount'));
    }

    public function personalAccount($id)
    {
        $user = User::find($id);
        $personalAccount = User::find($id)->accounts()->where('type_id', 1)->first();
        return view('homePersonal', compact('user', 'personalAccount'));
    }
}
