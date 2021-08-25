<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib Session
use Illuminate\Support\Facades\Session;

//import Model Suplier
use App\M_Suplier;
//import Model Pengadaan
use App\M_Pengadaan;

class Home extends Controller
{
    //fungsi index
	public function index(){
		//return view('home');
		$key = env('APP_KEY');
		$token = Session::get('token');
		$tokenDB = M_Suplier::where('token',$token)->count();
		if ($tokenDB > 0){
			$data['token'] = $token;
		}else{
			$data['token'] = "kosong";
		}
		$data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(6);
		return view('utama.home', $data);
	}
}
