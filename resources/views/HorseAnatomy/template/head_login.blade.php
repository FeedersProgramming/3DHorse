<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="{{ asset('plugin/jquery/js/jquery-2.2.0.js') }}"></script>
<script src="{{ asset('plugin/bootstrap-checkbox/js/bootstrap-checkbox.js') }}"></script>

<script src="{{ asset('plugin/bootstrap/js/bootstrap.js') }}"></script>

<script src="{{ asset('plugin/bootstrap-checkbox/dist/js/bootstrap-checkbox.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/bootstrap-responsive.min.css') }}" class="cssdeck">

<!-- chosen -->
<link href="{{ asset('plugin/chosen/chosen.css') }}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>

<!-- trumbowyg -->
<script type="text/javascript" src="{{ asset('plugin/trumbowyg/dist/trumbowyg.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/trumbowyg/dist/ui/trumbowyg.css') }}">

<!-- slider -->
<script type="text/javascript" src="{{ asset('plugin/bootstrap-slider-master/dist/bootstrap-slider.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugin/bootstrap-slider-master/dist/css/bootstrap-slider.css') }}" class="cssdeck">

<!-- bootstrap-wizard-master -->
<script type="text/javascript" src="{{ asset('plugin/bootstrap-wizard-master/jquery.bootstrap.wizard.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/bootstrap-wizard-master/prettify.js') }}"></script>



<script type="text/javascript" src="{{ asset('plugin/x3dom/x3dom-full.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugin/js/fullscreen.js') }}"></script>

<link href="{{ asset('plugin/x3dom/x3dom.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('plugin/css/responsive.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('plugin/css/simulacion.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">

	* {margin:0; padding:0; border:0;}

	html {
		width: auto; 
		height: 100%;
		/*width: 100%;*/
		background-color: #F2F2F2;
		margin:0px; 
		height:100%;
		display: block;	
		/*overflow-x:hidden; 
		overflow-y:hidden; */
	}
	
	body{
		width: auto; 
		height: 100%;
		/*width: 100%;*/
		margin:0px; 
		height:100%;
		/*overflow-x:hidden; 
		overflow-y:hidden; */
		padding-right: 0px;
		padding-left: 0px;
	}

	nav {
		padding: 0% 0% 0% 0%;
		width: 100%;
		min-width: 100%;
		display: block;	
	}


	#icon_nav{
		font-size: 180%;
	}

	.div_nav_left {
		display: inline-block;
		float: left;
		margin: 0%;
		width: 70%;
		min-width: 70%;
		max-width: 70%;
		height: 100%;
		min-height: 100% !important;
		max-height: 100% !important;
		/*resize: horizontal;*/
		font-size: 11px;
		overflow-x:hidden; 
		overflow-y:hidden; 
	}
	
	.div_contenido {
		display: inline-block;

		margin: 0%;
		width: 30%;
		min-width: 30%;
		max-width: 30%;
		height: 100%;
		min-height: 100% !important;
		max-height: 100% !important;
		
		/*background-color: red;*/
	}

	.todo{
		height: 83%;
		min-height: 83% !important;
		max-height: 83% !important;
		/*margin-top: -1.4%;*/
	}

	#icon_footer{
		font-size: 160%;
		padding-top: 35%;
	}
	
	.footer {
		width: 100%;
		display: block;	
		height: 9%;
		min-height: 9% !important;
		max-height: 9% !important;
	}

	.anatomy_nav {
		width: 100%;
		min-width: 100%;
		height: 5px;
		min-height: 10% !important;
		max-height: 10% !important;

	}

	#slide .slider-selection {
		background: #BABABA;
	}

	#slide .slider-handle {
		background: white;
	}

	#slide {
		padding-top: 25%;
	}
	
	.prueba{
		padding: 50%; 
	}

	nav ul li a span{
		display: none;
	}

	#navegacion{
		display: none;
	}


	@media screen and (max-width:768px) {

		html {
			width: 100%; 
			height: 100%;
			/*width: 100%;*/
			background-color: #F2F2F2;
			margin:0px; 
			height:100%;
			display: inline-block;	

		}

		body{
			display: block;
			width: auto; 
			height: 100%;
			/*width: 100%;*/
			margin:0px; 
			height:100%;
			background-color: #F2F2F2;
			padding-right: 0px;
			padding-left: 0px;
		}

		nav {
			padding: 0% 0% 0% 0%;
			width: 100%;
			min-width: 100%;
			display: block;	
		}

		nav ul li a span{
			display: inline-block;
		}
		
		.footer_div{
			display: block;
		}

		#navegacion{
			display: inherit;
		}

		.navegacion{
			display: block;
			float: left;
		}

		.div_nav_left {
			display: block;
			margin-top: -20px;
			width: 100%;
			min-width: 100%;
			max-width: 100%;
			height: 91%;
			min-height: 91% !important;
			max-height: 91% !important;
			/*background-color: red;*/
		}

		.div_contenido {
			display: none;
			margin-top: -20px;
			width: 100%;
			min-width: 100%;
			max-width: 100%;
			height: 91%;
			min-height: 91% !important;
			max-height: 91% !important;
			/*background-color: red;*/
		}

		#login {
			display: none;
			/*background-color: red;*/
		}

		

		.footer {
			margin:0px; 
			width: 100%;
			display: block;	
			height: 11%;
			min-height: 11% !important;
			max-height: 11% !important;
		}
	}

</style>



<script type="text/javascript" src="{{ asset('plugin/js/fullscreen.js') }}"></script>

<link href="{{ asset('plugin/css/simulacion.css') }}" rel="stylesheet" type="text/css">

<script type="text/javascript" src="{{ asset('plugin/banner/js/jssor.slider.min.js') }}"></script>
<!-- use jssor.slider.debug.js instead for debug -->
<script>

	$(document).ready(function(){

		$('#recuperar').hide();
		$('#registrar').hide();
		$('#alogin').hide();

	});


	function cambio(cambio){

		if (cambio == 1) {
			$('#div_contenido').hide();
			$('#div_nav_left').show();
		}else if (cambio == 2) {
			$('#div_contenido').show();
			$('#div_nav_left').hide();
		}else if (cambio == 3){//login
			$('#alogin').hide();
			$('#aregi').show();
			$('#arecu').show();

			$('#login').show();
			$('#registrar').hide();
			$('#recuperar').hide();
		}else if (cambio == 4){//registrar
			$('#alogin').show();
			$('#aregi').hide();
			$('#arecu').show();

			$('#login').hide();
			$('#registrar').show();
			$('#recuperar').hide();
		}else if (cambio == 5){//recuperar
			$('#alogin').show();
			$('#aregi').show();
			$('#arecu').hide();

			$('#login').hide();
			$('#registrar').hide();
			$('#recuperar').show();
		}


	}

	function reajustar(){

		$(window).width();
			//alert('hola');
			ancho_nav = document.getElementById('div_imagenes').offsetWidth;
			//alto_nav = document.getElementById('div_nav_left').offsetHeight;

			ancho_general = document.getElementById('div_login').offsetWidth;

			ancho_contenido = document.getElementById('div_contenido').offsetWidth;
			/*ancho_simulacion = document.getElementById('simulacion').offsetWidth;*/
			//alto_contenido = document.getElementById('div_contenido').offsetHeight;

			ancho_completo = ancho_nav + ancho_contenido;

			ancho_nuevo_contenido =  ancho_general - ancho_nav - 15;
			/*document.getElementById("modificable").style.width = 200;
			document.getElementById("modificable").style.heigh t = 200;*/

			//console.log(ancho_general + ' | Nuevo ' + ancho_nuevo_contenido + ' | Nuevo2 ' + '| nav ' + ancho_nav);

			document.getElementById("div_contenido").style.width =  ancho_nuevo_contenido + 'px';
			//document.getElementById("simulacion").style.width = ancho_nuevo_contenido - 20 + 'px';
		}

	</script>

	<script type="text/javascript" src="{{ asset('plugin/js/evaluacion.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugin/js/jquery-ui.js') }}"></script>
