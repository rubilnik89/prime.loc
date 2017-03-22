<?php

namespace App\Http\Controllers;

use App\Account;
use App\Country;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function isEmptyData(array $data)
    {
        !empty($data['country']) ? $data['country'] = $data['country'] : $data['country'] = null;
        !empty($data['name']) ? $data['name'] = $data['name'] : $data['name'] = null;
        !empty($data['surname']) ? $data['surname'] = $data['surname'] : $data['surname'] = null;
        !empty($data['phone']) ? $data['phone'] = $data['phone'] : $data['phone'] = null;
        !empty($data['email']) ? $data['email'] = $data['email'] : $data['email'] = null;
        !empty($data['sortby']) ? $data['sortby'] = $data['sortby'] : $data['sortby'] = null;
        !empty($data['type']) ? $data['type'] = $data['type'] : $data['type'] = null;
        !empty($data['account']) ? $data['account'] = $data['account'] : $data['account'] = null;
        !empty($data['from']) ? $data['from'] = $data['from'] : $data['from'] = null;
        !empty($data['to']) ? $data['to'] = $data['to'] : $data['to'] = null;
        return $data;
    }

    public function main(Request $request)
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $data = $this->isEmptyData($request->all());
        $countries = Country::orderBy('name', 'asc')->get();
        $columns = User::$columns;

        if ($data['name'] != null || $data['surname'] != null || $data['email'] != null ||
            $data['phone'] != null || $data['country'] != null || $data['sortby'] != null) {

            $users = $this->usersWithSearch($data, $sortby, $order);
            Input::flash();
            $links = str_replace('/?', '?', $users->appends(Input::except('page'))->render());

            return view('admin/admin', compact('users', 'links', 'countries', 'columns', 'sortby', 'order', 'data'));
        } else if ($sortby && $order) {
            $users = User::orderBy($sortby, $order)->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order', 'data'));
    }

    public function usersWithSearch(array $data, $sortby, $order)
    {
        if ($sortby && $order) {
            return $users = User::searchValue('name', $data['name'])
                ->searchValue('surname', $data['surname'])
                ->searchValue('phone', $data['phone'])
                ->searchValue('email', $data['email'])
                ->searchValue('country', $data['country'])
                ->orderBy($sortby, $order)
                ->paginate(5);
        } else {
            return $users = User::searchValue('name', $data['name'])
                ->searchValue('surname', $data['surname'])
                ->searchValue('phone', $data['phone'])
                ->searchValue('email', $data['email'])
                ->searchValue('country', $data['country'])
                ->paginate(5);
        }
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin/user', compact('user'));
    }

    public function accounts(Request $request)
    {
        $data = $this->isEmptyData($request->all());
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $columns = Account::$accountColumns;
        $countries = Country::orderBy('name', 'asc')->get();

        if ($data['name'] != null || $data['email'] != null || $data['phone'] != null ||
            $data['type'] != null || $data['account'] != null || $data['sortby'] != null ||
            $data['from'] != null || $data['to'] != null) {

            $accounts = $this->accountsWithSearch($data, $sortby, $order);
            Input::flash();
            $links = str_replace('/?', '?', $accounts->appends(Input::except('page'))->render());

            return view('admin/accounts', compact('links', 'countries', 'columns', 'sortby', 'order', 'data', 'accounts'));

        } else $accounts = $this->accountsWithoutSearch($sortby, $order);

        return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts', 'data'));
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

    public function accountsWithSearch(array $data, $sortby, $order)
    {
        if ($data['name'] != null || $data['email'] != null || $data['phone'] != null) {

            return $accounts = $this->searchAccountsByUsersFields($data, $sortby, $order);

        } else if ($sortby == 'name' || $sortby == 'phone' || $sortby == 'email') {

            return $accounts = $this->sortAccountsByUsersFieldsWithSearch($sortby, $order, $data);

        } else if ($sortby && $order) {
            return $accounts = Account::searchValue('number', $data['account'])
                ->searchValue('type_id', $data['type'])
                ->searchBalance($data['from'], $data['to'])
                ->with('user', 'account_type')
                ->orderBy($sortby, $order)
                ->paginate(3);
        } else {
            return $accounts = Account::searchValue('number', $data['account'])
                ->searchValue('type_id', $data['type'])
                ->searchBalance($data['from'], $data['to'])
                ->with('user', 'account_type')
                ->paginate(3);
        }
    }

    public function searchAccountsByUsersFields(array $data, $sortby, $order)
    {
        if ($sortby && $order) {
            $users = User::searchValue('name', $data['name'])
                ->searchValue('phone', $data['phone'])
                ->searchValue('email', $data['email'])
                ->orderBy($sortby, $order)
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        } else {
            $users = User::searchValue('name', $data['name'])
                ->searchValue('phone', $data['phone'])
                ->searchValue('email', $data['email'])
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        }
        return $accounts;
    }

    public function sortAccountsByUsersFieldsWithSearch($sortby, $order, array $data)
    {
        $users = User::orderBy($sortby, $order)->get();
        $ids = [];
        foreach ($users as $index => $user) {
            $ids[$index] = $user->id;
        }
        $accounts = Account::whereIn('user_id', $ids)
            ->searchValue('number', $data['account'])
            ->searchValue('type_id', $data['type'])
            ->searchBalance($data['from'], $data['to'])
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

//    public function userPersonal($id)
//    {
//        $user = User::find($id);
//        $personalAccount = $user->accounts()->where('type_id', 1)->first();
//        return view('admin/userPersonal', compact('user', 'personalAccount'));
//    }

//    public function userInvestor($id)
//    {
//        $user = User::find($id);
//        $investorAccounts = $user->accounts()->where('type_id', 2)->get();
//        return view('admin/userInvestor', compact('user', 'investorAccounts'));
//    }

}
