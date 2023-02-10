<?php

namespace App\Http\Controllers;

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
        $db_nama = $_POST['Name'];
        $db_kelas = $_POST['kelas'];
        $db_absen = $_POST['Absen'];
        DB::table('siswa')->insert([
            'name'=>$db_nama,
            'kelas'=>$db_kelas,
            'absen'=>$db_absen
        ]);
        return redirect('/add?Suc=Fn');
    }
    function ViewData(){
        $data = DB::table('siswa')->get();
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
        $data = DB::table('siswa')->get();
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
}
