<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Album extends Model
{
	use SoftDeletes;

    protected $table="albums";

    protected $fillable=['nombre_album','fecha_salida','imagen_album'];


    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }

    public function genero_musical()
    {
        return $this->belongsTo('App\Music_genre');
    }

    public function canciones(){

        return $this->belongsToMany('App\Song');
    }

}
