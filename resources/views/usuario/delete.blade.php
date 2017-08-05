@extends('layouts.home-layout')

@section('title','Editar Usuarios')
	
@section('header','Editar Usuarios')


@section('content')

	<br />			
	<br />

	@include('alerts.success')

	{!!Form::model($user, ['route' => ['usuario.update', $user->id ],'method'=> 'PUT'])!!}
		@include('usuario.form.usr')
		<br>
		{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}



@endsection