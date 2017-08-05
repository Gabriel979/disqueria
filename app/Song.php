<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Song extends Model
{
    use SoftDeletes;

    protected $table="songs";

    protected $fillable=['nombre_cancion','letra','video_ruta','autor'];

    protected $dates = ['deleted_at'];


    public function albunes(){

    	return $this->belongsToMany('App\Album');
    }


}
