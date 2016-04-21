

$(document).ready(function(){

//$('element:visible')
$('#statsWidget').hide();
$( "#cerrar_partes" ).click(function() {

	if ($( "#cerrar_partes" ).is(":visible") ) {
		$( "#panel_partes" ).hide();
	}

});


$("#fullscreen_partes").click(function() {


				 if (!document.fullscreenElement &&    // alternative standard method
				 	!document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {
				 	launchIntoFullscreen(document.getElementById("panel_partes"));
				 $('#statsWidget').show();
				}else{
					$('#statsWidget').hide();
					exitFullscreen();

				}

			});


});


function carga_hueso_parte(hueso) {
	

	console.table(hueso["nombre"]);
}