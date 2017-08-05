@extends('layouts.home-layout')

@section('title','Login')
	
@section('header','Login')


@section('content')

			<br />		
			<br />

			{!! Form::open(['url' => 'usuario']) !!}
    			
    			<p>Usuario:</p>
				<input type="text" name="usuario" >
				<br>
				<p>Contraseña:</p>
				<input type="text" name="password">

				<br>
				<input type="submit" name="Ingresar" class="btn btn-primary">

			{!! Form::close() !!}

			<br>
			<br>
@endsection