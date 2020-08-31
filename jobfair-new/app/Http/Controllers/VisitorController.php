<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancie;
use App\Applicant;
use App\Banner;
use File;

class VisitorController extends Controller
{
    public function index(){
        $vacan = Vacancie::get();
        $bann = Banner::get();
        return view('vacancy', ['vacan' => $vacan, 'bann' => $bann]);
    }

    public function Apply($id){
        $vacan = Vacancie::where('idvacancies',$id)->get();
        return view('apply', ['vacan' => $vacan]);
    }

    public function Detail($id){
        $vacan = Vacancie::where('idvacancies', $id)->get(); 
        return view('detail', ['vacan' => $vacan]);
    }
}
