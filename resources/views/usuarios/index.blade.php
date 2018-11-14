@extends('layout')

@section('content')
	
	<div class="col-xs-12">

		<div class="col-xs-6">
			<ol class="breadcrumb">
			  <li>RESERVAS</li>
			  <li>Usuarios</li>
			  <li class="active">Crear</li>
			</ol>	
		</div>
		
		<div class="col-xs-6">
			<a href="{{ route('usuarios.create') }}" class="btn btn-default pull-right">Nuevo</a>
		</div>

		<div class="col-xs-12">
			@include('usuarios.fragment.info')
		</div>	

	</div>
	
	<table class="table table-striped">
		<thead>
			<tr>				
				<th>Nombre</th>
				<th>Apellidos</th>				
				<th>&nbsp;</th>
				<th>Reservar</th>				
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $row)
			<tr>				
				<td>{{ $row->nombre }}</td>
				<td>{{ $row->apellidos }}</td>				
				<td>
					<div class="dropdown">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Opciones
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="{{ route('usuarios.show', $row->id) }}">Ver</a></li>
					    <li><a href="{{ route('usuarios.edit', $row->id) }}">Editar</a></li>
					    <li>
					    	<form action="{{ route('usuarios.destroy', $row->id) }}" method="POST">
					    		{{ csrf_field() }}
					    		<input type="hidden" name="_method" value="DELETE">						
					    		<button class="btn btn_link" style="background-color: white; padding-left: 20px;">Borrar</button>
					    	</form>
					    </li>					    
					  </ul>
					</div>
				</td>				
				<td>
					<a href="/reservas/{{$row->id}}"><button class="btn btn_info">Reservar</button></a>
				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>

	{!! $usuarios->render()  !!}

@endsection

