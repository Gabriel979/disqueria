<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Para almacenar datos del softdeleting
    protected $dates=['deleted_at'];

    //En última instancia hay que agregar el campo  DELETED_AT


    /**
    *
    *Boot the model
    *
    */
    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->token=str_random(40);
        }); 
    }


    public function confirmEmail(){

        $this->verified = true;

        $this->token = null;

        $this->save();
    }


    // Con este método evito usar la función  bcrypt() que se encuentra en UsuarioController
    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password']=\Hash::make($valor); //Encripta el password
        }
    }
}
