@extends('layouts.home-layout')

@section('title','Administrador-Inicio')
	
@section('header','Administrador - Disquería')


@section('content')

	<br />	
	<h3>HOME</h3>		
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

@endsection