@extends('layout')

@section('content')
	
	<div class="col-xs-12">
		<div class="col-xs-6">
			<ol class="breadcrumb">
			  <li><a href="#">RESERVAS</a></li>
			  <li><a href="#">Usuarios</a></li>
			  <li class="active">Ver</li>
			</ol>
		</div>

		<div class="col-xs-6">
			<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-default pull-right">Editar</a>
		</div>
		
	</div>
	
	<h3>{{ $usuario->nombre }}</h3>
	<h4>{{ $usuario->apellidos }}</h4>

@endsection