@extends('layout')

@section('content')
	
	<div class="col-xs-12">
		
		<div class="col-xs-12">
			<div class="col-xs-6">
				<ol class="breadcrumb">
				  <li><a href="#">RESERVAS</a></li>
				  <li><a href="#">Usuarios</a></li>
				  <li class="active">Editar</li>
				</ol>
			</div>

			<div class="col-xs-6">
				<a href="{{ route('usuarios.index') }}" class="btn btn-default pull-right">Listado</a>
			</div>
			
		</div>
		
		@include('usuarios.fragment.error')
		
		{!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT']) !!}
			@include('usuarios.fragment.form')
		{!! Form::close() !!}

	</div>
	
	

@endsection