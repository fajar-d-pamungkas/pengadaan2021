<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Suplier extends Model
{
    //
    protected $table = 'tbl_suplier';
    protected $primarykey = 'id_suplier';
    protected $fillable = ['id_suplier','nama_usaha','email_usaha','alamat_usaha','npwp_usaha','password','status','token'];
}
