
<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

<body class="well">
	
	<div class="row" s>
		<h2 class="text-center">Administradores</h2>
	</div>
	<div class="row">
		<div class="row text-right" >
			
			{!! Form::open(['route' => 'HorseAnatomy.administradores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

			<a href="{{ route('HorseAnatomy.administradores.create') }}" class="btn btn-success">Nuevo</a>

			<div class="input-group">
				{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Profesor', 'aria-describedby' => 'search'])!!}
				<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
			</div>

			{!! Form::close() !!}
		</div><br>
	</div>
	<div class="row" >
		@foreach($administradores as $administrador)
		<div class="col-sm-2 col-md-2">
			<div class="thumbnail">
				<img src="{{ asset('plugin/imagenes/'. $administrador->imagen) }}" alt="">
				<div class="caption">
					<h6>{{ $administrador->nombre . ' ' . $administrador->apellido }}</h6>
					<div class="text-right">
						<a href=" {{ route('HorseAnatomy.administradores.edit', $administrador->id) }} " class="glyphicon glyphicon-pencil"></a>
						<a href=" {{ route('HorseAnatomy.administradores.destroy', $administrador->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash"></a>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="text-center" >
		{!! $administradores->render() !!}
	</div>
</body>