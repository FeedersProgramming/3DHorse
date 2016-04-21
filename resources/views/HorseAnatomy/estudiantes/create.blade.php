<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Registro Usuarios</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-6">

				{!! Form::open(['route' => 'HorseAnatomy.estudiantes.store', 'method' => 'POST', 'files' => true]) !!}

				<div class="form-group">
					{!! Form::label('cedula', 'Cedula') !!}
					{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre') !!}
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('apellido', 'Apellido') !!}
					{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('genero', 'Genero') !!}
					{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('direccion', 'Direccion') !!}
					{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Cra 8 No 20 - 10', '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('telefono', 'Telefono') !!}
					{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '325698785', '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nacimiento', 'Fecha De Nacimiento') !!}
					{!! Form::date('nacimiento', null, ['class' => 'form-control', 'placeholder' => '02/04/1994']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Contraseña') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('rol', 'Nivel De Usuario') !!}
					{!! Form::select('rol', ['estudiante' => 'Estudiante'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'rol']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('imagen', 'Imagen') !!}
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