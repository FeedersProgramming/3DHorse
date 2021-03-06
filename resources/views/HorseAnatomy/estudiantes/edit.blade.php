<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Editar Usuarios - {{ $user->nombre . ' ' . $user->apellido }}</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-6">

				{!! Form::open(['route' => ['HorseAnatomy.estudiantes.update', $user], 'method' => 'PUT', 'files' => true]) !!}

				<div class="form-group">
					{!! Form::label('cedula', 'Cedula') !!}
					{!! Form::text('id', $user->id, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required', 'editable']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre') !!}
					{!! Form::text('nombre', $user->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('apellido', 'Apellido') !!}
					{!! Form::text('apellido', $user->apellido, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('genero', 'Genero') !!}
					{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], $user->genero, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('direccion', 'Direccion') !!}
					{!! Form::text('direccion', $user->direccion, ['class' => 'form-control', 'placeholder' => 'Cra 8 No 20 - 10', '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('telefono', 'Telefono') !!}
					{!! Form::text('telefono', $user->telefono, ['class' => 'form-control', 'placeholder' => '325698785', '']) !!}
				</div>

				<div class="form-group" >
					{!! Form::label('email', 'Email') !!}
					{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nacimiento', 'Fecha De Nacimiento') !!}
					{!! Form::date('nacimiento', $user->nacimiento, ['class' => 'form-control', 'placeholder' => '02/04/1994']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Contraseña') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('rol', 'Nivel De Usuario') !!}
					{!! Form::select('rol', ['estudiante' => 'Estudiante'], $user->rol, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'rol', 'disable']) !!}
				</div>

				<div class="form-group">
					<div class="col-xs-2 col-md-2">
						<a href="#" class="thumbnail">
							<img src="{{ asset('plugin/imagenes/'. $user->imagen) }}" alt="...">
						</a>
					</div>
					{!! Form::label('imagen', 'Imagen') !!}
					{!! Form::file('imagen', ['class' => '']) !!}
				</div>
				<br><br><br><br><br>
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