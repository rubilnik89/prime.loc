<?php

namespace App\Http\Controllers;

use App\Account;
use App\Country;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main(Request $request)
    {

        $sortby = $request->sortby;
        $order = $request->order;

        $countries = Country::orderBy('name', 'asc')->get();
        $columns = User::$columns;

        $query = User::select();

        $oldCountry = Country::where('country_id', $request->country)->first();
        $oldCountry = $oldCountry ? $oldCountry->name : '';

        if ($request->search) {
            $query->searchValue('name', $request->name)
                ->searchValue('surname', $request->surname)
                ->searchValue('phone', $request->phone)
                ->searchValue('email', $request->email)
                ->searchCountry($request->country);
            $request->flash();
        }

        if ($sortby) {
            $query->orderBy($sortby, $order);
        }

        $users = $query->paginate(PER_PAGE);

        return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order', 'oldCountry'));

    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin/user', compact('user'));
    }

    public function accounts(Request $request)
    {
        $sortby = $request->sortby;
        $order = $request->order;

        $columns = Account::$accountColumns;
        $countries = Country::orderBy('name', 'asc')->get();

        $query = Account::select();

        if ($request->search) {

            if ($request->name != null || $request->email != null || $request->phone != null) {

                $users = User::searchValue('name', Input::get('name'))
                    ->searchValue('phone', Input::get('phone'))
                    ->searchValue('email', Input::get('email'))
                    ->get();
                $ids = [];
                foreach ($users as $index => $user) {
                    $ids[$index] = $user->id;
                }
                $query->whereIn('user_id', $ids);
                $request->flash();;

            } else {
                $query->searchValue('number', Input::get('account'))
                    ->searchValue('type_id', Input::get('type'))
                    ->searchBalance(Input::get('from'), Input::get('to'));
                $request->flash();
            }
        }

        if($sortby){
            if($sortby == 'name' || $sortby == 'email' || $sortby == 'phone'){
                $users = User::orderBy($sortby, $order)->get();
                $ids = [];
                foreach ($users as $index => $user) {
                    $ids[$index] = $user->id;
                }
                $query->whereIn('user_id', $ids)
                    ->orderBy('user_id', $order);
            } else {
                $query->orderBy($sortby, $order);
            }
        }

        $accounts = $query->with('user', 'account_type')->paginate(PER_PAGE);

        return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts'));
    }

    public function userAccounts($id)
    {
        $accounts = Account::where('user_id', $id)->get();
        return view('admin/userAccounts', compact('accounts'));
    }

    public function userAccountTransactions($id, $number)
    {
        $user = User::find($id);
        $transactions = $user->transactions()
            ->where('account_id_from', $number)
            ->orWhere('account_id_to', $number)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin/userTransactions', compact('user', 'transactions'));
    }

}
