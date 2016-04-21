<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Editar Grupo - {{ $grupo->nombre }}</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-6">

				{!! Form::open(['route' => ['HorseAnatomy.grupos.update', $grupo], 'method' => 'PUT', 'files' => true]) !!}

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre') !!}
					{!! Form::text('nombre', $grupo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Contraseña') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
				</div>

				<div class="form-group">
					<div class="col-xs-2 col-md-2">
						<a href="#" class="thumbnail">
							<img src="{{ asset('plugin/imagenes/grupos/'. $grupo->imagen) }}" alt="...">
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