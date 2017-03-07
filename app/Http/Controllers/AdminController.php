<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function main()
    {
        $users = User::all();
        return view('home')->with(['users'=>$users]);
    }

    public function user($id)
    {
        $user = User::find($id);
        print_r($user);

    }
}
