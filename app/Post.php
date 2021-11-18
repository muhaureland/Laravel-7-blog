<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'judul', 'slug', 'category_id', 'content', 'gambar'];

    //memanggil isi dari kategory
    //jika menggunakan one to many nama function didak boleh beda
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //menghubungkan table post dengan tag dengan many to many
    // jika menggunakan manu to many nama function boleh berbeda
    public function hubungkanKeTag()
    {
        return $this->belongsToMany('App\Tag');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //jika menggunakan name field yg berbeda maka kita harus definisikan terlebih dahulu seperti dibawah
    //field yg sekarang user_id (itu sudah diotomatiskan oleh laravel seperti function user diatas)
    // contoh fieldny berbeda yg harus kita definisikan
    // cacad adalah field yg di table post sebagai foreign key dan id sbg primarikey di table users
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'cacad_id', 'id');
    // }


}
