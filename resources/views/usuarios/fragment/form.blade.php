<div class="form-group">
	{!! Form::label('nombre', 'Nombre usuario') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('apellidos', 'Apellidos del usuario') !!}
	{!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}	
</div>