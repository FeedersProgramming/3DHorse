

$(document).ready(function(){

	var huesos;
	var material;

	$("#").slider(
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
				 	launchIntoFullscreen(document.getElementById("div_contenido"));

				}else{
					exitFullscreen();

				}

			});
	//$('#modelo_general').attr('url', 'http://3dhorse.com/plugin/Modelos/completo_unido.x3d');
	});	//funtions

function setHuesos(huesos){
	this.huesos = huesos;
}

function getHuesos(){
	//console.log(huesos);
	return this.huesos;
}


function handleSingleClick(shape)
{
	console.log($(shape).attr("id") + ' - ' + document.getElementById('M'+$(shape).attr("id")).getAttribute('DEF'));

	var idd= $(shape).attr("id");

	//material = document.getElementById('M'+idd);

	//console.log(idd);

	material.setAttribute('diffuseColor', '1.000 0.956 0.871');
	material.setAttribute('specularColor', '0.161 0.161 0.16');
	material.setAttribute('emissiveColor', '0.000 0.000 0.000');
	material.setAttribute('ambientIntensity', '0.333');
	material.setAttribute('shininess', '0.098');

	document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0');
	/*document.getElementById('M'+idd).setAttribute('diffuseColor', '1.000 0.956 0.871');
	document.getElementById('M'+idd).setAttribute('specularColor', '0.161 0.161 0.16');
	document.getElementById('M'+idd).setAttribute('emissiveColor', '0.000 0.000 0.000');
	document.getElementById('M'+idd).setAttribute('ambientIntensity', '0.333');
	document.getElementById('M'+idd).setAttribute('shininess', '0.098');*/


	material = document.getElementById('M'+idd);

	//console.log(material);
	
	setshape_selecionado(idd);
	
	
	
	for (var i = 0; i < huesos.length; i++) {
		if(huesos[i]['idshape'] == idd){
			//alert('exito');
			
			var titulo=document.getElementById('info_panel_title');
			titulo.innerHTML =  huesos[i]['nombre'];

			var info=document.getElementById('info');
			info.innerHTML =  huesos[i]['descripcion2'];

			$("#readmoreinfo").attr("onclick","ver_definicion('"+huesos[i]['nombre']+"','"+huesos[i]['grupo']+"')");
		}
	}

	//console.log(hueso);


}


function modelo(){

	
	
	var i =0;
	var uxx=$("#modelo_completo").children().children().children().children().children();
	//console.log(uxx);
	var enviar = "husoso";
	uxx.each(function() {


		uxx.eq(i).attr("onclick", "handleSingleClick(this)");
		uxx.eq(i).attr("id", i);

		/*uxx.eq(i).find("Appearance").children().attr("id", "M"+i) ;
		uxx.eq(i).find("Appearance").find("Material").attr("id", "M"+i);*/
		//uxx.eq(i).children('Appearance').children().attr("id", "M"+i);
		uxx.eq(i).children('Appearance').children('material').attr("id", "M"+i);
		//console.log(uxx.eq(i).children('Appearance').children('material').attr('DEF'));
		//console.log(document.getElementById('M'+i).getAttribute('DEF') + ' - ' + i);
		i = i+1;


	});

	material = document.getElementById('M0');
	//cargar_evaluacion();
	//document.getElementById('M10').setAttribute('diffuseColor', '1 0 0'); 

}



var x=$(document);
x.ready(inicio33);
function inicio33(){
	var x=$("#info_panel");
	//x.draggable();

	x.draggable({
		containment: "#div_contenido"
	});
}




function ajjj () {
	// body...
	//alert("Sd");
	/*modulo = "osteologia";
	tema = "Esqueleto Axial";
	var arreglo = ajax_quiz(modulo, tema, 5);
	console.table(arreglo);*/

	cargar_evaluacion(3);
}