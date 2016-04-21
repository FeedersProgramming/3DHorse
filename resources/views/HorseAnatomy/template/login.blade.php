<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> Login | 3DHorse </title>
	
	@include('HorseAnatomy.template.head_login')

	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/variables.less') }}" class="cssdeck">
	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/bootswatch.less') }}" class="cssdeck">
	<script type="text/javascript" src="{{ asset('plugin/js/less/less.js') }}"></script>

	@yield('jss')

</head>

<body onresize="">

	@include('HorseAnatomy.template.nav_login') 
	
	<div class="todo">
		<ul id="navegacion" class="breadcrumb text-right">
			<li><a href="#" id="Inicio" onclick="cambio('1')">Inicio</a></li>
			<li><a href="#" id="Login" onclick="cambio('2')">Ingreso</a></li>
		</ul>

		<div class="div_nav_left" id="div_nav_left" name="div_nav_left">
			@include('HorseAnatomy.template.imagenes')
		</div>

		<div class="div_contenido well" id="div_contenido" name="div_contenido">
			<div id="login" name="login">
				
				{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
				{!! csrf_field() !!}
				<div class="work-title">
					<h3>Login<span></span></h3>
				</div><br>
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('contraseña', 'Contraseña') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'required']); !!}

				</div>
				<div class="checkbox">
					<label><input type="checkbox">Recuerdame</label>
				</div>
				{!! Form::submit('Login', ['class' => 'btn btn-default']) !!}
			</div>
			{!! Form::close() !!}

			<div id="registrar" name="registrar" style="height: 88%; overflow-y:scroll;">
				<div class="work-title">
					<h3>Registro<span></span></h3>
				</div><br>
				{!! Form::open(['route' => 'registrar', 'method' => 'POST', 'files' => true]) !!}

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
					{!! Form::select('rol', ['profesor' => 'Profesor', 'estudiante' => 'Estudiante'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'rol']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('imagen', 'Imagen') !!}
					{!! Form::file('imagen', ['class' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
					{!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
				</div>

				{!! Form::close() !!}
			</div>

			<div id="recuperar" name="recuperar">
				{!! Form::open(['route' => 'recuperar', 'method' => 'POST']) !!}
				{!! csrf_field() !!}
				<div class="work-title">
					<h3>Recuperaracion De Contraseña<span></span></h3>
				</div><br>
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
				</div>
				{!! Form::submit('Recuperar', ['class' => 'btn btn-default']) !!}
			</div>
			<br>
			<a href="#" id="alogin"><p class="text-primary text-right" onclick="cambio('3')">Ingresar</p></a>
			<a href="#" id="aregi"><p class="text-primary text-right" onclick="cambio('4')">Registrarme</p></a>
			<a href="#" id="arecu"><p class="text-primary text-right" onclick="cambio('5')">¿Olvidaste Tu Contraseña?</p></a>

			<div class="text-center">
				@include('flash::message')
			</div>
		</div>

	</div>

</div>

@include('HorseAnatomy.template.footer_login') 

</body>

@yield('js')

</html>	
