<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib Session
use Illuminate\Support\Facades\Session;

//import lib JWT
use Firebase\JWT\JWT;

//import lib Response
use Illuminate\Response;

//import lib validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encryption\DecryptException;

//import model Admin
use App\M_Admin;

class Admin extends Controller
{
  //
  public function index(){
    return view('admin.login');
  }
  //    public function adminGenerate(){
  //    M_Admin::create(
  //      [
  //      'nama_admin'=>"Admin",
  //      'email_admin'=>"admin@admin.com",
  //      'alamat_admin'=>"Rumah Admin",
  //      'password'=>encrypt("admin@admin.com")
  //    ]
  //  );
  //}
  public function masukAdmin(Request $request){
    $this->validate($request,
    [
      'email_login'=>'required',
      'password_login'=>'required'
    ]
  );
  $cek = M_Admin::where('email_admin', $request->email_login)->count();
  $adm = M_Admin::where('email_admin', $request->email_login)->get();
  //echo ($cek);
  if ($cek > 0){
    foreach($adm as $ad){
      if(decrypt($ad->password) == $request->password_login){
        $key = env('APP_KEY');
        $data = array(
          'id_admin'=>$ad->id_admin
        );
        $jwt = JWT::encode($data,$key);
        if(M_Admin::where('id_admin',$ad->id_admin)->update(
          [
            'token'=>$jwt
            //'token'=>"keluar"
          ]
        )){
          Session::put('token',$jwt);
          //Session::put('token',"");
          return redirect('/pengajuan')->with('berhasil','Selamat Datang Kembali');
          //return redirect('/');
        }
      }else{
        return redirect('/masukAdmin')->with('gagal','Password tidak sesuai');
      }
    }
  }else{
    return redirect('/masukAdmin')->with('gagal','Email tidak terdaftar');
  }

}
  public function keluarAdmin(){
    $token = Session::get('token');
    if(M_Admin::where('token', $token)->update(
    [
      'token' => 'keluar'
    ]
    )){
    Session::put('token',"");
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
    }else{
    //  return redirect('/masukSuplier')->with('gagal','Anda gagal LOGOUT');
  }
  }
  public function listAdmin(){
    $token = Session::get('token');
    $tokenDB = M_Admin::where('token',$token)->count();
    if ($tokenDB > 0){
      $data['adm'] = M_Admin::where('token',$token)->first();
      $data['admin'] = M_Admin::where('status','1')->paginate(15);
      return view('admin.list',$data);
    }else{
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
    }
  }
  public function tambahAdmin(Request $request){
    $this->validate($request,
    [
      'nama_tambah'=>'required',
      'email_tambah'=>'required',
      'alamat_tambah'=>'required',
      'password'=>'required'
    ]
  );
  $token = Session::get('token');
  $tokenDB = M_Admin::where('token',$token)->count();
  if ($tokenDB > 0){
    if (M_Admin::create([
      'nama_admin'=>$request->nama_tambah,
      'email_admin'=>$request->email_tambah,
      'alamat_admin'=>$request->alamat_tambah,
      'password'=>encrypt($request->password)
    ])){
      return redirect('/listAdmin')->with('berhasil','Data BERHASIL disimpan');
    }else{
      return redirect('/listAdmin')->with('gagal','Data GAGAL disimpan');
    }
  }else{
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
  }
  }

  public function hapusAdmin($id){
  $token = Session::get('token');
  $tokenDB = M_Admin::where('token',$token)->count();
  if ($tokenDB > 0){
    if (M_Admin::where("id_admin",$id)->delete()){
      return redirect('/listAdmin')->with('berhasil','Data BERHASIL dihapus');
    }else{
      return redirect('/listAdmin')->with('gagal','Data GAGAL dihapus');
    }
  }else{
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
  }
  }

  public function ubahAdmin(Request $request){
    $this->validate($request,
    [
      'nama_ubah'=>'required',
      'email_ubah'=>'required',
      'alamat_ubah'=>'required'
    ]
  );
  $token = Session::get('token');
  $tokenDB = M_Admin::where('token',$token)->count();
  if ($tokenDB > 0){
    if (M_Admin::where("id_admin",$request->id_admin)->update([
      'nama_admin'=>$request->nama_ubah,
      'email_admin'=>$request->email_ubah,
      'alamat_admin'=>$request->alamat_ubah
    ])){
      return redirect('/listAdmin')->with('berhasil','Data BERHASIL disimpan');
    }else{
      return redirect('/listAdmin')->with('gagal','Data GAGAL disimpan');
    }
  }else{
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
  }
  }
  Public function ubahPassword(Request $request){
    $token = Session::get('token');
    $tokenDB = M_Admin::where('token',$token)->count();
    if ($tokenDB > 0){
      $key = env('APP_KEY');
      $adm = M_Admin::where('token',$token)->first();
      $decode = JWT::decode($token, $key, array('HS256'));
      $decode_array = (array) $decode;

      if(decrypt($adm->password) == $request->passwordlama){
        if (M_Admin::where('id_admin',$decode_array['id_admin'])->update(
          [
            "password"=>encrypt($request->password)
          ]
        )){
          return redirect('/masukAdmin')->with('gagal','Password BERHASIL di Update');

        }else{
          return redirect('/pengajuan')->with('gagal','Password GAGAL di Update');
        }
      }else{
        return redirect('/pengajuan')->with('gagal','Password GAGAL di Update, password lama tidak sama');
      }


    }else{
    return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
    }
  }

}
