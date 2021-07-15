<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_data;
use Illuminate\Support\Facades\Hash;

class UserData extends Controller
{
    //registration
    function register(Request $rq)
    {
        $email = $rq->email;
        $count = User_data::where('email', $email)->count();
        $mg = "Aleady have an account! try Again";
        session()->put('mg', $mg);
        if ($count > 0) {
            session()->put('mg', $mg);
            return view('register');
        } else {
            session()->pull('mg');

            // $rq->validate(
            //     [
            //         'name' => 'required',
            //         'email' => 'required',
            //         'password' => 'required',
            //         'mobile' => 'required'
            //     ]
            // );

            $user = new User_data;
            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->mobile = $rq->mobile;
            $user->password = Hash::make($rq->password);
            $user->save();
            return view('login');
        }
    }

    //Login
    function login(Request $req)
    {
        $data = User_data::where(['email' => $req->email])->first();
        if (!$data || !Hash::check($req->password, $data->password)) {
            $mg = "User name or password did't matched !";
            session()->put('login_mg', $mg);
            return view("login");
        } else {
            session()->pull('login_mg');
            session()->put('user', $data);
            return view('home');
        }
    }
}
