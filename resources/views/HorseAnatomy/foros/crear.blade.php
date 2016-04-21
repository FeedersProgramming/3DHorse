<html style="background-color: #f8f5f0;">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')



<body class="well" style="background-color: #f8f5f0;">
	<div class="page-header" style="padding-left: 1%;">
		<h2>Foro <small> {{ $grupo->nombre }}</small></h2>
	</div>

	<legend class="text-right">Creacion De Nuevo Tema</legend>
	<div class="row" id="tabla" style="padding-left: 10%; width: 90%;">

		{!! Form::open(['route' => 'HorseAnatomy.foro.store', 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true]) !!}
		<fieldset>
			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 control-label">Usuario </label>
				<div class="col-lg-10">
					{!! Form::hidden('id_grupo', $grupo->id, ['class' => 'form-control']) !!}
					{!! Form::hidden('id_user', Auth::user()->id, ['class' => 'form-control', 'required']) !!}
					{!! Form::hidden('respuestas', $respuestas, ['class' => 'form-control']) !!}
					{!! Form::hidden('identificador', $identificador, ['class' => 'form-control', 'required']) !!}
					{!! Form::text('Usuario', Auth::user()->nombre . ' ' . Auth::user()->apellido, ['class' => 'form-control', 'disabled', 'required']) !!}
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 control-label">Titulo </label>
				<div class="col-lg-10">
					{!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo Del Tema', 'required']) !!}
				</div>
			</div>
			<div class="form-group">
				<label for="textArea" class="col-lg-2 control-label">Mensaje</label>
				<div class="col-lg-10">
					{!! Form::textarea('mensaje', null, ['class' => 'form-control', 'placeholder' => 'Mensaje', 'style' => 'margin: 0px -0.84375px 0px 0px; width: 100%; height: 102px;', 'required']) !!}
					<span class="help-block">Espacio Para Escribir El Tema A Debatir.</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					{!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
					{!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
				</div>
			</div>
		</fieldset>
		{!! Form::close() !!}

	</div>
</body>

</html>