<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')

<script type="text/javascript">


	function asignar_grupo(id, nombre, pass)
	{	
		var contra = prompt("Por Favor Digite La Contraseña De Acceso Al Grupo - " + nombre, '************');

		if (contra == pass) 
		{
			alert('Exitos');
			window.location="../../grupos/"+id+"/grupo_asignar";
		}else{
			alert('Verifique La Contraseña y Vuelva a Intentarlo¡¡');
		}

	}

</script>

<body class="well">

	<div class="row">
		<h2 class="text-center">Grupos Disponibles</h2><br>
	</div>

	<div class="row">
		@if(count($grupos))
		@foreach($grupos as $grupo)
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><a href=" {{ route('HorseAnatomy.grupos.edit', $grupo->id) }}"><h5>{{ $grupo->nombre }}</h5></a></div>
				<div class="panel-body">
					<img src="{{ asset('plugin/imagenes/grupos/grupos.jpg') }}" height="25%" width="100%">
				</div>
				<div class="panel-footer">
					<div class="text-right">
						<a href="#" onclick="asignar_grupo({{$grupo->id}}, '{{$grupo->nombre}}', '{{$grupo->password}}')" title="Foro" class="glyphicon glyphicon-plus"></a>

						@if(Auth::user()->rol == 'administrador' || Auth::user()->id == $grupo->creador)
						<a href=" {{ route('HorseAnatomy.grupos.grupo', $grupo->id) }} " title="Ver Grupo" class="glyphicon glyphicon-eye-open"></a>
						<a href=" {{ route('HorseAnatomy.grupos.edit', $grupo->id) }} " title="Editar Grupo" class="glyphicon glyphicon-pencil"></a>
						<a href=" {{ route('HorseAnatomy.grupos.destroy', $grupo->id) }} " title="Eliminar Grupo" onclick="return confirm('¿Seguro Desea Eliminar?');" class="glyphicon glyphicon-trash"></a>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@else
		<h4 class="text-right">No Hay Grupos Disponibles</h4><br>
		@endif
	</div>
	<div class="text-center">

	</div>

	<script type="text/javascript">

		function eliminar(){
			//alert('hola');
			return confirm('¿Seguro Desea Eliminar?');
		}

	</script>
</body>
</html>