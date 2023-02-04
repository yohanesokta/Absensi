<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InitController extends Controller
{
    function menu(){
        return view('menu',[
            'main'=>'home',
            'headerTab'=>'Absensi Online' 
        ]);
    }
}
