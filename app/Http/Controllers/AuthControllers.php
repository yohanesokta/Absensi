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
        // $request->session()->flash('succses','Registrasi Berhasil, Login Sekarang');
        return redirect('/login')->with('succses','Registrasi Berhasil, Login Sekarang');
    }
    public function login(Request $request){
        $valid = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($valid)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

         //$request->session()->flash('succses','Registrasi Berhasil, Login Sekarang');
        return back()->withErrors([
            'login' => 'Login Gagal',
        ]);
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
