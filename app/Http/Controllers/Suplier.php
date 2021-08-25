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

//import Model Suplier
use App\M_Suplier;
use App\M_Admin;

class Suplier extends Controller
{
    //
    public function index(){
    	return view('suplier.login');
    }
    public function masukSuplier(Request $request){
      $this->validate($request,
        [
          'email_login'=>'required',
          'password_login'=>'required'
        ]
      );
      $cek = M_Suplier::where('email_usaha', $request->email_login)->count();
      $sup = M_Suplier::where('email_usaha', $request->email_login)->get();
      //echo ($cek);
      if ($cek > 0){
        foreach($sup as $su){
          if(decrypt($su->password) == $request->password_login){
            $key = env('APP_KEY');
            $data = array(
              'id_suplier'=>$su->id_suplier
            );
            $jwt = JWT::encode($data,$key);
            if(M_Suplier::where('id_suplier',$su->id_suplier)->update(
              [
                'token'=>$jwt
              ]
            )){
              Session::put('token',$jwt);
              return redirect('/listSuplier')->with('berhasil','Selamat Datang Kembali');
            }
          }else{
            return redirect('/masukSuplier')->with('gagal','Password tidak sesuai');
          }
        }
      }else{
        return redirect('/masukSuplier')->with('gagal','Email tidak terdaftar');
      }
    }
    Public function keluarSuplier(){
      $token = Session::get('token');
      if(M_Suplier::where('token', $token)->update(
        [
          'token' => 'keluar'
        ]
      )){
          Session::put('token',"");
          return redirect('/');
      }else{
          return redirect('/masukSuplier')->with('gagal','Anda gagal LOGOUT');
      }
    }
    public function listSup(){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        $data['adm'] = M_Admin::where('token',$token)->first();
        $data['suplier'] = M_Suplier::paginate(6);
        return view('admin.listSup',$data);
      }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
      }
    }
    Public function nonAktif($id){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        if (M_Suplier::where('id_suplier',$id)->update(
          [
            "status"=> "0"
          ]
        )){
          return redirect('/listSup')->with('berhasil','Data BERHASIL di Update');

        }else{
          return redirect('/listSup')->with('gagal','Data GAGAL di Update');
        }
      }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
      }

    }
    Public function Aktif($id){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        if (M_Suplier::where('id_suplier',$id)->update(
          [
            "status"=> "1"
          ]
        )){
          return redirect('/listSup')->with('berhasil','Data BERHASIL di Update');

        }else{
          return redirect('/listSup')->with('gagal','Data GAGAL di Update');
        }
      }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
      }

    }
    Public function ubahPassword(Request $request){
      $token = Session::get('token');
      $tokenDB = M_Suplier::where('token',$token)->count();
      if ($tokenDB > 0){
        $key = env('APP_KEY');
        $sup = M_Suplier::where('token',$token)->first();
        $decode = JWT::decode($token, $key, array('HS256'));
        $decode_array = (array) $decode;

        if(decrypt($sup->password) == $request->passwordlama){
          if (M_Suplier::where('id_suplier',$decode_array['id_suplier'])->update(
            [
              "password"=>encrypt($request->password)
            ]
          )){
            return redirect('/masukSuplier')->with('gagal','Password BERHASIL di Update');

          }else{
            return redirect('/listSuplier')->with('gagal','Password GAGAL di Update');
          }
        }else{
          return redirect('/listSuplier')->with('gagal','Password GAGAL di Update, password lama tidak sama');
        }


      }else{
      return redirect('/masukSuplier')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
      }
    }
}
