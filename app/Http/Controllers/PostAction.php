<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostAction extends Controller
{
    function add(){
        return view('add',[
            'main'=>'menu',
            'Suc'=>$_GET['Suc'],
            'headerTab'=>'Tambah User'
        ]);
    }
    function actionAdd(){
        DB::table('siswa')->insert([
            'name'=>$_POST['Name'],
            'kelas'=>$_POST['kelas'],
            'absen'=>$_POST['Absen'],
            'userid'=>auth()->user()->id
        ]);
        return redirect('/add?Suc=Fn');
    }
    function ViewData(){
        $ID = auth()->user()->id;
        $data = DB::table('siswa')->get()->where('userid','=',$ID);
        return view('viewData',[
            'data'=>$data,
            'main'=>'profile',
            'headerTab'=>'Lihat Siswa'
        ]);
    }
    function viewDelete(){
        $dataId = $_POST['id'];
        DB::table('siswa')->where('id','=',$dataId)->delete();
        return redirect('/view?Suc=1');
    }
    function GTabsen(){
        $ID = auth()->user()->id;
        $data = DB::table('siswa')->get()->where('userid','=',$ID);
        return view('absen',[
            'main'=>'menu',
            'headerTab'=>'Absen Siswa',
            'data'=>$data
        ]);
    }
    function absenChange(){
        $id = $_POST['dataId'];
        $in = $_POST['dataIn'];
        if ($in == '1') {
            DB::table('siswa')->where('id','=',$id)->increment('sakit',1);
        }elseif ($in == '2') {
            DB::table('siswa')->where('id','=',$id)->increment('ijin',1);
        }
        else{
            DB::table('siswa')->where('id','=',$id)->increment('alpha',1);
        }
    }
    function setting(){
        return view('/requ/setting',[
            'main'=>'menu',
            'headerTab'=>'Setting'
        ]);
    }
    function pengaturan(){
        return 'Ini Pengaturan';
    }
}
