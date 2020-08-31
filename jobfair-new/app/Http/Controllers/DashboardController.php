<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companie;
use App\Vacancie;
use App\Applicant;
use App\Banner;
use File;
use Storage;

class DashboardController extends Controller
{
    // start crud of companies 

    function Companies(){
        $compa = Companie::get();
        return view('admin/addcompanies', ['compa' => $compa]);
    }

    function CompaniesAdd(Request $req){
        $this->validate($req, [
            'name' => 'required', 
            'image' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        
        $destinasi = env('CDN_PATH').'\file_company'; 
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }
        // return $req;
        
        Companie::create([
            'name' => $req->name, 
            'image' => $nama_gambar,
            'active' => $active
        ]);

        return redirect()->back()->with('alert', 'data berhasil ditambahkan');
    }

    function CompaniesEdit($id){
        $compa = Companie::where('idcompanies', $id)->get();
        return view('admin/editcompanies', ['compa' => $compa]); 
    }

    function CompaniesUpdate(Request $req, $id){
        $this->validate($req, [
            'name' => 'required', 
            'image' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_company';
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }

        Companie::where('idcompanies', $id)->update([
            'name' => $req->name, 
            'image' => $nama_gambar,
            'active' => $active
        ]);
        
        return redirect('/companies')->with('alert', 'data berhasil diubah');
    }

    function companiesDelete($id){
        $gambar = Companie::where('idcompanies', $id)->first();
        $file_path = env('CDN_PATH').'\file_company/'.$gambar->image; 
        if(File::exists($file_path)){
            File::delete($file_path); 
        } 
        // //hapus data 
        Companie::where('idcompanies', $id)->delete(); 

        return redirect()->back()->with('alert', 'data berhasil dihapus'); 
    }

    //end of crud companiess


    
    //start of crud vacancies

    function Vacancies(){
        $compa = Companie::get();
        $vacan = Vacancie::get();
        return view('admin/addvacancies', ['compa' => $compa, 'vacan' => $vacan]);
    }

    function VacanciesAdd(Request $req){
        $this->validate($req, [
            'idcompanies' => 'required',
            'type' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_vacancy';
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }

        Vacancie::create([
            'idcompanies' => $req->idcompanies,
            'type' => $req->type,
            'title' => $req->title,
            'desc' => $req->desc,
            'image' => $nama_gambar, 
            'active' => $req->active
        ]);

        return redirect()->back()->with('alert', 'data berhasil ditambahkan');
    }

    function VacanciesDelete($id){
        $gambar = Vacancie::where('idvacancies', $id)->first();
        $file_path = env('CDN_PATH').'\file_vacancy/'.$gambar->image; 
        if(File::exists($file_path)){
            File::delete($file_path); 
        } 
        // //hapus data 
        Vacancie::where('idvacancies', $id)->delete(); 

        return redirect()->back()->with('alert', 'data berhasil dihapus');
    }

    function VacanciesEdit($id){
        $vacan = Vacancie::where('idvacancies', $id)->get(); 
        return view('admin/editvacancies', ['vacan' => $vacan]); 
    }

    function VacanciesUpdate(Request $req, $id){
        $this->validate($req, [
            'type' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time().'_'.$gambar->getClientOriginalName(); 

        $destinasi = env('CDN_PATH').'\file_vacancy';
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }

        Vacancie::where('idvacancies', $id)->update([
            'type' => $req->type,
            'title' => $req->title,
            'desc' => $req->desc, 
            'image' => $nama_gambar,
            'active' => $active
        ]);

        return redirect('/vacancies')->with('alert', 'data berhasil diubah');
    }
    
    //end of crud vacancies

        
    //start of crud applicants

    function Applicant(){
        $app = Applicant::join('vacancies', 'vacancies.idvacancies', '=', 'applicants.idvacancies')->get();
        return view('admin/listapplicant', ['app' => $app]); 
    }

    function ApplicantAdd(Request $req){
        $this->validate($req, [
            'idvacancies' => 'required',
            'name' => 'required',
            'ktp' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'address'=> 'required',
            'photo' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('photo');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_applicant';
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }
        
        Applicant::create([
            'idvacancies' => $req->idvacancies,
            'name' => $req->name,
            'ktp' => $req->ktp,
            'birth_place' => $req->birth_place,
            'birth_date' => $req->birth_date,
            'email' => $req->email,
            'phone1' => $req->phone1,
            'phone2' => $req->phone2,
            'address'=> $req->address,
            'photo' => $nama_gambar,
            'active' => $active
        ]);
        
        return redirect('/')->with('alert', 'Selamat data anda telah berhasil disimpan');
    }

    function ApplicantDelete($id){
        $gambar = Applicant::where('idapplicants', $id)->first();
        $file_path = env('CDN_PATH').'\file_applicant/'.$gambar->image; 
        
        if(File::exists($file_path)){
            File::delete($file_path); 
        } 
        
        //hapus data 
        Applicant::where('idapplicants', $id)->delete(); 

        return redirect()->back()->with('alert', 'data berhasil dihapus'); 
    }

    function ApplicantEdit($id){
        $app = Applicant::where('idapplicants', $id)->get(); 
        return view('admin/editapplicant', ['app' => $app]);
    }

    function ApplicantUpdate(Request $req, $id){
        $this->validate($req, [
            'name' => 'required',
            'ktp' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'address'=> 'required',
            'photo' => 'required|mimes:jpeg,png,jpg' 
        ]);

        $gambar = $req->file('photo');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_applicant';
        $gambar->move($destinasi, $nama_gambar);

        $active = false;
        if($req->has('active')) {
            $active = true;
        }
        
        Applicant::where('idapplicants', $id)->update([
            'name' => $req->name,
            'ktp' => $req->ktp,
            'birth_place' => $req->birth_place,
            'birth_date' => $req->birth_date,
            'email' => $req->email,
            'phone1' => $req->phone1,
            'phone2' => $req->phone2,
            'photo' => $nama_gambar,
            'active' => $active
        ]);

        return redirect('/applicant')->with('alert', 'data berhasil diubah');
    }

    //end of crud applicants


    //start of crud banner 
    function Banner(){
        $bann = Banner::get(); 
        return view('admin/addbanner', ['bann' => $bann]);
    }

    function BannerAdd(Request $req){   
        $this->validate($req, [
            'title' => 'required', 
            'image' => 'required'
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_banner'; 
        $gambar->move($destinasi, $nama_gambar);

        Banner::create([
            'title' => $req->title, 
            'image' => $nama_gambar 
        ]);

        return redirect()->back()->with('alert', 'data berhasil ditambah');
    }

    function BannerDelete($id){
        $gambar = Banner::where('idbanners', $id)->first();
        $file_path = env('CDN_PATH').'\file_banner/'.$gambar->image; 
        if(File::exists($file_path)){
            File::delete($file_path); 
        } 
        
        //hapus data 
        Banner::where('idbanners', $id)->delete(); 

        return redirect()->back()->with('alert', 'data berhasil dihapus'); 
    }

    function BannerEdit($id){
        $bann = Banner::where('idbanners', $id)->get(); 
        return view('admin/editbanner', ['bann' => $bann]);
    }

    function BannerUpdate(Request $req, $id){
        $this->validate($req, [
            'title' => 'required', 
            'image' => 'required' 
        ]);

        $gambar = $req->file('image');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();

        $destinasi = env('CDN_PATH').'\file_banner';
        $gambar->move($destinasi, $nama_gambar);
        
        Banner::where('idbanners', $id)->update([
            'title' => $req->title, 
            'image' => $nama_gambar
        ]);

        return redirect('/banner')->with('alert', 'data berhasil ditambah');
    }

    public function cari(Request $req) {
        $cari = $req->cari; 

        $compa = Companie::where('name', 'like', '%'.$cari.'%')->paginate();
        $vacan = Vacancie::where('title', 'like', '%'.$cari.'%')->paginate();
        $app = Applicant::where('name', 'like', '%'.$cari.'%')->join('vacancies', 'vacancies.idvacancies', '=', 'applicants.idvacancies')->paginate();
        $bann = Banner::where('title', 'like', '%'.$cari.'%')->paginate(); 

        return view('admin/homeadmin', ['compa'=>$compa, 'vacan'=>$vacan, 'app'=>$app, 'bann'=>$bann]);
    }
}
