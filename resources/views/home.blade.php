@extends('layouts.home-layout')

@section('title','Inicio')
    
@section('header','Disquería')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">INICIO</div>

                <div class="panel-body">
                    
                    <br />  
                    <br />

                    <ol>
                        <li>Inicio</li>
                        <li>Buscar Discos</li>
                        <li>Buscar Canciones</li>
                        <li><a href="{{url('login')}}" >Login</a></li>  
                        <li><a href="{{url('signup')}}" >Registrarse</a></li>
                        <li><a href="{{url('users')}}" >Lista de Usuarios</a></li>
                        <li><a href="{{url('modificar_password')}}" >Cambiar contraseña</a></li>    
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
