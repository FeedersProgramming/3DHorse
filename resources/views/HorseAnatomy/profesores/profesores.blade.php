<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div class="row">
		<h2 class="text-center">Profesores</h2>
	</div>
	<div class="row">
		<div class="row text-right">
			
			{!! Form::open(['route' => 'HorseAnatomy.profesores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

			<a href="{{ route('HorseAnatomy.profesores.create') }}" class="btn btn-success">Nuevo</a>

			<div class="input-group">
				{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Profesor', 'aria-describedby' => 'search'])!!}
				<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
			</div>

			{!! Form::close() !!}
		</div><br>
	</div>
	<div class="row" >
		@foreach($profesores as $profesor)
		<div class="col-sm-2 col-md-2">
			<div class="thumbnail">
				<img src="{{ asset('plugin/imagenes/'. $profesor->imagen) }}" alt="">
				<div class="caption">
					<h6>{{ $profesor->nombre . ' ' . $profesor->apellido }}</h6>
					<div class="text-right">
						<a href=" {{ route('HorseAnatomy.profesores.edit', $profesor->id) }} " class="glyphicon glyphicon-pencil"></a>
						<a href=" {{ route('HorseAnatomy.profesores.destroy', $profesor->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash"></a>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="text-center" >
		{!! $profesores->render() !!}
	</div>
</body>

</html>