@extends('layouts.home-layout')

@section('title','Editar Usuarios')
	
@section('header','Editar Usuarios')


@section('content')

	<br />			
	<br />

	@include('alerts.success')
	@include('alerts.requests')

	{!!Form::model($user, ['route' => ['usuario.update', $user->id ],'method'=> 'PUT'])!!}
		<div class="form-group">
			{!!Form::label('Nombre')!!}
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del usuario'])!!}
		</div>
		<br>
		<div class="form-group">
			{!!Form::label('Correo')!!}
			{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email'])!!}
		</div>
		<br>
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary', 'id'=>'actualizar'])!!}
		<br>
		
	{!!Form::close()!!}
	<br>
	<br>
	{!!Form::open(['route' => ['usuario.destroy', $user->id ],'method'=> 'DELETE'])!!}
		{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}

@endsection


@section('scripts')
	<script type="text/javascript" src="{{asset('js/disqueria.js')}}" ></script>
@endsection	