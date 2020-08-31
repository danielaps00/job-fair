<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Admin;
use App\Companie;
use App\Vacancie;
use App\Applicant;
use App\Banner;
use File;

class AdminController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert', 'login terlebih dahulu');  
        } else {
            $compa = Companie::take(5)->get();
            $vacan = Vacancie::take(5)->get();
            $app = Applicant::join('vacancies', 'vacancies.idvacancies', '=', 'applicants.idvacancies')->take(5)->get();
            $bann = Banner::get();
            return view('admin/homeadmin', ['compa'=>$compa, 'vacan'=>$vacan, 'app'=>$app, 'bann'=>$bann]);
        }
    }

    public function login(){
        return view('admin/login');
    }

    public function loginPost(Request $req){
        $email = $req->email;
        $password = $req->password;

        $data = Admin::where('email', $email)->first();
        if($data){
            //apakah email sudah ada atau tidak 
            if(Hash::check($password, $data->password)){
                Session::put('nama', $data->nama);
                Session::put('email', $data->email);
                Session::put('login', TRUE);
                return redirect('/home_admin');
            } else {
                return redirect('/login')->with('alert', 'password atau email salah'); 
            }
        }

    }

    public function logout(){
        Session::flush(); 
        return redirect('/login')->with('alert', 'anda sudah logout'); 
    }

    public function register(){
        return view('admin/register'); 
    }

    public function registerPost(Request $req){ 
        $data = new Admin;
        $data->email = $req->input('email');
        $data->password = bcrypt($req->input('password'));
        $data->nama = $req->input('nama');
        $data->last_login = date('Y-m-d H:i:s');
        $data->active = $req->has('active');
        $data->save();
        return redirect('/login')->with('alert-success', 'anda sudah terdaftar sebagai admin'); 
    }
}
