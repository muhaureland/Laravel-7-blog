<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // //karena nama table den ndk jamak alias ndk pakai es maka harus den definiskkan
    // ada kendala saat penamaan database, categorys akan dibaca categories oleh laravel
    // jaid harus didefinisikan terlebuh dahulu seperti dibawah
    protected $table = 'categorys';
    //fillable = field di table yg boleh diisi...jika menggunakan guarded kebalikannya
    protected $fillable = ['name', 'slug'];

    public function hitungCategory(){
    	return $this->hasMany('App\Post');
    }
}
