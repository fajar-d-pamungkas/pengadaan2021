<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encryption\DecryptException;

//import lib Session
use Illuminate\Support\Facades\Session;

//import Model Suplier
use App\M_Suplier;

class Registrasi extends Controller
{
  //
  public function index(){
    $token = Session::get('token');
		$tokenDB = M_Suplier::where('token',$token)->count();
		if ($tokenDB > 0){
			$data['token'] = $token;
		}else{
			$data['token'] = "kosong";
		}
      return view('registrasi.registrasi',$data);
  }
  public function daftar(Request $request){
    $this->validate($request,
    [
      'nama_view'=>'required',
      'email_view'=>'required',
      'alamat_view'=>'required',
      'npwp_view'=>'required',
      'password_view'=>'required'
    ]
  );
  if(M_Suplier::create([
    'nama_usaha'=>$request->nama_view,
    'email_usaha'=>$request->email_view,
    'alamat_usaha'=>$request->alamat_view,
    'npwp_usaha'=>$request->npwp_view,
    'password'=>encrypt($request->password_view)
    ])){
      return redirect('/registrasi')->with('berhasil','Data BERHASIL disimpan');
    }else{
      return redirect('/registrasi')->with('gagal','Data GAGAL disimpan');
    }
  }
}
