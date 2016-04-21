<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> @yield('titulo', 'Main') | 3DHorse </title>
	
	@include('HorseAnatomy.template.head')
	<!-- LESS -->
	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/variables.less') }}" class="cssdeck">
	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/bootswatch.less') }}" class="cssdeck">
	<script type="text/javascript" src="{{ asset('plugin/js/less/less.js') }}"></script>

	@yield('jss')


</head>

<body id"body_aux" onload="carga({{ $huesos }}, {{ $regiones }}, {{ $grupos }})" background="#F2F2F2">


	@include('HorseAnatomy.template.nav') 

	<div class="div_nav_left" id="div_nav_left" name="div_nav_left" onmousemove="reajustar()" onmouseover="reajustar()" onmouseout="reajustar()">
		@include('HorseAnatomy.template.nav_left')
	</div>

	<div class="div_contenido" id="div_contenido" name="div_contenido" onmousemove="reajustar()" onmouseover="reajustar()" onmouseout="reajustar()">
		@yield('contenido')
	</div>
	
	@include('HorseAnatomy.template.footer') 

</body>

@yield('js')

</html>	
