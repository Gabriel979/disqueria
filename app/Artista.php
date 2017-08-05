<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artista extends Model
{
	use SoftDeletes;

    protected $table="artistas";

	protected $fillable=['nombre_artista','pais'];    

    protected $dates = ['deleted_at'];


    //Genera la F.K. en la otra tabla
    //relacion Uno a Muchos con la tabla Album
    public function album()
    {
        return $this->hasMany('App\Album');
    }

    //relacion inversa de uno a Muchos con la tabla genero musical
     public function generos()
    {
        return $this->belongsTo('App\Music_genre');
    }

}
