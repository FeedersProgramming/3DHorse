var tutorial=false;
var tuto_num_shape=1;
var total_shape=0;

$(document).ready(function(){

	cargarcamaras();
	///$("#tutomenu").hide();
	$("#tutosiguiente").hide();
	$("#tutomenu").hide();
	$("#ventanas").css("z-index", 10 );

			// color simulacion
			var r=0,b=0,g=0;
			Color_Bg_Simulacion(r,g,b);
			// slider

			$("#slider").slider(
			{
				value:0.785398,
				min: 0.485398,
				max: 1.235398,
				step: 0.08,
				isRTL: true, 

				slide: function( event, ui ) {
					//console.log( ui.value );
					var vpt = document.getElementById(cam_zoom);
					vpt.fieldOfView = ui.value;
				}
			});


			$(this).show("slide", { direction: "left" }, 1000);
			$( "#slider" ).css('background', 'rgb(0,255,0)');
			$( "#slider .ui-slider-range" ).css('background', 'rgb(0,255,0)');
			//full screem

			$("#fullscreen").click(function() {


				 if (!document.fullscreenElement &&    // alternative standard method
				 	!document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {
				 	launchIntoFullscreen(document.getElementById("content"));

				}else{
					exitFullscreen();

				}

			});


			//action zomm



	});	//funtions
var cam_right_p,cam_right_o;
var cam_front_p,cam_front_o;
var cam_left_p,cam_front_o;
var cam_top_p,cam_top_o;
var cam_bot_p,cam_bot_o;

function cargarcamaras () {
	// body...
	cam_right_p="39.6335 9.1545 -2.2592";
	cam_right_o="-0.2352 0.9620 -0.1389 1.7373";

	cam_front_p="0.4020 -7.0509 -26.2179";
	cam_front_o="0.0827 0.9772 -0.1955 3.0822";

	cam_left_p="-41.7762 3.5875 -1.4491";
	cam_left_o="-0.3917 -0.8461 0.3614 1.8738";

	cam_top_p="-3.0568 18.0195 -36.3506";
	cam_top_o="-0.0138 0.9840 0.1776 3.1945";

	cam_bot_p="-0.1939 -16.6961 9.3351";
	cam_bot_o="-0.0051 -0.4496 0.8932 3.1671";


	$("#cam_right").attr("position",cam_right_p);
	$("#cam_right").attr("orientation",cam_right_o);

	$("#cam_front").attr("position",cam_front_p);
	$("#cam_front").attr("orientation",cam_front_o);

	$("#cam_left").attr("position",cam_left_p);
	$("#cam_left").attr("orientation",cam_left_o);

	$("#cam_top").attr("position",cam_top_p);
	$("#cam_top").attr("orientation",cam_top_o);

	$("#cam_bot").attr("position",cam_bot_p);
	$("#cam_bot").attr("orientation",cam_bot_o);

	


}

function Color_Bg_Simulacion (r,g,b) {


	var col = "rgb(" + r + "," + g + "," + b  + ")";


	document.getElementById("concepto").style.background = col;
	document.getElementById("control").style.background = col;
	document.getElementById("fondo-simulacion").setAttribute('diffuseColor', r+' '+g+' '+b);
	document.getElementById("fondo-simulacion").setAttribute('skyColor', r+' '+g+' '+b);


}



//////////////mause action



var material;
function handleSingleClick(shape)
{
	console.log($(shape).attr("id"));

	var idd= $(shape).attr("id");

	if (tutorial != true ) {

		material.setAttribute('diffuseColor', '1 1 1');
		document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
		material = document.getElementById('M'+idd);

		definicion(idd);
	}
	
	if(typeof(shape_selecionado) != "undefined"){ 
		shape_selecionado=idd;
	}

}

///////definicion
function definicion (idd) {
	
	var parametros = {
		"tipo" : "definicion",
		"id" : idd
	};


	$.ajax({
		data:  parametros,
		type: "POST",
		dataType: "json",
		url: "phpsimulacion/simulacion.php",
		success: function(data){

			if(data.length > 0){
				$.each(data, function(i,item){
					/*console.log(item.nombre +" descrrr "+item.descripcion2);*/

					$("#concepto_titulo").children().html(item.nombre);
					$("#concepto_text").children().html(item.descripcion2);

					$("#titlenone").children().html(item.nombre);

				});					
			}


		}
	});


}


function carga(){

	//material = document.getElementById('Deer__MA_Material');
	var i =0;
	var uxx=$( "#modelo" ).children().children().children().children().children();
	uxx.each(function() {


		uxx.eq(i).attr("onclick", "handleSingleClick(this)");
		uxx.eq(i).attr("id", i);

		uxx.eq(i).find("Appearance").children().attr("id", "M"+i) ;


		
		i = i+1;
		console.log(i);

	});
	total_shape=i;
	

	if (tutorial) {
		tutorialsiguietehueso(1);
	}

}

function cam_front () {
	cam_zoom="cam_front";
	document.getElementById('cam_front').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );

	if (document.getElementById('cam_front').getAttribute ("isActive") ) {

		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_front').setAttribute('bind','true');


	}else{
		document.getElementById('cam_front').setAttribute('orientation',cam_front_o);
		document.getElementById('cam_front').setAttribute('position',cam_front_p);
		document.getElementById('cam_front').setAttribute('bind','true');

	}
}
function cam_left () {
	cam_zoom="cam_left";
	document.getElementById('cam_left').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );

	if (document.getElementById('cam_left').getAttribute ("isActive") ) {

		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_left').setAttribute('bind','true');


	}else{
		document.getElementById('cam_left').setAttribute('orientation',cam_left_o);
		document.getElementById('cam_left').setAttribute('position',cam_left_p);
		document.getElementById('cam_left').setAttribute('bind','true');

	}
}
function cam_right () {
	cam_zoom="cam_right";
	document.getElementById('cam_right').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );


	if (document.getElementById('cam_right').getAttribute ("isActive") ) {
		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_right').setAttribute('bind','true');
	}else{
		document.getElementById('cam_right').setAttribute('orientation',cam_right_o);
		document.getElementById('cam_right').setAttribute('position',cam_right_p);
		document.getElementById('cam_right').setAttribute('bind','true');
	}
}
function cam_top () {
	cam_zoom="cam_top";
	document.getElementById('cam_top').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );


	if (document.getElementById('cam_top').getAttribute ("isActive") ) {
		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_top').setAttribute('bind','true');
	}else{
		document.getElementById('cam_top').setAttribute('orientation',cam_top_o);
		document.getElementById('cam_top').setAttribute('position',cam_top_p);
		document.getElementById('cam_top').setAttribute('bind','true');
	}
}
function cam_bot () {
	cam_zoom="cam_bot";
	document.getElementById('cam_bot').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );


	if (document.getElementById('cam_bot').getAttribute ("isActive") ) {
		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_bot').setAttribute('bind','true');
	}else{
		document.getElementById('cam_bot').setAttribute('orientation',cam_bot_o);
		document.getElementById('cam_bot').setAttribute('position',cam_bot_p);
		document.getElementById('cam_bot').setAttribute('bind','true');
	}	
}


var cam_zoom="cam_right";
function zoom (delta) {
	
	var vpt = document.getElementById(cam_zoom);
	vpt.fieldOfView = parseFloat(vpt.fieldOfView) + delta;
	$( "#slider" ).slider( "value", vpt.fieldOfView );


	///console.log(document.getElementById(cam_zoom).getAttribute ("fieldOfView") );
}

function definiciondelta(){

	var con= $('.claseconcepto').attr("id");

	if (con=="concepto") {
		$('.claseconcepto').removeAttr('id');
		$('.claseconcepto').attr("id","conceptonone");

		$('.clasesimulacion').removeAttr('id');
		$('.clasesimulacion').attr("id","simulacionnone");

		$('.clasecontrol').removeAttr('id');
		$('.clasecontrol').attr("id","controlnone");
		
		$('#titlenone').removeAttr('class');
		$('#titlenone').attr("class","titulonone");




	}else{
		$('.claseconcepto').removeAttr('id');
		$('.claseconcepto').attr("id","concepto");

		$('.clasesimulacion').removeAttr('id');
		$('.clasesimulacion').attr("id","simulacion");

		$('.clasecontrol').removeAttr('id');
		$('.clasecontrol').attr("id","control");

		$('#titlenone').removeAttr('class');
		$('#titlenone').attr("class","titulononeoff");
	}

	
}

function otra () {
	/*$('#siervo').removeAttr('url');
	$('#siervo').attr("url","Modelos/cabeza.x3d");*/
	$("#simulacion").hide();
	//$("#concepto").hide();
	$("#tutomenu").slideToggle("slow");


}

function modo_libre () {
	tutorial=false;
	$('#siervo').removeAttr('url');
	$('#siervo').attr("url","Modelos/cabeza.x3d");
	
	limpiar_modelo();

}
function limpiar_modelo() {
	// body...
	if (material !=null) {
		material.setAttribute('diffuseColor', '1 1 1');
	}
	shape_selecionado=null;
}

function tutoaxial () {
	$("#tutomenu").hide();
	$("#ventanas").css("z-index", 10 );
	$("#tutosiguiente").slideToggle("slow");




	
	$('#siervo').removeAttr('url');
	$('#siervo').attr("url","Modelos/cabeza.x3d");

	tutorial=true;
	tuto_num_shape=0;
	

}




function tutorialsiguietehueso (h) {
	if (h==1) {
		if (tuto_num_shape<=(total_shape-2)) {
			tuto_num_shape++;
		}
	}else{
		if(tuto_num_shape>=1){
			tuto_num_shape--;

		}
	}




	var idd= tuto_num_shape;



	material.setAttribute('diffuseColor', '1 1 1');
	document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
	material = document.getElementById('M'+idd);

	definicion(idd);
	
	console.log('essss: '+tuto_num_shape);
}


function ventana_tutorial () {
	/*$('#siervo').removeAttr('url');
	$('#siervo').attr("url","Modelos/cabeza.x3d");*/
	//$("#simulacion").hide();
	//$("#concepto").hide();
	//$("#tutomenu").slideToggle("slow");
	if ($('#tutomenu').is(':hidden')){
		$("#tutomenu").slideToggle("slow");

		$("#ventanas").css("z-index", 30 );


	}else{
		$("#tutomenu").hide();

		$("#ventanas").css("z-index", 10 );

	}

}

function pruebas () {
	
	$("#1").hide();

	alert("sdddsd");
}