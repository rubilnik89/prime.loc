<?php

namespace App\Http\Controllers;

use App\Account;
use App\Country;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function main()
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $countries = Country::orderBy('name', 'asc')->get();
        $columns = User::$columns;
        if (!empty(Input::get('search'))) {

            $users = $this->usersWithSearch($sortby, $order);
            Input::flash();

            return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order'));
        } else if ($sortby && $order) {
            $users = User::orderBy($sortby, $order)->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order'));
    }

    public function usersWithSearch($sortby, $order)
    {
        if ($sortby && $order) {
            return $users = User::searchValue('name', Input::get('name'))
                ->searchValue('surname', Input::get('surname'))
                ->searchValue('phone', Input::get('phone'))
                ->searchValue('email', Input::get('email'))
                ->searchCountry(Input::get('country'))
                ->orderBy($sortby, $order)
                ->paginate(5);
        } else {
            return $users = User::searchValue('name', Input::get('name'))
                ->searchValue('surname', Input::get('surname'))
                ->searchValue('phone', Input::get('phone'))
                ->searchValue('email', Input::get('email'))
                ->searchCountry(Input::get('country'))
                ->paginate(5);
        }
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin/user', compact('user'));
    }

    public function accounts()
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $columns = Account::$accountColumns;
        $countries = Country::orderBy('name', 'asc')->get();

        if (!empty(Input::get('search'))) {

            $accounts = $this->accountsWithSearch($sortby, $order);
            Input::flash();

            return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts'));

        } else $accounts = $this->accountsWithoutSearch($sortby, $order);

        return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts'));
    }

    public function accountsWithoutSearch($sortby, $order)
    {
        if ($sortby == 'name' || $sortby == 'email' || $sortby == 'phone') {
            $users = User::orderBy($sortby, $order)->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            return $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(5);
        } else if ($sortby && $order) {
            return $accounts = Account::with('user', 'account_type')->orderBy($sortby, $order)->paginate(5);
        } else {
            return $accounts = Account::with('user', 'account_type')->paginate(5);
        }
    }

    public function accountsWithSearch($sortby, $order)
    {
        if (Input::get('name') != null || Input::get('email') != null || Input::get('phone') != null) {

            return $accounts = $this->searchAccountsByUsersFields($sortby, $order);

        } else if ($sortby == 'name' || $sortby == 'phone' || $sortby == 'email') {

            return $accounts = $this->sortAccountsByUsersFieldsWithSearch($sortby, $order);

        } else if ($sortby && $order) {
            return $accounts = Account::searchValue('number', Input::get('account'))
                ->searchValue('type_id', Input::get('type'))
                ->searchBalance(Input::get('from'), Input::get('to'))
                ->with('user', 'account_type')
                ->orderBy($sortby, $order)
                ->paginate(3);
        } else {
            return $accounts = Account::searchValue('number', Input::get('account'))
                ->searchValue('type_id', Input::get('type'))
                ->searchBalance(Input::get('from'), Input::get('to'))
                ->with('user', 'account_type')
                ->paginate(3);
        }
    }

    public function searchAccountsByUsersFields($sortby, $order)
    {
        if ($sortby && $order) {
            $users = User::searchValue('name', Input::get('name'))
                ->searchValue('phone', Input::get('phone'))
                ->searchValue('email', Input::get('email'))
                ->orderBy($sortby, $order)
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        } else {
            $users = User::searchValue('name', Input::get('name'))
                ->searchValue('phone', Input::get('phone'))
                ->searchValue('email', Input::get('email'))
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        }
        return $accounts;
    }

    public function sortAccountsByUsersFieldsWithSearch($sortby, $order)
    {
        $users = User::orderBy($sortby, $order)->get();
        $ids = [];
        foreach ($users as $index => $user) {
            $ids[$index] = $user->id;
        }
        $accounts = Account::whereIn('user_id', $ids)
            ->searchValue('number', Input::get('account'))
            ->searchValue('type_id', Input::get('type'))
            ->searchBalance(Input::get('from'), Input::get('to'))
            ->with('user', 'account_type')
            ->orderBy('user_id', $order)
            ->paginate(3);
        return $accounts;
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
