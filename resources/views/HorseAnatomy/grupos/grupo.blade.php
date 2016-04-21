<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')

<body class="well">
	
	<div class="row">
		<h3 class="text-center">{{ $grupo->nombre }}</h3>
	</div><br>
	<div class="row " >
		<div class="col-sm-1 col-md-1">
		</div>
		<div class="col-sm-10 col-md-10">
			{!! Form::open(['route' => 'HorseAnatomy.grupos.grupo_almacenar', 'method' => 'POST', 'class' => '']) !!}

			{!! Form::hidden('grupo', $grupo->id, ['class' => 'form-control', 'id' => 'grupo', ])!!}
			<div class="input-group" style="width: 100%;">
				
				{!! Form::select('estudiantes[]', $users_nuevos, null, ['class' => 'form-control', 'multiple', 'id' => 'estudiantes', 'aria-describedby' => 'search', 'style' => 'width: 80%'])!!}
				{!! Form::submit('Ingresar', ['class' => 'btn btn-default btn-sm'])!!}
			</div>

			{!! Form::close() !!}
		</div>	
	</div><br>
	<div class="row" >
		<div class="col-sm-12 col-md-14">

			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->nombre }}</td>
						<td>{{ $user->apellido }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->rol }}</td>
						<td><a href=" {{ route('HorseAnatomy.grupos.eliminar_grupo', $user->id . '_' . $grupo->id) }} " title="Eliminar Del Grupo" onclick="return confirm('¿Seguro Desea Eliminar?');" class="glyphicon glyphicon-trash"></a></td>
					</tr>
					@endforeach
				</tbody>
			</table> 
		</div>
		
		<div class="row" >
			<div class="col-sm-12 col-md-14">
				<div class="text-center" >
					{!! $users->render() !!}
				</div>
				<div class="text-right" >
					{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>
				
			</div>
		</div>
	</div>

	<!--<div class="row bs-component" style="border-left: solid blue;">
		<div class="col-sm-1 col-md-1">
		</div>
		<div class="col-sm-8 col-md-10">
			<blockquote>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				<small>Someone famous in <cite title="Source Title">Source Title</cite></small>
			</blockquote>
		</div>
	</div>-->
	{!! Form::close() !!}

	<script type="text/javascript">

		$("#estudiantes").chosen({
			placeholder_text_multiple: "Seleccione Maximo 4 Estudiantes",
			max_selected_options: 4,
			search_contains: true,
			no_results_text: 'No Se Encontraron Resultados'
		});
	</script>

</body>

</html>