<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;

    public function LoaiSanPham() {
    	return $this->belongsTo('App\LoaiSanPham','id_loaisanpham','id');
    }
}
