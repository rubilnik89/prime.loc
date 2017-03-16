<?php

namespace App\Http\Controllers;

use App\Accounts;
use App\Country;
use App\PersonalAccount;
use App\InvestorAccount;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->all();
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        !empty($data['country']) ? $data['country'] = $data['country'] : $data['country'] = null;
        !empty($data['name']) ? $data['name'] = $data['name'] : $data['name'] = null;
        !empty($data['surname']) ? $data['surname'] = $data['surname'] : $data['surname'] = null;
        !empty($data['phone']) ? $data['phone'] = $data['phone'] : $data['phone'] = null;
        !empty($data['email']) ? $data['email'] = $data['email'] : $data['email'] = null;
        !empty($data['sortby']) ? $data['sortby'] = $data['sortby'] : $data['sortby'] = null;
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
                    ->paginate(3);;
            }

            $countries = Country::all();
            $columns = User::$columns;
            Input::flash();
            $links = str_replace('/?', '?', $users->appends(Input::except('page'))->render());
            return view('admin/admin', compact('users', 'links', 'countries', 'columns', 'sortby', 'order', 'data'));
        } else {
            return redirect('admin/users');
        }

    }

    public function main()
    {
        !empty($data['country']) ? $data['country'] = $data['country'] : $data['country'] = null;
        !empty($data['name']) ? $data['name'] = $data['name'] : $data['name'] = null;
        !empty($data['surname']) ? $data['surname'] = $data['surname'] : $data['surname'] = null;
        !empty($data['phone']) ? $data['phone'] = $data['phone'] : $data['phone'] = null;
        !empty($data['email']) ? $data['email'] = $data['email'] : $data['email'] = null;
        !empty($data['sortby']) ? $data['sortby'] = $data['sortby'] : $data['sortby'] = null;


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

    public function accounts()
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $columns = Accounts::$accountColumns;
        $countries = Country::all();

        if ($sortby == 'name' && $order) {
            $users = User::orderBy($sortby, $order)->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Accounts::whereIn('user_id', $ids)->with('users')->orderBy('user_id', $order)->paginate(5);

        } else if ($sortby == 'phone' && $order) {
            $users = User::orderBy($sortby, $order)->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Accounts::whereIn('user_id', $ids)->with('users')->orderBy('user_id', $order)->paginate(5);
        } else if ($sortby == 'email' && $order) {
            $users = User::orderBy($sortby, $order)->get();
            $ids = [];
            foreach ($users as $index => $user) {
                $ids[$index] = $user->id;
            }
            $accounts = Accounts::whereIn('user_id', $ids)->with('users')->orderBy('user_id', $order)->paginate(5);
        } else if ($sortby != 'name' && $sortby != 'phone' && $sortby != 'email' && $sortby && $order) {
            $accounts = Accounts::with('user')->orderBy($sortby, $order)->paginate(5);
        } else {
            $accounts = Accounts::with('user')->paginate(5);
        }
        foreach ($accounts as $account) {
            if ($account->type_id == 1) {
                $account->type_id = 'Лицевой';
            }
            if ($account->type_id == 2) {
                $account->type_id = 'Инвесторский';
            }
        }

        return view('admin/accounts', compact('countries', 'columns', 'sortby', 'order', 'accounts'));
    }
//    public function accounts()
//    {
//        $sortby = Input::get('sortby');
//        $order = Input::get('order');
//        $columns = User::$accountColumns;
//        if($sortby == 'personal' && $order){
//            $accounts = Accounts::where('type_id', 1)->orderBy('number', $order)->get();
//            $ids=array();
//            foreach ($accounts as $index=>$account){
//                $ids[$index] = $account->user_id;
//            }
//            $users = User::whereIn('id', $ids)->with('accounts')->orderBy('id', $order)->paginate(5);
//        }else if ($sortby == 'investor' && $order) {
//            $accounts = Accounts::where('type_id', 0)->orderBy('number', $order)->get();
//            $ids = array();
//            foreach ($accounts as $index => $account) {
//                $ids[$index] = $account->user_id;
//            }
//            $users = User::whereIn('id', $ids)->with('accounts')->orderBy('id', $order)->paginate(5);
//        } else if ($sortby != 'personal' && $sortby != 'investor' && $sortby && $order) {
//            $users = User::with('accounts')->orderBy($sortby, $order)->paginate(5);
//        } else {
//            $users = User::with('accounts')->paginate(5);
//        }
//        $countries = Country::all();
//        $investor = array();
//        foreach ($users as $index => $user){
//            if (empty($user->accounts[1])){
//                $investor [$index] = '';
//            } else { $investor[$index] = $user->accounts[1]->number; }
//        }
//
//        return view('admin/accounts', compact('users', 'countries', 'investor', 'columns', 'sortby', 'order'));
//    }


}
