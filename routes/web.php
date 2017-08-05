<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('login', function (){
    return view('auth.login');
});


Route::get('home', function (){
    return view('index');
});

Route::get('signup', function () {
    return view('usuario.create');
});


//todavia no esta creada la view!!
Route::get('modificar_password', function () {
    return view('usuario.modificar_password');
});

Route::get('users','UsuarioController@index');

Route::resource('usuario', 'UsuarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register/confirm/{token}','Auth\RegisterController@confirmEmail');

