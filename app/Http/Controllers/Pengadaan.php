<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib Session
use Illuminate\Support\Facades\Session;

//import lib JWT
use Firebase\JWT\JWT;

//import lib Response
use Illuminate\Http\Response;

//import lib validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encryption\DecryptException;

//import storage
use Illuminate\Support\Facades\Storage;

//import model Admin
use App\M_Admin;
use App\M_Pengadaan;
use App\M_Suplier;

class Pengadaan extends Controller
{
    //
    public function index(){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        $data['adm'] = M_Admin::where('token',$token)->first();

        $data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(6);
      return view('pengadaan.list',$data);
    }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');

    }
    }
    public function tambahPengadaan(Request $request){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        $this->validate($request,
        [
          'nama_pengadaan'=>'required',
          'deskripsi'=>'required',
          'gambar'=>'required|image|mimes:jpg,png,jpeg|max:10000',
          'anggaran'=>'required'
        ]
      );
    $path = $request->file('gambar')->store('public/gambar');
    if(M_Pengadaan::create(
      [
        "nama_pengadaan"=> $request->nama_pengadaan,
        "deskripsi"=> $request->deskripsi,
        "gambar"=> $path,
        "anggaran"=> $request->anggaran,
      ]
    )){
      return redirect('/listPengadaan')->with('berhasil','data BERHASIL disimpan');

    }else{
      return redirect('/listPengadaan')->with('gagal','data GAGAL disimpan');

    }
  }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');

    }

    }
    public function hapusGambar($id){
    $token = Session::get('token');
    $tokenDB = M_Admin::where('token',$token)->count();
    if ($tokenDB > 0){
      $pengadaan = M_Pengadaan::where('id_pengadaan', $id)->count();
      if ($pengadaan > 0){
        $dataPengadaan = M_Pengadaan::where('id_pengadaan', $id)->first();
        if(Storage::delete($dataPengadaan->gambar)){
          if(M_Pengadaan::where('id_pengadaan', $id)->update([
            "gambar"=>"-"
          ])){
            return redirect('/listPengadaan')->with('berhasil','gambar BERHASIL dihapus');
          } else{
            return redirect('/listPengadaan')->with('gagal','gambar GAGAL dihapus');
          }
        }else{
          return redirect('/listPengadaan')->with('gagal','gambar GAGAL dihapus');
        }
      }else{
        return redirect('/listPengadaan')->with('gagal','data tidak ditemukan');
      }
    }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
    }
    }
    public function uploadGambar(Request $request){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        $this->validate($request,
        [
          'gambar'=>'required|image|mimes:jpg,png,jpeg|max:10000'
        ]
      );
    $path = $request->file('gambar')->store('public/gambar');
    if(M_Pengadaan::where('id_pengadaan', $request->id_pengadaan)->update(
      [
        "gambar"=> $path
      ]
    )){
      return redirect('/listPengadaan')->with('berhasil','gambar BERHASIL di upload');

    }else{
      return redirect('/listPengadaan')->with('gagal','gambar GAGAL di upload');

    }
  }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');

    }

    }
    public function hapusPengadaan($id){
    $token = Session::get('token');
    $tokenDB = M_Admin::where('token',$token)->count();
    if ($tokenDB > 0){
      $pengadaan = M_Pengadaan::where('id_pengadaan', $id)->count();
      if ($pengadaan > 0){
        $dataPengadaan = M_Pengadaan::where('id_pengadaan', $id)->first();
        if(Storage::delete($dataPengadaan->gambar)){
          if(M_Pengadaan::where('id_pengadaan', $id)->delete()){
            return redirect('/listPengadaan')->with('berhasil','data BERHASIL dihapus');
          } else{
            return redirect('/listPengadaan')->with('gagal','data GAGAL dihapus');
          }
        }else{
          return redirect('/listPengadaan')->with('gagal','data GAGAL dihapus');
        }
      }else{
        return redirect('/listPengadaan')->with('gagal','data tidak ditemukan');
      }
    }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');
    }
    }
    public function ubahPengadaan(Request $request){
      $token = Session::get('token');
      $tokenDB = M_Admin::where('token',$token)->count();
      if ($tokenDB > 0){
        $this->validate($request,
        [
          'u_nama_pengadaan'=>'required',
          'u_deskripsi'=>'required',
          'u_anggaran'=>'required'
        ]
      );
  //  $path = $request->file('gambar')->store('public/gambar');
    if(M_Pengadaan::where('id_pengadaan', $request->id_pengadaan)->update(
      [
        "nama_pengadaan"=> $request->u_nama_pengadaan,
        "deskripsi"=> $request->u_deskripsi,
        "anggaran"=> $request->u_anggaran,
      ]
    )){
      return redirect('/listPengadaan')->with('berhasil','Data BERHASIL di update');

    }else{
      return redirect('/listPengadaan')->with('gagal','data GAGAL di update');

    }
  }else{
      return redirect('/masukAdmin')->with('gagal','Anda sudah LOGOUT, silahkan LOGIN terlebih dahulu');

    }

    }
    //
    public function listSuplier(){
      $token = Session::get('token');
      $tokenDB = M_Suplier::where('token',$token)->count();
      if ($tokenDB > 0){
        $data['sup'] = M_Suplier::where('token',$token)->first();
        $data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(6);
      return view('suplier.pengadaan',$data);
    }else{
      return redirect('/masukSuplier')->with('gagal','Password tidak sesuai');

    }
    }

}
