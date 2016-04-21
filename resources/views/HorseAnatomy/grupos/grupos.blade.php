<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')

<body class="well">
	
	<div class="row">
		<h2 class="text-center">Grupos</h2>
	</div>
	<div class="row text-center" >
		{!! Form::open(['route' => 'HorseAnatomy.grupos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		
		<a href="{{ route('HorseAnatomy.grupos.create') }}" class="btn btn-success">Nuevo</a>

		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Grupo', 'aria-describedby' => 'search'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>

		{!! Form::close() !!}
	</div><br>


	<div class="row">
		@foreach($grupos as $grupo)
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><a href=" {{ route('HorseAnatomy.grupos.edit', $grupo->id) }}"><h5>{{ $grupo->nombre }}</h5></a></div>
				<div class="panel-body">
					<img src="{{ asset('plugin/imagenes/grupos/grupos.jpg') }}" height="25%" width="100%">
				</div>
				<div class="panel-footer">
					<div class="text-right">
						<a href=" {{ route('HorseAnatomy.grupos.grupo', $grupo->id) }} " title="Foro" class="glyphicon glyphicon-comment"></a>
						<a href=" {{ route('HorseAnatomy.grupos.grupo', $grupo->id) }} " title="Ver Grupo" class="glyphicon glyphicon-eye-open"></a>
						@if(Auth::user()->rol == 'administrador' || Auth::user()->id == $grupo->creador)
						
						<a href=" {{ route('HorseAnatomy.grupos.edit', $grupo->id) }} " title="Editar Grupo" class="glyphicon glyphicon-pencil"></a>
						<a href=" {{ route('HorseAnatomy.grupos.destroy', $grupo->id) }} " title="Eliminar Grupo" onclick="return confirm('¿Seguro Desea Eliminar?');" class="glyphicon glyphicon-trash"></a>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="text-center">
		{!! $grupos->render() !!}
	</div>

	<script type="text/javascript">

		function eliminar(){
			//alert('hola');
			return confirm('¿Seguro Desea Eliminar?');
		}

	</script>
</body>
</html>