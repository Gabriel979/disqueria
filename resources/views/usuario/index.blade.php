@extends('layouts.home-layout')

@section('title','Usuarios')
	
@section('header','Usuarios Registrados')
	

@section('content')
			<br />	
			<h3>Modificar - Eliminar</h3>		
			<br />

			@include('alerts.success')
			@include('alerts.errors2')

			<table>
			<thead> <th>Nombre</th> <th>Email</th> <th>Operación</th> </thead>

			@foreach($users as $user)	
				<tbody>
				<tr> <td>{{$user->name}}</td> <td>{{$user->email}}</td> <td>{!! link_to_route('usuario.edit', $title ='Editar', $parameters = $user->id, $attributes =['class'=>'btn btn-primary']) !!}</td> </tr>
				</tbody>
			@endforeach

			</table>

			<br>
			<br>

			<div class="row" ><div class="content-fluid  text-center col-md-12" >{!! $users->render() !!}</div></div>
			
@endsection
	

	