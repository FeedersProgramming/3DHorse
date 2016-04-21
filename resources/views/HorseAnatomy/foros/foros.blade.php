<?php

$respuestas = $foros[0]->respuestas;
$identificador = $foros[0]->id_foro;
//echo $foros[0]->id_foro;
?>

<html style="background-color: #f8f5f0;">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')



<body class="well" style="background-color: #f8f5f0;">
	<div class="page-header" style="padding-left: 1%;">
		<h2>Foro <small> {{ $grupo->nombre }}</small></h2>
	</div>
	<div class="row col-lg-6">
		<div class="bs-component">
			<blockquote class="blockquote-reverse">
				<p>{{ $foros[0]->mensaje }}</p>
				<small>{{ $foros[0]->titulo }} - <cite title="Source Title">{{ $foros[0]->nombre . ' ' . $foros[0]->apellido }}</cite></small>
			</blockquote>
		</div>
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
				@if(count($contestadas) != 0)
				@foreach ($contestadas as $foro) 
				<tr class="" style="vertical-align:middle;">
					<td width="15%" style="vertical-align:middle;">
						<!--<a href=" {{ route('HorseAnatomy.foro.foro', $foro->id_foro) }} " title="Ver Participaciones" style="color:black;  border-bottom: thin dashed;">{{ $foro->titulo }}</a>-->
						{{ $foro->titulo }}
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
						No Hay Respuestas Para Este Tema, Se El Primero En Comentar¡
					</td>
				</tr>
				@endif
			</tbody>
			<tfoot class="tfoot-default text-center">
				<tr class="panel" style="background-color: #93c54b; opacity: 0.9; vertical-align:middle; height: 10px;">
					<th colspan="2" class="text-left" style="vertical-align:middle;"><a href=" {{ route('HorseAnatomy.foro.show', $grupo->id)}} " style="color: black;">Volver</a></th>
					<th></th>
					<th></th>
					<th colspan="2" class="text-right" style="vertical-align:middle;"><a href=" {{ route('HorseAnatomy.foro.crear', $grupo->id.'-'.$foros[0]->respuestas.'-'.$foros[0]->id_foro)}} " style="color: black;">Responder</a></th>
				</tr>
			</tfoot>
		</table> 
	</div>
	<div class="text-center">
		{!! $contestadas->render() !!}
	</div>
</body>

</html>