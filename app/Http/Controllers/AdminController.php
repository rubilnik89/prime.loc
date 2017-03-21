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
        $data = $this->isEmptyData($request->all());

        $sortby = Input::get('sortby');
        $order = Input::get('order');
        if ($sortby && $order) {
            $users = User::orderBy($sortby, $order)->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        $countries = Country::all();
        $columns = User::$columns;

        return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order', 'data'));
    }

    public function user($id)
    {
        $user = User::with('accounts')->find($id);
        return view('admin/user', compact('user'));
    }

    public function userPersonal($id)
    {
        $user = User::find($id);
        $personalAccount = User::find($id)->accounts()->where('type_id', 1)->first();
        return view('admin/userPersonal', compact('user', 'personalAccount'));
    }

    public function userInvestor($id)
    {
        $user = User::find($id);
        $investorAccounts = User::find($id)->accounts()->where('type_id', 2)->get();
        return view('admin/userInvestor', compact('user', 'investorAccounts'));
    }

    public function accounts(Request $request)
    {
        $data = $this->isEmptyData($request->all());
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $columns = Account::$accountColumns;
        $countries = Country::all();

        if ($sortby == 'name' || $sortby == 'email' || $sortby == 'phone') {
            $users = User::orderBy($sortby, $order)->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(5);
        } else if ($sortby != 'name' && $sortby != 'phone' && $sortby != 'email' && $sortby && $order) {
            $accounts = Account::with('user', 'account_type')->orderBy($sortby, $order)->paginate(5);
        } else {
            $accounts = Account::with('user', 'account_type')->paginate(5);
        }

        return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts', 'data'));
    }

    public function userSearch(Request $request)
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $data = $this->isEmptyData($request->all());
        $countries = Country::all();
        $columns = User::$columns;

        if ($data['name'] != null || $data['surname'] != null || $data['email'] != null || $data['phone'] != null || $data['country'] != null || $data['sortby'] != null) {
            if ($sortby && $order) {
                $users = User::searchName($data['name'])
                    ->searchSurname($data['surname'])
                    ->searchPhone($data['phone'])
                    ->searchEmail($data['email'])
                    ->searchCountry($data['country'])
                    ->orderBy($sortby, $order)
                    ->paginate(3);
            } else {
                $users = User::searchName($data['name'])
                    ->searchSurname($data['surname'])
                    ->searchPhone($data['phone'])
                    ->searchEmail($data['email'])
                    ->searchCountry($data['country'])
                    ->paginate(3);
            }

            Input::flash();
            $links = str_replace('/?', '?', $users->appends(Input::except('page'))->render());
            return view('admin/admin', compact('users', 'links', 'countries', 'columns', 'sortby', 'order', 'data'));
        } else {
            return redirect('admin/users');
        }
    }

    public function searchAccountsByUsersFields(array $data, $sortby, $order)
    {
        if ($sortby && $order) {
            $users = User::searchName($data['name'])
                ->searchPhone($data['phone'])
                ->searchEmail($data['email'])
                ->orderBy($sortby, $order)
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        } else {
            $users = User::searchName($data['name'])
                ->searchPhone($data['phone'])
                ->searchEmail($data['email'])
                ->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        }
        return $accounts;
    }

    public function sortAccountsByUsersFields($sortby, $order)
    {
        $users = User::orderBy($sortby, $order)->get();
        $ids = [];
        foreach ($users as $index => $user) {
            $ids[$index] = $user->id;
        }
        $accounts = Account::whereIn('user_id', $ids)->with('user', 'account_type')->orderBy('user_id', $order)->paginate(3);
        return $accounts;
    }

    public function accountSearch(Request $request)
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $countries = Country::all();
        $columns = Account::$accountColumns;
        $data = $this->isEmptyData($request->all());

        if ($data['name'] != null || $data['email'] != null || $data['phone'] != null || $data['type'] != null || $data['account'] != null || $data['sortby'] != null || $data['from'] != null || $data['to'] != null) {

            if ($data['name'] != null || $data['email'] != null || $data['phone'] != null) {

                $accounts = $this->searchAccountsByUsersFields($data, $sortby, $order);

            } else if ($sortby == 'name' || $sortby == 'phone' || $sortby == 'email') {

                $accounts = $this->sortAccountsByUsersFields($sortby, $order);

            } else if ($sortby && $order) {
                $accounts = Account::searchNumber($data['account'])
                    ->searchType($data['type'])
                    ->searchBalance($data['from'], $data['to'])
                    ->with('user', 'account_type')
                    ->orderBy($sortby, $order)
                    ->paginate(3);
            } else {
                $accounts = Account::searchNumber($data['account'])
                    ->searchType($data['type'])
                    ->searchBalance($data['from'], $data['to'])
                    ->with('user', 'account_type')
                    ->paginate(3);
            }
            Input::flash();
            $links = str_replace('/?', '?', $accounts->appends(Input::except('page'))->render());
            return view('admin/accounts', compact('links', 'countries', 'columns', 'sortby', 'order', 'data', 'accounts'));
        } else {
            return redirect('admin/users/accounts');
        }
    }
}
