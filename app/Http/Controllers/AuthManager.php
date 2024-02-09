<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function signup(){
        return view('signup');
    }

    function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Invalid email or password.");
    }

    function signupPost(Request $request){

        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('signup'))->with("error", "Credentials invalid, please try again.");
        }
        return redirect()->intended(route('login'));
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('login'));
    }
}