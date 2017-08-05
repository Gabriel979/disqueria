<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicalGenre extends Model
{
    
    protected $table="genero_musical";

    protected $fillable=["genero_nombre"];

    
    public function artistas(){
    	return hasMany('App\Artista');
    }

    public function albunes(){
    	return hasMany('App\Album');
    }
    
}
