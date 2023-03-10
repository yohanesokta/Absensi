<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    function absen(){
        $id = $_POST['_dataid'];
        $in = $_POST['_data'];
        if ($in == '1') {
            DB::table('siswa')->where('id','=',$id)->increment('sakit',1);
        }elseif ($in == '2') {
            DB::table('siswa')->where('id','=',$id)->increment('ijin',1);
        }
        else{
            DB::table('siswa')->where('id','=',$id)->increment('alpha',1);
        }
        return redirect('/absen#bx'.$id)->with($id,'data');
    }

    function setting(){
        return view('/requ/setting',[
            'main'=>'menu',
            'headerTab'=>'Setting'
        ]);
    }
    public function  ChangeUsername(){
        return view('/requ/Cname',[
            'main'=>'menu',
            'headerTab'=>'Ganti Username'
        ]);
    }
    public function Cname(Request $request){
        $request->validate([
            'name'=>'required|min:5|max:255|unique:users'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)){
            DB::table('users')->where('email',$request->email)->update([
                'name'=>$request->name,
            ]);
            return redirect('/setting');
        }else{
            return back()->withErrors([
                'login'=>'login lagal'
            ]);
        }

    }
    public function Vchangepw(){
        return view('/requ/changepw',[
            'main'=>'menu',
            'headerTab'=>'Ganti Password'
        ]);
    }
    public function Pchangepw(Request $request){
        $request->validate([
            'password2'=>'required|min:5|max:255',
            'password3'=>'required_with:password2|same:password2'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)){
            DB::table('users')->where('email',$request->email)->update([
                'password'=>Hash::make($request->password2)
            ]);
            return redirect('/setting');
        }else{
            return back()->withErrors([
                'login'=>'login lagal'
            ]);
        }
    }
}