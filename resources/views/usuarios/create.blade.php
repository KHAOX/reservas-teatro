@extends('layout')

@section('content')
	
	<div class="col-xs-12">
		<ol class="breadcrumb">
		  <li><a href="#">RESERVAS</a></li>
		  <li><a href="#">Usuarios</a></li>
		  <li class="active">Crear</li>
		</ol>
		
		@include('usuarios.fragment.error')
		
		{!! Form::open(['route' => 'usuarios.store']) !!}
			@include('usuarios.fragment.form')
		{!! Form::close() !!}
	</div>
	
	<a href="{{ route('usuarios.index') }}" class="btn btn-default pull-right">Ver Listado</a>

@endsection