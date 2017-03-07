<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchName(Request $request)
    {
        $data = $request->all();
        $users = User::where("name", $data['name'])->get();
        return view('home')->with(['users'=>$users]);
    }

    public function searchSurame(Request $request)
    {
        $data = $request->all();
        $users = User::where("surname", $data['surname'])->get();
        return view('home')->with(['users'=>$users]);
    }

    public function searchPhone(Request $request)
    {
        $data = $request->all();
        $users = User::where("phone", $data['phone'])->get();
        return view('home')->with(['users'=>$users]);
    }

    public function searchEmail(Request $request)
    {
        $data = $request->all();
        $users = User::where("email", $data['email'])->get();
        return view('home')->with(['users'=>$users]);
    }

    public function searchCountry(Request $request)
    {
        $data = $request->all();
        $users = User::where("country", $data['country'])->get();
        return view('home')->with(['users'=>$users]);
    }
}
