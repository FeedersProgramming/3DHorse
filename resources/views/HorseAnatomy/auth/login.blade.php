@extends('HorseAnatomy.template.login')

@section('titulo', 'HorseAnatomy | Main')

@section('jss')

<script type="text/javascript">

	$(document).ready(function(){



	});	

</script>

@if(empty($tema))

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@else 	

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/' . $tema .'/bootstrap.css') }}" id="css_cambio">

@endif
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@endsection



@section('imagenes')

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
	<!-- Indicators -->

	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" style="width: 100%; height: 550px;">
		<div class="item active"> 
			<iframe width="100%" height="550px" src="https://sketchfab.com/models/b5cf251297f74159a2f00476cd59d20c/embed?autostart=1" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
			<div class="container">
				<div class="carousel-caption">
					<h1>Slide 1</h1>
					<p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>
				</div>
			</div>
		</div>
		<div class="item"> 
			<iframe width="100%" height="550px" src="https://sketchfab.com/models/16b4ae66b9134e6d951e7081e1fc69a0/embed?autostart=1" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
			<div class="container">
				<div class="carousel-caption">
					<h1>Slide 2</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae egestas purus. </p>
				</div>
			</div>
		</div>
		<div class="item"> 
			<iframe width="100%" height="550px" src="https://sketchfab.com/models/01a12d384a604ad28a3af619b6d45124/embed?autostart=1" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
			<div class="container">
				<div class="carousel-caption">
					<h1>Slide 3</h1>
					<p>Donec sit amet mi imperdiet mauris viverra accumsan ut at libero.</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
</div>

@endsection

@section('login')

<div id="login" name="login">

	{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}

	<div class="col-lg-12">
		<h3>Login<span></span></h3>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-12">
				<input type="text" class="form-control" id="email" name="email" placeholder="Email">
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Contraseña</label>
			<div class="col-lg-12">
				<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<div class="checkbox">
				<label>
					<input type="checkbox"> Recordarme 
				</label>
			</div>
		</div>
	</div>
	<div class="col-lg-10">
		<div class="form-group">
			<div class="col-lg-10"><br>
				<button type="submit" class="btn btn-primary btn-sm">Entrar</button>
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
</div>


<div id="registrar" name="registrar" style="overflow: scroll; height:450px; ">

	<br>
	<div class="col-lg-12">
		<h3>Registrar<span></span></h3>
	</div>


	{!! Form::open(['route' => 'registrar', 'method' => 'POST', 'files' => true]) !!}

	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('cedula', 'Cedula') !!}
			{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('apellido', 'Apellido') !!}
			{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('genero', 'Genero') !!}
			{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('nacimiento', 'Fecha De Nacimiento') !!}
			{!! Form::date('nacimiento', null, ['class' => 'form-control', 'placeholder' => 'Fecha De Nacimiento', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('direccion', 'Direccion') !!}
			{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Cra 8 No 20 - 10', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('telefono', 'Telefono') !!}
			{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '325698785', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('password', 'Contraseña') !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('rol', 'Rol') !!}
			{!! Form::select('rol', ['profesor' => 'Profesor', 'estudiante' => 'Estudiante'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Rol', 'required', 'id' => 'rol', 'onchange' => 'mostrarpass()']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('pass', 'Contraseña Grupo', ['id' => 'passs']) !!}
			{!! Form::text('pass', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'id' => 'pass', 'name' => 'pass']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('imagen', 'Imagen') !!}
			{!! Form::file('imagen', ['class' => '',  'accept' => 'image/*']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-default btn-sm'])!!}
			{!! Form::reset('Limpiar', ['class' => 'btn btn-default btn-sm'])!!}
		</div>
	</div>
	{!! Form::close() !!}

</div>

<div id="recuperacion" name="recuperacion">

	<br>
	<div class="col-lg-12">
		<h3>Recuperacion De Contraseña<span></span></h3>
	</div>
	{!! Form::open(['route' => 'recuperar', 'method' => 'POST', 'files' => true]) !!}

	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'required']) !!}
		</div>
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::submit('Recuperar', ['class' => 'btn btn-default btn-sm'])!!}
			{!! Form::reset('Limpiar', ['class' => 'btn btn-default btn-sm'])!!}
		</div>
	</div>
	{!! Form::close() !!}
</div>

<div class="col-lg-10">
	<div class="form-group">
		<div class="col-lg-14"><br>
			<a href="#" id="btn_login" onclick="mostrar_login()" name="btn_login" class="btn btn-default  btn-xs">Login</a>
			<a href="#" id="btn_registrar" onclick="mostrar_registrar()" name="btn_registrar" class="btn btn-default  btn-xs">Registrar</a>
			<a href="#" id="btn_recuperar" onclick="mostrar_recuperar()" name="btn_recuperar" class="btn btn-default  btn-xs">Recuperar Contraseña</a>
		</div>
	</div>
	@include('flash::message')
</div>

@endsection

@section('js')

@endsection