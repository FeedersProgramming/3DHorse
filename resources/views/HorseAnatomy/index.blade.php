@extends('HorseAnatomy.template.main')

@section('titulo', 'Main')

@section('jss')

@if(empty($tema))

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@else 	

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/' . $tema .'/bootstrap.css') }}" id="css_cambio">

<!--<script src="{{ asset('plugin/bootstrap/js/bootstrap2.min.js') }}"></script>-->

@endif

<script type="text/javascript">

	function ajaxgraficas(url, grafica){
		var datos;
		$.ajax({
			url: url + '{{ Auth::user()->id }}/' + grafica,
			type: 'GET',
			dataType: 'json',
			data: {id: '{{ Auth::user()->id }}'},
			async: false,
		})
		.done(function(dato) {
			//alert('hola');
			datos = (dato);
		})
		return datos;
	}

</script>

<script type="text/javascript" src="{{ asset('plugin/js/graficas.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/css/ui.css') }}"/>
<style>
	.x3dom-logContainer { bottom: 0px; position: absolute; }
	body { width:100%; height:100%; border:0; margin:0; padding:0; }
</style>

<style type="text/css">
	
	#graf2 {
		width: 100%;
		height: 450px;
		font-size: 11px;
	}

	.graf{
		width: 100%;
		height: 450px;
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

<script type="text/javascript" src="{{ asset('plugin/js/title.js') }}"></script>


@endsection

@section('contenido')

<button style="display: none;" onclick="ver_definicion ('Carpo Accesorio','Esqueleto Apendicular')">holaa axis</button>

<!-- Modal -->
<div class="modal fade" id="myModaldefiniciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" id="modalratak" role="document">
		<div class="modal-content ">
			<div class="modal-header">

				
				<img src="plugin/modals/img/savepdf.png" id="savepdf" width="50" height="50">
				



				<div id="rutahueso"></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>


			</div>
			<div class="modal-body">

				<!-- deeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->


				<div class="row">
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 bhoechie-tab-menu">
							<div class="list-group">
								<a href="#" class="list-group-item active text-center" id="activo_info">
									<h4 class="glyphicon glyphicon-book"></h4><br/> <h5>Descripción</h5>
								</a>
								<a href="#" class="list-group-item text-center">
									<h4 class="glyphicon glyphicon-list"></h4><br/><h5 id="ctt">Características</h5>
								</a>
								<a href="#" class="list-group-item text-center">
									<h4 class="glyphicon glyphicon-picture"></h4><br/>Imágenes
								</a>
								<a href="#" class="list-group-item text-center">
									<h4 class="glyphicon glyphicon-facetime-video"></h4><br/>Videos
								</a>
								<a href="#" class="list-group-item text-center">
									<h4 class="glyphicon glyphicon-tags"></h4><br/> <h5>Referencias</h5>
								</a>

							</div>
						</div>
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 bhoechie-tab">
							<!-- flight section -->
							<div class="bhoechie-tab-content active">
								<center>
									<div class="pre-scrollable" style="max-height: 460px;" id="informacion">
										
										<!-- ggggggggggggggggggggggggggggggggggggggggggggggggggg -->
										

										


										<!-- gggggggggggggggggggggggggggggggggggggggggg -->
									</div>
								</center>
							</div>
							<!-- train section -->
							<div class="bhoechie-tab-content">
								<center>
									<div class="pre-scrollable" style="max-height: 460px;" >
										
										<div class="list-group" id="caracte">
											
											
										</div>
										
									</div>


								</center>
							</div>

							<!-- hotel search -->
							<div class="bhoechie-tab-content">
								<center>
									<div class="pre-scrollable" style="max-height: 460px;" id="images">
										<div id="carouselimginfo" class="carousel slide" data-ride="carousel">
											<!-- Indicators -->
											<ol class="carousel-indicators" id="imagenesindicador">
												
											</ol>

											<!-- Wrapper for slides -->
											<div class="carousel-inner" role="listbox" id="imagenesurl">
												
											</div>

											<!-- Left and right controls -->
											<a class="left carousel-control" href="#carouselimginfo" role="button" data-slide="prev">
												<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#carouselimginfo" role="button" data-slide="next">
												<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
										</div>



										
									</div>
								</center>
							</div>
							<div class="bhoechie-tab-content">
								<center>
									<div class="pre-scrollable" style="max-height: 460px;" id="videos">

										
									</div>


								</center>
							</div>
							<div class="bhoechie-tab-content">
								<center>
									<div class="pre-scrollable" style="max-height: 460px;" >

										<div class="panel panel-primary">

											<div class="panel-body" style="text-align: left;">
												<ul id="referencias">
													
													
													
												</ul>

											</div>
										</div>


									</div>
									


								</center>
							</div>
						</div>
					</div>
				</div>

				<!-- deeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->



			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>


<x3d id="simulacion">
	<scene>
		<navigationinfo id="nav" headlight="true" type="turntable" typeparams="0.0 0.0 0.1 3.0" explorationmode="all"  speed="1" transitiontime="1" transitiontype="LINEAR "></navigationinfo>

		<Viewpoint position="-208.67324 4.27124738210582 -67.18736" orientation="0.02216 0.99900 0.03891 4.17608" 
		description=""></Viewpoint>

		<!--<Viewpoint centerOfRotation='4.289328840610026,-15.27124738210582,58.98660557169316' position="-148.67324 15.18736 -82.18736" orientation="0.02216 0.99900 0.03891 4.17608" 
		zNear="67.40322" zFar="288.22855" description=""></Viewpoint>-->
		
		<Transform id="modelo_completo">

			<Inline nameSpaceName="light" id="" onload ="modelo()" mapDEFToID="true" url="{{ asset('plugin/Modelos/completo_unido.x3d') }}"  /> 
		</Transform>
	</scene>
</x3d>



<x3d id="simulacion2" style="width:100%; height:100%;">
	
	<div id="panel_partes">
		<div id="cerrar_partes"> </div>
		<div id="fullscreen_partes" class="glyphicon glyphicon-fullscreen"> </div>

		<x3d id="simulacion_partes">
			<scene>
				<navigationinfo id="nav" headlight="true" type="turntable" typeparams="0.0 0.0 0.1 3.0" explorationmode="all"  speed="1" transitiontime="1" transitiontype="LINEAR "></navigationinfo>

				<Transform id="tran_modelo_partes">
					<Inline nameSpaceName="light" id="modelo_partes" onload ="modelo_partes()" mapDEFToID="true" url="{{ asset('plugin/Modelos/completoooo.x3d') }}"  /> 
				</Transform>

				@foreach ($vistas_partes as $vista) 
				<Viewpoint id ='{{ $vista->hueso . "_" . $vista->parte }}' position='{{ $vista->position }} ' orientation='{{ $vista->orientation }} ' description='camera'></Viewpoint>
				@endforeach

			</scene>

			<div class="uiTransparent" id="statsWidget" style="right:4px; top:4px;">
				<form class="uiHalfTransparent section" >

					<!-- Statistics-->
					<div class="uiTransparent" title="Partes">Partes</div>
					<div id="listado_partes" class="uiTransparent" >

						<!-- <div id='as' onclick="ver();" style="cursor:pointer" >sasas</div> !--> 
					</div>
				</form>

				<form class="uiHalfTransparent section">
					<!-- interaction -->
					<div class="uiTransparent" title="Interaccion">Interaccion</div>
					<div id="interaction" class="uiTransparent" >

						<!-- Render Mode-->
						<div class="setting" id="renderMode" title="Modo de Vista Ventral">
							<div class="settingName" id="renderModeRadio">Vista Ventral</div>
							<div class="settingControlFullSize">
								<input type="radio" name="rendermode" id="renderPointsButton"><label for="renderPointsButton" class="roundBorders">Activar</label></input>
								<input type="radio" name="rendermode" id="renderTrianglesButton"><label for="renderTrianglesButton" class="roundBorders">Desactivar</label></input>                        
							</div>
						</div>

						<div class="setting">
							<!-- reset View -->
							<button id="rvButton" title="reset camera to initial position">Reset View</button>
						</div>

						<div class="setting">
							<button id="rotar_btn" title="Rotar">Rotar</button>
						</div>

					</div>
				</form>
			</div>
		</x3d>
	</div>

	<scene>
		<navigationinfo id="nav" headlight="true" type="turntable" typeparams="0.0 0.0 0.1 3.0" explorationmode="all"  speed="1" transitiontime="1" transitiontype="LINEAR "></navigationinfo>

		<Viewpoint position="-208.67324 4.27124738210582 -67.18736" orientation="0.02216 0.99900 0.03891 4.17608" 
		description=""></Viewpoint>

		<Transform id="">

			<Inline nameSpaceName="light" id="modelo_general" onload ="modelo()" mapDEFToID="true" url="{{ asset('plugin/Modelos/completo_unidooo.x3d') }}"  /> 
		</Transform>
	</scene>
</x3d>


<div class="info-panel dock-top dock-right ui-draggable" id="info_panel" style="top: 71px; left: 80%">

	<div class="info-panel-top">
		<span id="info_panel_title">Esqueleto Equino</span>
		<img src="{{ asset('plugin/css/shim.gif') }}" height="1" width="1" class="icon-minimize" alt="Hide Description" title="Hide Description">
	</div>

	<div id="info_panel_body" class="info-panel-body">

		<div id="info" >
			El equino tiene 206 huesos: Cráneo, atlas, axis, 7 vértebras cervicales, 18 vértebras torácicas, 6 lumbares, 5 sacras, 15 a 22 caudales, 18 costillas, dos escápulas, dos húmeros, dos radio y cúbito, dos carpos (compuesto por varios huesos), un hueso coxal, dos fémures, dos tibias y peroné, dos tarsos (compuesto por varios huesos).
		</div>

	</div>
	<<div id="readmore">
	<button class="btn btn-primary btn-xs" id="readmoreinfo">Mas Informacion++<button>
		<br>
	</div>
</div>

<div class="panel_evaluacion dock-top dock-right ui-draggable" id="panel_evaluacion" style="top: 71px; left: 80%">

	<div class="pe_top">
		<span id="info_panel_title">Informacion</span>
		<img src="{{ asset('plugin/css/shim.gif') }}" height="1" width="1" class="icon-minimize" alt="Hide Description" title="Hide Description">
	</div>	


	<div id="pe_body" >

	</div>
	<div id="pe_botones">
		<a href="#" class="btn btn-danger btn-sm" onclick="nextp();">Siguiente</a>
		<br>

	</div>
</div>


<div id="prueba" class="rootwizard" style="height:100%;">
	
	<div id="tabsleft" class="tabbable tabs-center">
		<ul class="" style="float: center;" id="top_preguntas" style="width:100%; height:10%; overflow-y:scroll;">	
			<li class="active"><a href="#inicio" data-toggle="tab">Inicio</a></li>
			@for ($i = 1; $i < 26; $i++)
			<li id="li_{{$i}}"><a href="#pregunta_{{ $i }}" data-toggle="tab">{{ $i }}</a></li>
			@endfor
			<li><a href="#final" data-toggle="tab">Final</a></li>
		</ul><br>
		
		<div class="tab-content" id="preguntas" style="width:100%; height:90%; overflow-y:scroll;">
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

<div id="graficas" class="well" style="" class="well">
	<button type="button" class="btn btn-default" onclick="estadograficas(1);" style="float: right;" title="Evaluaciones" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Se Puede Observar El porcentaje evaluado y el no evaluado.">Porcentaje Evaluado</button>

	<button type="button" class="btn btn-default" onclick="estadograficas(2);" style="float: right;" data-toggle="popover" data-placement="bottom" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Rendimiento</button>

	<h3 class="text-center" id="titulograf">Proceso Evaluativo</h3>
	<div id="graf1" class="graf"></div>
	<div id="graf2" class="graf"></div>
</div>

<div id="usuarios" name="usuarios" style="height:100%;" >
	
	<div id="estudiantes" name="estudiantes" style="width:auto; height:100%;">
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.estudiantes.index') }}" frameborder="0"></iframe>
	</div>

	<div id="profesores" name="profesores" style="width:auto; height:100%;">
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.profesores.index') }}" frameborder="0"></iframe>
	</div>
	
	<div id="administradores" name="administradores" style="width:auto; height:100%;">
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.administradores.index') }}" frameborder="0"></iframe>
	</div>
</div>

<div id="grupos" name="grupos" style="width:auto; height:100%;">
	<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.grupos.index') }}" frameborder="0"></iframe>
</div>

<div id="perfil" name="perfil" style="width:auto; height:100%;" class="well">
	
	<div id="editar_perfil" name="editar_perfil" style="width:auto; height:100%;">
		@if(Auth::user()->rol == "estudiante")
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.estudiantesP.edit', Auth::user()->id) }}" frameborder="0"></iframe>
		@elseif(Auth::user()->rol == "profesor")
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.profesoresP.edit', Auth::user()->id) }}" frameborder="0"></iframe>
		@elseif(Auth::user()->rol == "administrador")
		<iframe style="width:100%; height:100%;" src="{{ route('HorseAnatomy.administradoresP.edit', Auth::user()->id) }}" frameborder="0"></iframe>
		@endif
	</div>
	<div id="mostrar_perfil" name="mostrar_perfil" style="width:auto; height:100%;">
		<div class="row" id="info_personal" name="info_personal" style="width:auto; height:100%;">
			<iframe id="f_perfil" style="width:100%; height:100%;" src="{{ route('HorseAnatomy.perfil.info_perfil', Auth::user()->id) }}" frameborder="0"></iframe>
		</div>
	</div>
</div>
@endsection

@section('js')



@endsection