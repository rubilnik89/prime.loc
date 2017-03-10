<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->all();
        !empty($data['country']) ? $data['country'] = $data['country'] : $data['country'] = null;
        if($data['name']!=null||$data['surname']!=null||$data['email']!=null||$data['phone']!=null||$data['country']!=null){
        $users = User::searchName($data['name'])
            ->searchSurame($data['surname'])
            ->searchPhone($data['phone'])
            ->searchEmail($data['email'])
            ->searchCountry($data['country'])
            ->get();
        $countries = Country::all();
        Input::flash();
        return view('admin/admin')->with(['users'=>$users, 'countries'=>$countries]);
        }else{
            return redirect('admin');
        }

    }

    public function main()
    {
        $countries = Country::all();
        $users = User::all();
        return view('admin/admin')->with(['users'=>$users, 'countries'=>$countries]);
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin/user')->with(['user'=>$user]);
    }
}
