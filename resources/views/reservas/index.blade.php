@extends('layout')

@section('content')
	
	<div class="col-xs-12">		
		
		<input type="hidden" id="userid" value="{{request()->route('id')}}">

		<div class="col-xs-6">
			<ol class="breadcrumb">
			  <li>RESERVAS</li>
			  <li>Teatro</li>
			  <li class="active">Butacas</li>
			</ol>	
		</div>
		
		<div class="col-xs-6">
			<span class=" pull-right"><img src="{{ asset("img/butaca.png") }}" class="butaca libre"> Bucatas disponibles</span>
		</div>
		
		<div class="col-xs-12 center-block">

			<table>
				
				@for($y = 1; $y <= 10; $y++)
					<tr>
						@for($x = 1; $x <= 5; $x++)						
							<td>

								@php
									$valid = 0;
									$id = 0;
									$username = "";								
								@endphp

								@foreach($reservas as $row)
									@if($row->row == $y && $row->column == $x)
										@php 
											$valid = 1;
											$id = $row->id;
											$username = $row->usuario['nombre']." ".$row->usuario['apellidos'];
										@endphp
									@endif
								@endforeach

								@if($valid == 1)								 	
									<img src="{{ asset("img/butaca.png") }}" class="butaca ocupado" row="{{ $y }}" column="{{ $x }}" data-toggle="popover"  title="Butaca F{{ $y }}-C{{ $y }} <button type='button' class='close'>&times;</button>" data-html="true" data-content="Reservado: {{ $username }} <br>
									<button rowid='{{$id}}' class='btn-destroy'>Eliminar Reservación</button>">
								@else
								 	<img src="{{ asset("img/butaca.png") }}" class="butaca libre" row="{{ $y }}" column="{{ $x }}">
								@endif								 							
								
							</td>	 
						@endfor
					</tr>
				@endfor
				
			</table>

		</div>

		<div class="col-xs-12 text-center">			
			<button id="limpiar" class="btn btn-link">Cancelar selección</button>			
			<button id="btn-reserva" class="btn btn-default">Hacer Reservación</button>
		</div>

		
	</div>

@endsection

@section('script')
	<script src="{{ asset('js/script.js') }}"></script>
@endsection
