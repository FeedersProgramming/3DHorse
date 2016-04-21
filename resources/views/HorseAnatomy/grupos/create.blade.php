<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Registro Grupos</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-6">

				{!! Form::open(['route' => 'HorseAnatomy.grupos.store', 'method' => 'POST', 'files' => true]) !!}

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre') !!}
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Grupo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Contraseña De Registro Estudiantes') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('imagen', 'Imagen Del Grupo') !!}
					{!! Form::file('imagen', ['class' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
					{!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
					{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>

				{!! Form::close() !!}

				<hr>
			</div>
		</div>	
	</div>

</body>
</html>