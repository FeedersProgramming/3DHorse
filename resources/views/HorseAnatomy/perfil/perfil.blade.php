<html class="well">

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@include('HorseAnatomy.template.head')



<script type="text/javascript">


	$('[data-toggle="tooltip"]').tooltip(); 
	/*var datos;

	$.ajax({
		url: 'hola/{{ Auth::user()->id }}',
		type: 'GET',
		dataType: 'json',
		data: {id: '{{ Auth::user()->id }}'},
		async: false,
	})
	.done(function(dato) {

		datos = (dato);
		//console.log(dato);
	})

	console.log('hola ', datos);

	var chart = AmCharts.makeChart("chartdiv", {
		"type": "pie",
		"startDuration": 0,
		"theme": "light",
		"addClassNames": true,
		"legend":{
			"position":"right",
			"marginRight":100,
			"autoMargins":false
		},
		"innerRadius": "30%",
		"defs": {
			"filter": [{
				"id": "shadow",
				"width": "200%",
				"height": "200%",
				"feOffset": {
					"result": "offOut",
					"in": "SourceAlpha",
					"dx": 0,
					"dy": 0
				},
				"feGaussianBlur": {
					"result": "blurOut",
					"in": "offOut",
					"stdDeviation": 5
				},
				"feBlend": {
					"in": "SourceGraphic",
					"in2": "blurOut",
					"mode": "normal"
				}
			}]
		},
		"dataProvider": datos,
		"valueField": "value",
		"titleField": "Evaluacion",
		"export": {
			"enabled": true
		}
	});

	chart.addListener("init", handleInit);

	chart.addListener("rollOverSlice", function(e) {
		handleRollOver(e);
	});

	function handleInit(){
		chart.legend.addListener("rollOverItem", handleRollOver);
	}

	function handleRollOver(e){
		var wedge = e.dataItem.wedge.node;
		wedge.parentNode.appendChild(wedge);  
	}*/

</script>

<style type="text/css">
	
	#chartdiv {
		width: 100%;
		height: 500px;
		font-size: 11px;
	}

	.amcharts-pie-slice {
		transform: scale(1);
		transform-origin: 50% 50%;
		transition-duration: 0.3s;
		transition: all .3s ease-out;
		-webkit-transition: all .3s ease-out;
		-moz-transition: all .3s ease-out;
		-o-transition: all .3s ease-out;
		cursor: pointer;
		box-shadow: 0 0 30px 0 #000;
	}

	.amcharts-pie-slice:hover {
		transform: scale(1.1);
		filter: url(#shadow);
	}																		

</style>

<body class="well">
	<div class="well" id="page-wrapper">
		<div class="row" id="info_personal" name="info_personal">
			<h3 class="text-center">Informacion Personal</h3><br><br>
			<div class="row">
				<div class="col-xs-2 col-md-2">
					<a href="#" class="thumbnail">
						<img src="{{ asset('plugin/imagenes/' . Auth::user()->imagen) }}" >	
					</a>
				</div>
				<div class="col-xs-5 col-md-3">
					<strong>Nombre : </strong> <span id=""> <tab> {{ Auth::user()->nombre }} </span><br><br>
					<strong>Apellido : </strong> <span id=""> <tab> {{ Auth::user()->apellido }} </span><br><br>
					<strong>Direccion : </strong> <span id=""> <tab> {{ Auth::user()->direccion }} </span>
				</div>

				<div class="col-xs-5 col-md-3">
					<strong>Telefono :</strong> <span id=""> <tab> {{ Auth::user()->telefono }} </span><br><br>
					<strong>Email :</strong> <span id=""> <tab> {{ Auth::user()->email }} </span><br><br>
					<strong>Rol :</strong> <span id=""> <tab> {{ Auth::user()->rol }} </span>
				</div>							
			</div>
			<div class="row">
				@if(count($grupos) > 0)
				
				<div class="row" style="">
					
					<div class="col-sm-1 col-md-1">
					</div>
					<div class="col-sm-2 col-md-10 text-right" style="border-right: solid black; width:95%;">
						<h4 class="text-center">Mis Grupos <a href=" {{ route('HorseAnatomy.grupos.asignar', Auth::user()->id) }} " class="glyphicon glyphicon-plus" title="Asignar Grupo"> </a></h4>
						@foreach($grupos->grupos as $grupo)
						<h5>{{ $grupo->nombre }}</h5>
						<a href=" {{ route('HorseAnatomy.foro.show', $grupo->id) }} " title="Foro" class="glyphicon glyphicon-comment"></a>
						<a href=" {{ route('HorseAnatomy.grupos.grupo', $grupo->id) }} " title="Ver Grupo" class="glyphicon glyphicon-eye-open"></a>
						@if(Auth::user()->id != $grupo->creador)
						<a href=" {{ route('HorseAnatomy.grupos.grupo_desasignar', $grupo->id) }} " onclick="return confirm('¿Seguro Desea Salir?')" class="glyphicon glyphicon-erase" title="Darme De Baja"></a>
						@endif
						@endforeach
					</div>
				</div>

				@else
				<h5 class="text-center">{{ 'No Hay Grupos Asignados' }} <a href=" {{ route('HorseAnatomy.grupos.asignar', Auth::user()->id) }} " class="glyphicon glyphicon-plus" title="Asignar Grupo"> </a></h5> 
				@endif

			</div>
		</div>
		<!--<div class="row" id="info_graficas" name="info_graficas">
			<a href="#progreso" data-toggle="modal" data-target="#progreso">
				<div class="col-sm-5 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('plugin/imagenes/progreso_eva.png') }}">
						<div class="panel-footer">Progreso Evaluativo</div>
					</div>
				</div>
			</a>
			<a href="">
				<div class="col-sm-5 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('plugin/imagenes/progreso_eva.png') }}">
						<div class="panel-footer">Progreso Evaluativo</div>
					</div>
				</div>
			</a>
			<a href="">
				<div class="col-sm-5 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('plugin/imagenes/progreso_eva.png') }}">
						<div class="panel-footer">Progreso Evaluativo</div>
					</div>
				</div>
			</a>
		</div>-->
	</div>
</body>

<div id="progreso" class="modal fade" role="dialog">
	<!-- <div class="modal-dialog modal-lg"> Grande--> 
	<!-- <div class="modal-dialog modal-sm"> Pequeño-->
	<div class="modal-dialog"><!-- Mediano -->

		<!-- Modal content-->

		<div class="modal-content" id="">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Progreso General</h4><br>
			</div>
			<div class="modal-body" id="modal_body">

				<div id="chartdiv"></div>

			</div>
		</div>
		<div class="modal-footer">

		</div>
	</div>

</div>

</html>