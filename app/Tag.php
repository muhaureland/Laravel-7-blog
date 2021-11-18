<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];


    //  //menghubungkan table tag dengan post dengan many to many
    public function post()
    {
        return $this->belongsToMany('App\Post');
    }
}
