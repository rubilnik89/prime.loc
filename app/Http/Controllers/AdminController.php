<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function search(Request $request)
    {
        $data = $request->all();
        !empty($data['country']) ? $data['country'] = $data['country'] : $data['country'] = null;
        if($data['name']!=null||$data['surname']!=null||$data['email']!=null||$data['phone']!=null||$data['country']!=null){
            $where = [];
            if (!empty($data['name'])) $where['name'] = $data['name'];
            if (!empty($data['surname'])) $where['surname'] = $data['surname'];
            if (!empty($data['email'])) $where['email'] = $data['email'];
            if (!empty($data['phone'])) $where['phone'] = $data['phone'];
            if (!empty($data['country'])) $where['country'] = $data['country'];

            $users = User::where($where)->get();
            return view('admin/admin')->with(['users'=>$users]);
        }else{
            return redirect('admin');
        }
    }

    public function main()
    {
        $users = User::all();
        return view('admin/admin')->with(['users'=>$users]);
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin/user')->with(['user'=>$user]);
    }
}
