<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthControllers extends Controller
{
    function SignMenu(){
        return view('auth.sign');
    }
    function LoginMenu(){
        return view('auth.login');
    }
    function store(Request $request){
        $request->validate([
            'email'=>'required|min:5|max:255|email:dns|unique:users',
            'name'=>'required|min:3|max:255|unique:users',
            'password'=>'required|min:5|max:255',
            'Repassword'=>'required_with:password|same:password|min:5'
        ]);
        $infoLogin = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name'=> $request->name
        ];

        User::create($infoLogin); 
        return redirect('/login');
    }
}
