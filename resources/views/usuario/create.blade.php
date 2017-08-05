@extends('layouts.home-layout')

@section('title','Registrarse')
	
@section('header','Registrarse')


@section('content')
	<br />			
	<br />

	
	@include('alerts.success')
	@include('alerts.requests')
	

	<br>

	{!!Form::open(['route' => 'usuario.store', 'method'=> 'POST'])!!}
		@include('usuario.form.usr')
		<br>
		{!!Form::submit('Crear',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	<br>
	<br>
	<br>
	<br>
	<div class="text-center" ><a href="{{url('users')}}" >Ver lista de usuarios</a></div>
	
	

@endsection