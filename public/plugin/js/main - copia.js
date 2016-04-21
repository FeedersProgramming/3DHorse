$(document).ready(function(){

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

	material.setAttribute('diffuseColor', '1 1 1');
	document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
	material = document.getElementById('M'+idd);


	
	if(typeof(shape_selecionado) != "undefined"){ 
		shape_selecionado=idd;
	}
	


}





function carga(){

	console.log('sdsds');

	material = document.getElementById('Deer__MA_Material');
	var i =0;
	var uxx=$( "#modelo" ).children().children().children().children().children();
	uxx.each(function() {


		uxx.eq(i).attr("onclick", "handleSingleClick(this)");
		uxx.eq(i).attr("id", i);

		uxx.eq(i).find("Appearance").children().attr("id", "M"+i) ;


		console.log(i);
		i = i+1;

	});



}

function cam_front () {
	cam_zoom="cam_front";
	document.getElementById('cam_front').setAttribute('fieldOfView','0.785398');
	$( "#slider" ).slider( "value", 0.785398 );

	if (document.getElementById('cam_front').getAttribute ("isActive") ) {

		document.getElementById('cam_aux').setAttribute('bind','true');
		document.getElementById('cam_front').setAttribute('bind','true');


	}else{
		document.getElementById('cam_front').setAttribute('orientation','0.0827 0.9772 -0.1955 3.0822');
		document.getElementById('cam_front').setAttribute('position','0.4020 -7.0509 -26.2179');
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
		document.getElementById('cam_left').setAttribute('orientation','-0.3917 -0.8461 0.3614 1.8738');
		document.getElementById('cam_left').setAttribute('position','-41.7762 3.5875 -1.4491');
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
		document.getElementById('cam_right').setAttribute('orientation','-0.2352 0.9620 -0.1389 1.7373');
		document.getElementById('cam_right').setAttribute('position','39.6335 9.1545 -2.2592');
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
		document.getElementById('cam_top').setAttribute('orientation','-0.0138 0.9840 0.1776 3.1945');
		document.getElementById('cam_top').setAttribute('position','-3.0568 18.0195 -36.3506');
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
		document.getElementById('cam_bot').setAttribute('orientation','-0.0051 -0.4496 0.8932 3.1671');
		document.getElementById('cam_bot').setAttribute('position','-0.1939 -16.6961 9.3351');
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

function otra(){
	document.getElementById("rata").setAttribute("rotation", '0,1,0,0');
	document.getElementById("rata").setAttribute("translation", '10 5 2');
	
	//document.getElementById("trans").style.webkitTransform = "45deg";


	/*document.getElementById('cam_front').addEventListener("viewpointChanged", view_changed, false);

	function view_changed(evt){

		if (evt)
		{
			var pos = evt.position;
			var rot = evt.orientation;
			var mat = evt.matrix;

			var camPos = pos.x.toFixed(4)+' '+pos.y.toFixed(4)+' '+pos.z.toFixed(4);
			var camRot = rot[0].x.toFixed(4)+' '+rot[0].y.toFixed(4)+' '+rot[0].z.toFixed(4)+' '+rot[1].toFixed(4);

			console.log( "Viewpoint position= " + camPos + "orientation= " + camRot );
		}

	}
	*/


	/*var pos = e.position;
	var ori = e.orientation;*/



	//	console.log( pos.x + " " + pos.y + " " + pos.z);

	/*console.table(ori);
	console.log(ori.x);*/


	//var i =0;
	///var uxx=$( "#modelo" ).children().children().children().children().children();

	//	uxx.eq(0).find("Appearance").attr("id", "rata") ;
	//	uxx.eq(0).find("material").attr("id", "rata") ;

	//uxx.eq(0).find("Appearance").children().find("material").attr("id", "rata") ;

	//var ee=$("#0").find("Appearance").attr("id", "rata") ;
	//var ee=$("#0").find("Appearance").children().attr("id", "rata") ;

}
