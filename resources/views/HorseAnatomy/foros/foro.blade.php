<?php

$respuestas = 0;
$identificador = 0;

?>

<html style="background-color: #f8f5f0;">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')



<body class="well" style="background-color: #f8f5f0;">
	<div class="page-header" style="padding-left: 1%;">
		<h2>Foro <small> {{ $grupo->nombre }}</small></h2>
	</div>

	<div class="row table-responsive panel panel-primary" id="tabla" style="left: 10%; width: 100%;">
		<table class="table table-striped table-hover" >
			<thead class="thead-default text-center">
				<tr class="panel" style="background-color: #93c54b; opacity: 0.9; vertical-align:middle;">
					<th>Titulo</th>
					<th>Autor</th>
					<th>Mensaje</th>
					<th>Respuestas</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody class="">
				@if(count($foros) != 0)
				@foreach ($foros as $foro) 
				<tr class="" style="vertical-align:middle;">
					<td width="15%" style="vertical-align:middle;">
						<a href=" {{ route('HorseAnatomy.foro.foro', $foro->id_foro) }} " title="Ver Participaciones" style="color:black;  border-bottom: thin dashed;">{{ $foro->titulo }}</a>
					</td>
					<td width="15%" style="vertical-align:middle;">{{ $foro->nombre . ' ' . $foro->apellido }}</td>
					<td width="35%" style="vertical-align:middle;">{{ $foro->mensaje }}</td>
					<td width="5%" style="vertical-align:middle;">{{ $foro->respuestas }}</td>
					<td width="10%" style="vertical-align:middle;">{{ $foro->fecha }}</td>
				</tr>
				@endforeach

				@else
				<tr>
					<td colspan="5">
						No Hay Preguntas Por Contestar, Puedes Ser El Primero En Participar¡
					</td>
				</tr>
				@endif
			</tbody>
			<tfoot class="tfoot-default text-center">
				<tr class="panel" style="background-color: #93c54b; opacity: 0.9; vertical-align:middle; height: 10px;">
					<th colspan="2" class="text-left" style="vertical-align:middle;"><a href=" {{ route('HorseAnatomy.perfil.info_perfil', Auth::user()->id) }} " style="color: black;">Volver</a></th>
					<th></th>
					<th></th>
					<th colspan="2" class="text-right" style="vertical-align:middle;"><a href=" {{ route('HorseAnatomy.foro.crear', $grupo->id.'-'.$respuestas.'-'.$identificador)}} " style="color: black;">Crear Tema Nuevo</a></th>
				</tr>
			</tfoot>
		</table> 
	</div>
	<div class="text-center">
		@if(!empty($respuestas))
		{!! $foros->render() !!}
		@endif
	</div>
</body>

</html>