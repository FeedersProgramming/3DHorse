@extends('HorseAnatomy.template.main')

@section('titulo', 'HorseAnatomy | Main')

@section('jss')

@if(empty($tema))

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@else 	

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/' . $tema .'/bootstrap.css') }}" id="css_cambio">

@endif




@endsection

@section('contenido')


<x3d id="simulacion">
	<button onclick="ajjj();">dfdfdf</button>
	<button onclick="pregunta();">dfdfdf</button>
	<button onclick="nextp();">dfdfdf</button>
	<scene>

		<navigationinfo id="nav" headlight="true" type="turntable" typeparams="0.0 0.0 0.1 3.0" explorationmode="all"  speed="1" transitiontime="1" transitiontype="LINEAR "></navigationinfo>
		
		<Viewpoint centerOfRotation='4.289328840610026,-15.27124738210582,58.98660557169316' position="-148.67324 -17.68958 -32.18736" orientation="0.02216 0.99900 0.03891 4.17608" 
		zNear="67.40322" zFar="288.22855" description=""></Viewpoint>
		
		<Transform id="modelo">

			<Inline nameSpaceName="light" id="siervo" onload ="modelo()" mapDEFToID="true" url="{{ asset('plugin/Modelos/moodelo_end.x3d') }}"  /> 
		</Transform>
	</scene>
</x3d>



<div class="info-panel dock-top dock-right ui-draggable" id="info_panel" style="top: 71px; left: 628px;">

	<div class="info-panel-top">
		<span id="info_panel_title">Male</span>
		<img src="shim.gif" height="1" width="1" class="icon-minimize" alt="Hide Description" title="Hide Description">
	</div>


	<div id="info_panel_body" class="info-panel-body">

		<div id="info" >
			In human anatomy, the pelvis (plural pelvises) is either the lower part of the trunk,[1] between the abdomen and the thighs (sometimes also called pelvic region of the trunk) or the skeleton embedded in it[2] (sometimes also called bony pelvis, or pelvic skeleton).


		</div>



	</div>
	<div id="readmore">
		Read more..
		<br>
	</div>
</div>

<div class="panel_evaluacion dock-top dock-right ui-draggable" id="panel_evaluacion" style="top: 71px; left: 10px;">

	<div class="pe_top">
		<span id="info_panel_title">Informacion</span>
		<img src="shim.gif" height="1" width="1" class="icon-minimize" alt="Hide Description" title="Hide Description">
	</div>


	<div id="pe_body" >

		


	</div>
	<div id="pe_botones">
		<a href="#" class="btn btn-danger btn-sm" onclick="nextp();">Siguiente</a>
		<br>
		

	</div>
</div>


<div id="prueba">
	
	<div id="tabsleft" class="tabbable tabs-left">
		<ul>	
			<li class="active"><a href="#inicio" data-toggle="tab">Inicio</a></li>
			@for ($i = 1; $i < 11; $i++)
			<li><a href="#pregunta_{{ $i }}" data-toggle="tab">{{ $i }}</a></li>
			@endfor
			<li><a href="#final" data-toggle="tab">Final</a></li>
		</ul><br>
		
		<div class="tab-content" id="preguntas">
			<div class="tab-pane" id="inicio" >
				<br>
				<h5><label class="tree-toggler nav-header ">
					Pregunta Hueso Pregunta Hueso Pregunta Hueso Pregunta Hueso Pregunta Hueso
				</label></h5> 
				<hr>
				<div class="form-group">
					<div>
						<label> <input type="hidden" name="text" id="text" value="4"> </label>
					</div>
					<div>
						<label> <input type="hidden" name="text" id="text" value="respuesta"> </label>
					</div>
					<div class="row col-lg-3">
						<label class="col-lg-2 control-label">Asociar</label>
					</div>
					<div class="row col-lg-3">
						
						<div class="radio"> 
							<label>
								<input type="radio" name="opc_pregunta_'+i+'" id="opc_pregunta_'+i+'" value="Falso">
								Falso 
							</label> 
						</div>
					</div>
					<div class="row col-lg-3">
						
						<div class="radio"> 
							<label>
								<input type="radio" name="opc_pregunta_'+i+'" id="opc_pregunta_'+i+'" value="Falso">
								Falso 
							</label> 
						</div>
					</div>
					<div class="row col-lg-3">
						
						<div class="radio"> 
							<label>
								<input type="radio" name="opc_pregunta_'+i+'" id="opc_pregunta_'+i+'" value="Falso">
								Falso 
							</label> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<div id="usuarios" name="usuarios">
	
	<div id="estudiantes" name="estudiantes">
		<div class="row">
			@foreach($estudiantes as $estudiante)
			<div class="col-sm-2 col-md-2" style="overflow-y: scroll; overflow-x: hidden;">
				<div class="thumbnail">
					<img src="{{ asset('plugin/imagenes/masculino.png') }}" alt="...">
					<div class="caption">
						<h5>{{ $estudiante->nombre . ' ' . $estudiante->apellido }}</h5>
						<p>...</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
		<div class="text-left">
			{!! $estudiantes->render() !!}
		</div>
	</div>

	<div id="profesores" name="profesores">
		<div class="row">
			<div class="col-sm-2 col-md-3">
				<div class="thumbnail">
					<img src="{{ asset('plugin/imagenes/masculino.png') }}" alt="...">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>...</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div id="grupos" name="grupos">
	
	grupos

</div>

@endsection

@section('js')

<script>
	$(document).ready(function() {
		$('#rootwizard').bootstrapWizard({'tabClass': 'nav', 'debug': false, onShow: function(tab, navigation, index) {
			console.log('onShow');
		}, onNext: function(tab, navigation, index) {
			console.log('onNext');
		}, onPrevious: function(tab, navigation, index) {
			console.log('onPrevious');
		}, onLast: function(tab, navigation, index) {
			console.log('onLast');
		}, onTabClick: function(tab, navigation, index) {
			console.log('onTabClick');
			alert('on tab click disabled');
		}, onTabShow: function(tab, navigation, index) {
			console.log('onTabShow');
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});

		$('#pills').bootstrapWizard({'tabClass': 'nav nav-pills', 'debug': false, onShow: function(tab, navigation, index) {
			console.log('onShow');
		}, onNext: function(tab, navigation, index) {
			console.log('onNext');
		}, onPrevious: function(tab, navigation, index) {
			console.log('onPrevious');
		}, onLast: function(tab, navigation, index) {
			console.log('onLast');
		}, onTabClick: function(tab, navigation, index) {
			console.log('onTabClick');
			alert('on tab click disabled');
		}, onTabShow: function(tab, navigation, index) {
			console.log('onTabShow');
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#pills .progress-bar').css({width:$percent+'%'});
		}});

		$('#tabsleft').bootstrapWizard({'tabClass': 'nav nav-tabs', 'debug': false, onShow: function(tab, navigation, index) {
			console.log('onShow');
		}, onNext: function(tab, navigation, index) {
			console.log('onNext');
		}, onPrevious: function(tab, navigation, index) {
			console.log('onPrevious');
		}, onLast: function(tab, navigation, index) {
			console.log('onLast');
		}, onTabClick: function(tab, navigation, index) {
			console.log('onTabClick');

		}, onTabShow: function(tab, navigation, index) {
			console.log('onTabShow');
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#tabsleft .progress-bar').css({width:$percent+'%'});

						// If it's the last tab then hide the last button and show the finish instead
						if($current >= $total) {
							$('#tabsleft').find('.pager .next').hide();
							$('#tabsleft').find('.pager .finish').show();
							$('#tabsleft').find('.pager .finish').removeClass('disabled');
						} else {
							$('#tabsleft').find('.pager .next').show();
							$('#tabsleft').find('.pager .finish').hide();
						}

					}});

$('#inverse').bootstrapWizard({'tabClass': 'nav', 'debug': false, onShow: function(tab, navigation, index) {
	console.log('onShow');
}, onNext: function(tab, navigation, index) {
	console.log('onNext');
	if(index==2) {
							// Make sure we entered the name
							if(!$('#name').val()) {
								alert('You must enter your name');
								$('#name').focus();
								return false;
							}
						}

						// Set the name for the next tab
						$('#inverse-tab3').html('Hello, ' + $('#name').val());

					}, onPrevious: function(tab, navigation, index) {
						console.log('onPrevious');
					}, onLast: function(tab, navigation, index) {
						console.log('onLast');
					}, onTabClick: function(tab, navigation, index) {
						console.log('onTabClick');
						alert('on tab click disabled');
						return false;
					}, onTabShow: function(tab, navigation, index) {
						console.log('onTabShow');
						var $total = navigation.find('li').length;
						var $current = index+1;
						var $percent = ($current/$total) * 100;
						$('#inverse .progress-bar').css({width:$percent+'%'});
					}});

});

</script>

@endsection