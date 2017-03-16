<?php

namespace App\Http\Controllers;

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
        if($data['name']!=null||$data['surname']!=null||$data['email']!=null||$data['phone']!=null||$data['country']!=null||$data['sortby']!=null){
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
        return view('admin/adminSearch', compact('users', 'links', 'countries', 'columns', 'sortby', 'order', 'data'));
        }else{
            return redirect('admin/users');
        }

    }

    public function main()
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        if ($sortby && $order) {
            $users = User::orderBy($sortby, $order)->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        $countries = Country::all();
        $columns = User::$columns;

        return view('admin/admin', compact('users', 'countries', 'columns', 'sortby', 'order'));
    }


    public function accounts()
    {
        $sortby = Input::get('sortby');
        $order = Input::get('order');
        $columns = User::$accountColumns;
        if($sortby == 'personal' && $order){
            $accounts = PersonalAccount::where('type_id', 1)->orderBy('number', $order)->get();
            $ids=array();
            foreach ($accounts as $index=>$account){
                $ids[$index] = $account->user_id;
            }
            $users = User::whereIn('id', $ids)->with('accounts')->orderBy('id', $order)->paginate(5);
        }else if ($sortby == 'investor' && $order) {
            $accounts = InvestorAccount::where('type_id', 0)->orderBy('number', $order)->get();
            $ids = array();
            foreach ($accounts as $index => $account) {
                $ids[$index] = $account->user_id;
            }
            $users = User::whereIn('id', $ids)->with('accounts')->orderBy('id', $order)->paginate(5);
        } else if ($sortby != 'personal' && $sortby != 'investor' && $sortby && $order) {
            $users = User::with('accounts')->orderBy($sortby, $order)->paginate(5);
        } else {
            $users = User::with('accounts')->paginate(5);
        }
        $countries = Country::all();
        $investor = array();
        foreach ($users as $index => $user){
            if (empty($user->accounts[1])){
                $investor [$index] = '';
            } else { $investor[$index] = $user->accounts[1]->number; }
        }
        //dd($sortby);
        return view('admin/accounts', compact('users', 'countries', 'investor', 'columns', 'sortby', 'order'));
    }

    public function user($id)
    {
        $user = User::find($id);
        $personalAccount = User::find($id)->personalAccount;
        return view('admin/user', compact('user', 'personalAccount'));
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
        $investorAccount = array();
        if (empty($user->accounts[1])){
            $investorAccount[0] = 'Не существует';
            $investorAccount[1] = 'Не существует';
            $investorAccount[2] = 'Не существует';
        } else { $investorAccount[0] = $user->accounts[1]->number;
                    $investorAccount[1] = $user->accounts[1]->created_at;
                    $investorAccount[2] = $user->accounts[1]->updated_at; }
        return view('admin/userInvestor', compact('user', 'investorAccount'));
    }



}
