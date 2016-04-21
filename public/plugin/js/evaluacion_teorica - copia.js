$(document).ready(function(){

	$('#quiz_wizard').hide();
	var slider = new Slider('#slide', {
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
	reajustar();

	$('#quiz_wizard').bootstrapWizard({'nextSelector': '.button-next', 'previousSelector': '.button-previous', 'firstSelector': '.button-first', 'lastSelector': '.button-last'});



	$('[data-toggle="tooltip"]').tooltip(); 
	$('[data-toggle="popover"]').popover({ trigger: "hover" })

	/*bootbox.alert("Hello world!", function() {
		Example.show("Hello world callback");
	});*/

	/*$('.example-popover').popover({
		container: 'body'
	})

	$('.example-tooltip').tooltip({
		container: 'body'
	})*/
	//alert('hola')
	//alert('hola');
	$('#graficas').hide();
	$('#graf2').hide();
	$('#perfil').hide();
	$('#editar_perfil').hide();
	$('#usuarios').hide();
	$('#partes').hide();
	$('#registrar').hide();
	$('#recuperacion').hide();
	$('#login').show();
	$('#panel_evaluacion').hide();
	$('#btn_login').hide();
	$('#pass').hide();
	$('#passs').hide();
	$('#btn_recuperar').show();
	$('#btn_registrar').show();
	$('#usuarios').hide();
	$('#grupos').hide();
	$('#prueba').hide();
	$('#info_panel').show();
	$('#simulacion').show();
	$('#administrar').hide();
	
});

function estadograficas(grafica){
	if(grafica == 1){
		$('#graf1').show();
		$('#graf2').hide();
		$('#titulograf').text('Proceso Evaluativo');
	}else if(grafica == 2){
		$('#graf2').show();
		$('#graf1').hide();
		$('#titulograf').text('Rendimiento');
	}
}


function changeCss(id_css,new_css){
	document.getElementById(id_css).href = 'plugin/bootstrap/css/'+new_css+'/bootstrap.css';
	setCookie("theme_color",new_css,365);
	reajustar();
}

function reajustar(){

	/*$(window).width();
	//alert(screen.height);
	ancho_nav = document.getElementById('div_nav_left').offsetWidth;
	alto_pantalla = screen.height;

	ancho_general = document.body.offsetWidth;

	ancho_contenido = document.getElementById('div_contenido').offsetWidth;*/

	/*ancho_simulacion = document.getElementById('simulacion').offsetWidth;*/
	//alto_contenido = document.getElementById('div_contenido').offsetHeight;


	/*ancho_completo = ancho_nav + ancho_contenido;

	ancho_nuevo_contenido =  ancho_general - (ancho_nav - 30);

	console.log(ancho_general + ' | Nuevo ' + ancho_nuevo_contenido + ' | Nuevo2 ' + '| nav ' + ancho_nav);

	document.getElementById("div_contenido").style.width =  ancho_nuevo_contenido + 'px';*/

}

var tipo_eva = 0;
var tipo_modulo = 0;

function mostrarpass(){

	var tipo = document.getElementById('rol').value;
	alert(tipo);
	if(tipo == 'estudiante'){
		$('#pass').show();
		$('#passs').show();
	}else {
		document.getElementById('pass').value = 0;
		$('#pass').hide();
		$('#passs').hide();
	}
}

function mostrar_registrar(){
	$('#registrar').show();
	$('#recuperacion').hide();
	$('#login').hide();

	$('#btn_login').show();
	$('#btn_recuperar').show();
	$('#btn_registrar').hide();
}

function mostrar_recuperar(){
	$('#registrar').hide();
	$('#recuperacion').show();
	$('#login').hide();

	$('#btn_login').show();
	$('#btn_recuperar').hide();
	$('#btn_registrar').show();
}

function mostrar_login(){
	$('#registrar').hide();
	$('#recuperacion').hide();
	$('#login').show();

	$('#btn_login').hide();
	$('#btn_recuperar').show();
	$('#btn_registrar').show();
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}

function cambio_div(opcion){

	if (opcion == 1) {//anatomy
		reajustar();
		//$('#editar_perfil').hide();
		$('#opc_huesoss').show();
		$('#graficas').hide();
		$('#perfil').hide();
		$('#simulacion').show();
		$('#completo').show();
		$('#partes').hide();
		$('#usuarios').hide();
		$('#grupos').hide();
		$('#prueba').hide();
		$('#quiz').hide();
		$('#administrar').hide();
		$('#info_panel').hide();
		$('#panel_evaluacion').hide();
		document.getElementById('opc_huesoss').style.display='inherit';//inherit
		$('#usuarios').hide();
		$('#grupos').hide();
		$('#usuarios').hide();
		$('#administradores').hide();
		$('#perfil').hide();
		$('#grupos').hide();
		//document.getElementById('simulacion')
	}else if (opcion == 2) {// quiz
		//$('#editar_perfil').hide();
		$('#perfil').hide();
		$('#quiz').show();
		$('#graficas').hide();
		$('#prueba').hide();
		$('#info_panel').show();
		$('#simulacion').hide();
		document.getElementById('opc_huesoss').style.display='none';//inherit
		$('#panel_evaluacion').hide();
		$('#opc_huesos').hide();
		$('#usuarios').hide();
		$('#grupos').hide();
		$('#graficas').hide();
		$('#administrar').hide();
	}else if (opcion == 3) {//admin
		//$('#editar_perfil').hide();
		//changeCss('css_cambio','sandstone');
		//cssRefresh();
		//var x = getCookie('theme_color');
		changeCss('css_cambio', getCookie('theme_color'));
		$('#perfil').show();
		$('#opc_huesos').hide();
		$('#prueba').hide();
		$('#partes').hide();
		document.getElementById('opc_huesoss').style.display='none';//inherit
		$('#info_panel').hide();
		$('#simulacion').hide();
		$('#graficas').hide();
		$('#panel_evaluacion').hide();
		$('#quiz').hide();
		$('#usuarios').hide();
		$('#grupos').hide();
		$('#administrar').show();
		/*$('#f_perfil').each(function() {
			this.contentWindow.location.reload(true);
		});*/
	}else if (opcion == 4) {// completo
		//$('#editar_perfil').hide();
		$('#completo').show();
		$('#simulacion').show();
		$('#partes').hide();
		$('#usuarios').hide();
		$('#graficas').hide();
		$('#grupos').hide();
		$('#administrar').hide();
	}else if (opcion == 5) {// partes
		//$('#editar_perfil').hide();
		$('#completo').hide();
		$('#partes').show();
		$('#usuarios').hide();
		$('#grupos').hide();
		$('#graficas').hide();
		$('#simulacion').show();
		$('#usuarios').hide();
		$('#administrar').hide();
	}else if (opcion == 6) { //Admin - Estudiantes
		//$('#editar_perfil').hide();
		$('#perfil').hide();
		$('#usuarios').show();
		$('#graficas').hide();
		$('#estudiantes').show();
		$('#administradores').hide();
		$('#profesores').hide();
		$('#grupos').hide();
	}else if (opcion == 7) { //Admin - Profesores
		//$('#editar_perfil').hide();
		$('#perfil').hide();
		$('#usuarios').show();
		$('#graficas').hide();
		$('#administradores').hide();
		$('#profesores').show();
		$('#estudiantes').hide();
		$('#grupos').hide();
	}else if (opcion == 8) { //Admin - Grupos
		//$('#editar_perfil').hide();
		$('#perfil').hide();
		$('#usuarios').hide();
		$('#graficas').hide();
		$('#grupos').show();
		$('#administradores').hide();
	}else if (opcion == 9) { //Admin - Admin
		//$('#editar_perfil').hide();
		$('#perfil').hide();
		$('#usuarios').show();
		$('#administradores').show();
		$('#graficas').hide();
		$('#estudiantes').hide();
		$('#profesores').hide();
		$('#grupos').hide();
	}else if (opcion == 10) { //Admin - perfil
		//$('#editar_perfil').hide();
		$('#perfil').show();
		$('#usuarios').hide();
		$('#administradores').hide();
		$('#estudiantes').hide();
		$('#graficas').hide();
		$('#profesores').hide();
		$('#grupos').hide();
	}else if (opcion == 11) { //Graficas
		$('#graficas').show();
		$('#perfil').hide();
		$('#usuarios').hide();
		$('#administradores').hide();
		$('#estudiantes').hide();
		$('#profesores').hide();
		$('#grupos').hide();
	}

}

function mostrar_info_quiz(modulo){
	//alert(modulo);

	if(modulo != ""){
		var mostrar=document.getElementById('info_quiz');

		if (modulo == 1) {
			mostrar.innerHTML =  "<h4 class='text-center'>Información Modulo 1</h4><br><label>Se Realizara Una Prueba Practica Y Teorica sobre el Esqueleto Axial, el cual constara de un total de 20 preguntas 10 para prueba practica y 10 para prueba teorica.</label>";
		}else if (modulo == 2) {
			mostrar.innerHTML =  "<h4 class='text-center'>Información Modulo 2</h4><br><label>Se Realizara Una Prueba Practica Y Teorica sobre el Esqueleto Apendicular, el cual constara de un total de 20 preguntas 10 para prueba practica y 10 para prueba teorica.</label>";
		}else if (modulo == 3) {
			mostrar.innerHTML =  "<h4 class='text-center'>Información Modulo 3</h4><br><label>Se Realizara Una Prueba Practica Y Teorica general tomando tanto el esqueleto axial como apendicular, el cual constara de un total de 20 preguntas 10 para prueba practica y 10 para prueba teorica.</label>";
		}else if (modulo == 4) {
			mostrar.innerHTML =  "<h4 class='text-center'>Información Modulo Extra</h4><br><label></label>";
		}
		
	}else{
		var mostrar=document.getElementById('info_quiz');
		mostrar.innerHTML =  "";
	}
}

function finalizar(){

	var respuesta;
	var tipo;
	var contestada;
	var contestada2;
	var contestada3;
	var contestada4;
	var val;
	var opc1;
	var opc2;
	var opc3;
	var opc4;
	var cont_respuestas = 0;

	var i = 0;

	for (var i = 1; i < 16; i++) {

		tipo = document.getElementById('pregunta_' + i + '_tipo').value;
		//console.log(tipo);

		if (tipo == 1){
			respuesta = document.getElementById('pregunta_'+i+'_0').value;
			contestada = $('input:radio[name=pregunta_'+i+']:checked').val();
			//console.log($('input:radio[name=pregunta_'+i+']:checked').val());
			//console.log(respuesta + ' - ' + contestada);
			if(respuesta == contestada){
				cont_respuestas++;
            	//msg('Felicitaciones', 'Respuesta Correcta');
            	console.log('Felicitaciones' + ', Respuesta Correcta');
            	//Ext.getCmp('pregunta_1').setDisabled(true);
            }else{
             	//msg('Error', 'Respuesta Incorrecta');
             	console.log('Error' + ', Respuesta Incorrecta')
            	//Ext.getCmp('pregunta_1').setDisabled(true);
            }
        }else if (tipo == 2){
        	respuesta = document.getElementById('pregunta_'+i+'_0').value;
        	opc1 = $('#pregunta_'+i+'_1').is(':checked');
        	opc2 = $('#pregunta_'+i+'_2').is(':checked');
        	opc3 = $('#pregunta_'+i+'_3').is(':checked');
        	opc4 = $('#pregunta_'+i+'_4').is(':checked');

        	//$('#pregunta_'+i+'_1').is(':checked');

        	respuesta = respuesta.split(",");

        	//console.log(respuesta + ' - ' + opc1 + ',' + opc2 + ',' + opc3 + ',' + opc4 + ',');
            //respuesta = Array(respuesta);

            if(respuesta[0] < 8){
            	respuesta[0] = true;
            } else if(respuesta[0] > 7){
            	respuesta[0] = false;
            }

            if(respuesta[1] < 8){
            	respuesta[1] = true;
            } else if(respuesta[1] > 7){
            	respuesta[1] = false;
            }

            if(respuesta[2] < 8){
            	respuesta[2] = true;
            } else if(respuesta[2] > 7){
            	respuesta[2] = false;
            }

            if(respuesta[3] < 8){
            	respuesta[3] = true;
            } else if(respuesta[3] > 7){
            	respuesta[3] = false;
            }

            if(respuesta[0] < 8 && respuesta[1] < 8 && respuesta[2] < 8 && respuesta[3] > 7){
            	respuesta[0] = false;
            	respuesta[1] = false;
            	respuesta[2] = false;
            	respuesta[3] = true;
            }
            val = [opc1, opc2, opc3, opc4];

            //console.log(respuesta + ' - ' + val);

            respuesta = respuesta.toString();
            val = val.toString();

            if(respuesta == val){
            	cont_respuestas++;
            	console.log('Felicitaciones' + ', Respuesta Correcta');
            }else{

            	console.log('Error' + ', Respuesta Incorrecta')
            }
        }else if (tipo == 3){
        	respuesta = document.getElementById('pregunta_'+i+'_0').value;
        	contestada = $('input:radio[name=pregunta_'+i+']:checked').val();

            //console.log(respuesta + ' - ' + contestada);

            if(contestada != null){
            	if(respuesta.toString() == contestada.toString()){
            		cont_respuestas++;
            		console.log('Felicitaciones' + ', Respuesta Correcta');
            	}                        
            }else{

            	console.log('Error' + ', Respuesta Incorrecta')
            }
        }else if (tipo == 4){
        	respuesta = document.getElementById('pregunta_'+i+'_0').value;
        	contestada = $('input:radio[name=pregunta_'+i+'_1]:checked').val();
        	contestada2 = $('input:radio[name=pregunta_'+i+'_2]:checked').val();
        	contestada3 = $('input:radio[name=pregunta_'+i+'_3]:checked').val();

        	contestada4 = contestada + '-' + contestada2 + '-' + contestada3;

        	//console.log(respuesta + ' - ' + contestada4);

        	if(respuesta.toString() == contestada4.toString()){
        		cont_respuestas++;
        		console.log('Felicitaciones' + ', Respuesta Correcta');
        	}else{

        		console.log('Error' + ', Respuesta Incorrecta');
        	}
        }

       // console.log(cont_respuestas);
   }

   ajax_almacenar(cont_respuestas);
}

function carga_quiz(modulo, tema){

	$('#prueba').show();
	var tipo;
	var ale = tipo = Math.floor((Math.random() * 4) + 1);
	var arreglo;  
	var html = "";
	var botones = "";
	var paneles = "";

	paneles += '<div class="tab-pane active" id="inicio">  ';
	paneles += '<h4><label class="tree-toggler nav-header"> <br>';
	paneles += 'Bienvenido Al Quiz Teorico, Este Se compone de un conjunto de 10 preguntas generadas aleatoriamente, <br> las cuales pueden variar entre 4 tipos de pregunta,  entre las cuales encontramos <br> <br> - Seleccion Unica. <br> - Seleccion Multiple. <br> - Falso Y verdadero. <br> - Asociación.';
	paneles += '<br> <br> Para Iniciar El Quiz Selecciona Cualquier Pregunta. <br> Para Que El Quiz Pueda Ser Evaluado Debe tener Un 100% respuestas Contestadas.';
	paneles += '<br> Exitos...';
	paneles += '</label></h4> ';

	paneles += '<br><br><h5><label class="tree-toggler nav-header">PD: Recuerde Que Este Quiz Solo se puede presentar Una Vez y una Vez Terminado Se procedera A activar el Quiz del siquiente modulo. </label></h5>';
	paneles += '<h5><label class="tree-toggler nav-header">PD: Antes De dar por finalizado el Quiz Verifica las respuestas. </label></h5> </div>';

	if(modulo == 1){

		tipo_modulo = 1;
		tipo_eva = 1;

		$('#prueba').show();
		$('#info_panel').hide();
		$('#simulacion').hide();
		$('#panel_evaluacion').hide();

		modulo = "osteologia";
		tema = "Esqueleto Axial";

		for (var i = 1; i < 16; i++) {

			tipo = ale = Math.round(Math.random()*(4-1)+parseInt(1));
			//tipo = 4;

			if (tipo == 1) {
				arreglo = ajax_quiz(modulo, tema, 1);
				var panel = tipo1(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 2) {
				arreglo = ajax_quiz(modulo, tema, 2)
				var panel = tipo2(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 3) {
				arreglo = ajax_quiz(modulo, tema, 3)
				var panel = tipo3(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 4) {
				arreglo = ajax_quiz(modulo, tema, 4)
				var panel = tipo4(arreglo, modulo, tema, i);
				paneles += panel;
			}
		}

		paneles += '<br><div class="tab-pane" id="final" > 	Este Es El Final </div>';
		paneles += '<div id="bar" style="margin:0;" class="progress progress-info progress-striped active"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>';

		botones = '<ul class="pager wizard class="col-lg-12" style="">  <li class="previous first"><a href="javascript:;">First</a></li><li class="previous"><a href="javascript:;">Previous</a></li>';
		botones += '<li class="next last"><a href="javascript:;">Last</a></li><li class="next"><a href="javascript:;">Next</a></li><li class="next finish" id="finaliza" style="display:none;"><a href="javascript:;" onclick="finalizar()">Finish</a></li></ul>';
		paneles += ' <br>' + botones;

		var parent = document.getElementById('preguntas');
		parent.innerHTML=paneles;

	}else if(modulo == 2){

		tipo_modulo = 2;
		tipo_eva = 1;

		$('#prueba').show();
		$('#info_panel').hide();
		$('#simulacion').hide();
		$('#panel_evaluacion').hide();

		modulo = "osteologia";
		tema = "Esqueleto Apendicular";

		for (var i = 1; i < 11; i++) {

			tipo = ale = Math.round(Math.random()*(4-1)+parseInt(1));
			//tipo = 4;

			if (tipo == 1) {
				arreglo = ajax_quiz(modulo, tema, 1);
				var panel = tipo1(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 2) {
				arreglo = ajax_quiz(modulo, tema, 2)
				var panel = tipo2(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 3) {
				arreglo = ajax_quiz(modulo, tema, 3)
				var panel = tipo3(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 4) {
				arreglo = ajax_quiz(modulo, tema, 4)
				var panel = tipo4(arreglo, modulo, tema, i);
				paneles += panel;
			}
		}

		paneles += '<br><div class="tab-pane" id="final"> 	Este Es El Final </div>';
		paneles += '<div id="bar" style="margin:0;" class="progress progress-info progress-striped"> <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>';

		botones = '<ul class="pager wizard class="col-lg-12" style="">  <li class="previous first"><a href="javascript:;">First</a></li><li class="previous"><a href="javascript:;">Previous</a></li>';
		botones += '<li class="next last"><a href="javascript:;">Last</a></li><li class="next"><a href="javascript:;">Next</a></li><li class="next finish" id="finaliza" style="display:none;"><a href="javascript:;" onclick="finalizar()">Finish</a></li></ul>';
		paneles += ' <br>' + botones;

		var parent = document.getElementById('preguntas');
		parent.innerHTML=paneles;
	}else if(modulo == 3){

		tipo_modulo = 3;
		tipo_eva = 1;

		$('#prueba').show();
		$('#info_panel').hide();
		$('#simulacion').hide();
		$('#panel_evaluacion').hide();

		modulo = "osteologia";
		tema = 3;

		for (var i = 1; i < 11; i++) {
			
			tipo = ale = Math.round(Math.random()*(4-1)+parseInt(1));
			//tipo = 4;

			if (tipo == 1) {
				arreglo = ajax_quiz(modulo, tema, 1);
				var panel = tipo1(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 2) {
				arreglo = ajax_quiz(modulo, tema, 2)
				var panel = tipo2(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 3) {
				arreglo = ajax_quiz(modulo, tema, 3)
				var panel = tipo3(arreglo, modulo, tema, i);
				paneles += panel;
			}else if (tipo == 4) {
				arreglo = ajax_quiz(modulo, tema, 4)
				var panel = tipo4(arreglo, modulo, tema, i);
				paneles += panel;
			}
		}

		paneles += '<br><div class="tab-pane" id="final" > 	Este Es El Final </div>';
		paneles += '<div id="bar" style="margin:0;" class="progress progress-info progress-striped"> <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>';

		botones = '<ul class="pager wizard class="col-lg-12" style="">  <li class="previous first"><a href="javascript:;">First</a></li><li class="previous"><a href="javascript:;">Previous</a></li>';
		botones += '<li class="next last"><a href="javascript:;">Last</a></li><li class="next"><a href="javascript:;">Next</a></li><li class="next finish" id="finaliza" style="display:none;"><a href="javascript:;" onclick="finalizar()">Finish</a></li></ul>';
		paneles += ' <br>' + botones;

		var parent = document.getElementById('preguntas');
		parent.innerHTML=paneles;

	}else if(modulo == 11){

		tipo_modulo = 1;
		tipo_eva = 2;

		$('#simulacion').show();
		$('#panel_evaluacion').show();
		$('#prueba').hide();
		cargar_evaluacion(1);
		pregunta();
	}else if(modulo == 22){

		tipo_modulo = 2;
		tipo_eva = 2;

		$('#simulacion').show();
		$('#panel_evaluacion').show();
		$('#prueba').hide();
		cargar_evaluacion(2);
		pregunta();
	}else if(modulo == 33){

		tipo_modulo = 3;
		tipo_eva = 2;

		$('#simulacion').show();
		$('#panel_evaluacion').show();
		$('#prueba').hide();
		cargar_evaluacion(3);
		pregunta();
	}


}

function ajax_almacenar(respuesta){

	$.ajax({
		type:"POST",
		url: "../../../plugin/postgres/respuestas.php",
		async: false,
		data: 'modulo='+tipo_modulo+'&evaluacion='+tipo_eva+'&respuestas='+respuesta+'&cedula='+$('.cedula').attr('id')
	}).done(function(data){
		if(data == 1){
			alert('Exito Al Guardar');
		}else{
			alert('Error Al Guardar');
		}
	});

}

function ajax_quiz(modulo, tema, opc){
	panel = "";

	$.ajax({
		type:"POST",
		url: "../../../plugin/postgres/evaluacion.php",
		async: false,
		data: 'modulo='+modulo+'&tema='+tema+'&opc='+opc
	}).done(function(data){
		var s = JSON.parse(data);
		panel = s;
	});

	return panel;
}


function tipo1(arreglo, modulo, tema, i){ // seleccion Unica
	//alert(i);
	//console.log(modulo + " - " + tema);

	var panel = "";
	var html;

	var aleatorio;
	var mostrar;
	var respuesta;
	var ale = Math.round(Math.random()*(7-1)+parseInt(1));;

	switch(ale){
		case 1:
		aleatorio = [1,5,2,4,3];
		break;
		case 2:
		aleatorio = [5,4,3,2,1];
		break;
		case 3:
		aleatorio = [1,3,4,2,5];
		break;
		case 4:
		aleatorio = [2,4,5,3,1];
		break;
		case 5:
		aleatorio = [5,1,2,4,3];
		break;
		case 6:
		aleatorio = [5,4,3,1,2];
		break;
		case 7:
		aleatorio = [2,4,5,1,3];
		break;
	}

	ale = Math.floor((Math.random() * 4) + 1);

	///aleatorio division 0, nombre 1, grupo 2, descripcion, 3
	if (ale == 1) {        
		html = '<p class="pregunta" id="pregunta"> Este Hueso hace parte del '+ arreglo[0].grupo + ' y '+ arreglo[0].descripcion +' </p>';
		//html = '<p class="pregunta" id="pregunta">' + 'oeoeo' + '  </p>';
		//R: Nombre
		mostrar = [arreglo[aleatorio[0]-1].nombre, arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre, arreglo[aleatorio[3]-1].nombre, arreglo[aleatorio[4]-1].nombre];    
		respuesta = new Array(arreglo[0].id,arreglo[0].nombre);
	}
	if (ale == 2) {
		//html = '<p class="pregunta" id="pregunta">' + 'oeoeo' + '  </p>';
		html = '<p class="pregunta" id="pregunta"> En el ' + arreglo[0].grupo +' hay diversos huesos, en el area de '+ arreglo[0].division + ' hay un hueso,  ' + arreglo[0].descripcion + ' y el cual es?</p>';
		//R: Nombre
		mostrar = [arreglo[aleatorio[0]-1].nombre, arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre, arreglo[aleatorio[3]-1].nombre, arreglo[aleatorio[4]-1].nombre];    
		respuesta = new Array(arreglo[0].id,arreglo[0].nombre);
	}
	if (ale == 3) {
		//html = '<p class="pregunta" id="pregunta">' + 'oeoeo' + '  </p>';
		html = '<p class="pregunta" id="pregunta"> ' + arreglo[0].nombre +' que pertenece al '+ arreglo[0].grupo + ' y ... </p>';
		//R: Descripcion
		mostrar = [arreglo[aleatorio[0]-1].descripcion, arreglo[aleatorio[1]-1].descripcion, arreglo[aleatorio[2]-1].descripcion, arreglo[aleatorio[3]-1].descripcion, arreglo[aleatorio[4]-1].descripcion];    
		respuesta = new Array(arreglo[0].id,arreglo[0].descripcion);
	}
	if (ale == 4) {
		html = '<p class="pregunta" id="pregunta"> Dentro del ' + arreglo[0].grupo + ' existe ' + arreglo[0].nombre + ' el cual hace parte de  </p>';    
		//R: division
		mostrar = [arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division, arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division, arreglo[aleatorio[4]-1].division];    
		respuesta = new Array(arreglo[0].id,arreglo[0].division);
	}

	panel += '	<div class="tab-pane well" id="pregunta_'+i+'" style="border-style: outset; padding-left: 10px;"> ';
	panel += '<h5><label class="tree-toggler nav-header "> ';
	panel += html + '';
	panel += '</label></h5>';

	panel += '<div class="form-group">';//columna
	
	panel += ' <div class="col-lg-10">';
	panel += '<label> <input type="hidden" name="pregunta_' + i + '_tipo" id="pregunta_' + i + '_tipo" value="1"> </label>';
	panel += '<label> '+ /*respuesta[0]*/'' +' <input type="hidden" name="pregunta_' + i + '_0" id="pregunta_' + i + '_0" value="'+respuesta[0]+'"> </label>';
	panel += ' </div> ';

	panel += '<div class="row">';
	panel += '<div class="col-lg-3"><label class="control-label">Seleccion Unica</label>';
	panel += '</div>';

	panel += '<div class="col-lg-7" style="overflow-x:scroll; overflow-y:scroll; height:200px;">';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_1" value="'+ arreglo[aleatorio[0]-1].id +'">';
	panel += ' '+ mostrar[0] +' </label> </div>';
	
	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_2" value="'+ arreglo[aleatorio[1]-1].id +'">';
	panel += ' '+ mostrar[1] +' </label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_3" value="'+ arreglo[aleatorio[2]-1].id +'">';
	panel += ' '+ mostrar[2] +' </label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_4" value="'+ arreglo[aleatorio[3]-1].id +'">';
	panel += ' '+ mostrar[3] +' </label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_5" value="'+ arreglo[aleatorio[4]-1].id +'">';
	panel += ' '+ mostrar[4] +' </label> </div> ';

	panel += '</div> </div> </div>';//fin row y columna
	panel += '</div>';

	//alert(panel);
	return panel;

}

function arreglo_aleatorio(opc){

	var a1 = 0;
	var a2 = 0;
	var a3 = 0;
	var a4 = 0;
	var aleatorio;

	if(opc == 1){
		a1 = Math.round(Math.random()*(7-1)+parseInt(1));
		a2 = Math.round(Math.random()*(14-8)+parseInt(8));
		a3 = Math.round(Math.random()*(7-1)+parseInt(1));
		a4 = Math.round(Math.random()*(14-8)+parseInt(8));

		while(a1 == a2 || a1 == a3 || a1 == a4 || a2 == a3 || a2 == a4 || a3 == a4){
			a1 = Math.round(Math.random()*(7-1)+parseInt(1));
			a2 = Math.round(Math.random()*(14-8)+parseInt(8));
			a3 = Math.round(Math.random()*(7-1)+parseInt(1));
			a4 = Math.round(Math.random()*(14-8)+parseInt(8));
			aleatorio = [a1, a2, a3, a4];
		}
	}else if (opc == 2 || opc == 10){
		a1 = Math.round(Math.random()*(14-8)+parseInt(8));
		a2 = Math.round(Math.random()*(14-8)+parseInt(8));
		a3 = Math.round(Math.random()*(14-8)+parseInt(8));
		a4 = 1;

		while(a1 == a2 || a1 == a3 || a2 == a3){
			a1 = Math.round(Math.random()*(14-8)+parseInt(8));
			a2 = Math.round(Math.random()*(14-8)+parseInt(8));
			a3 = Math.round(Math.random()*(14-8)+parseInt(8));
			a4 = 1;
			aleatorio = [a1, a2, a3, a4];
		}  
	}else if (opc == 3) {

	}else if (opc == 3) {

	}else if (opc == 3) {

	}

	aleatorio = [a1, a2, a3, a4];

	return aleatorio;
}

function tipo2(arreglo, modulo, tema, i, ale_opc){ // seleccion Multiple

	//alert(arreglo);
	//console.log(modulo + " - " + arreglo);
	var html = "";

	var aleatorio;
	var mostrar;
	var panel = "";
	var ale = Math.floor((Math.random() * 10) + 1);
	//var ale = 1;
	//
	var opc = Math.round(Math.random()*(3-1)+parseInt(1));
	//console.log(opc*2);

	//ale = 2;	
	switch(ale){
		//Math.round(Math.random()*(b-a)+parseInt(a));
		//Math.round(Math.random()*(14-7)+parseInt(7));
		case 1:
		aleatorio = arreglo_aleatorio(ale);
		break;
		case 2:
		aleatorio = arreglo_aleatorio(ale);
		break;
		case 3:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(14-8)+parseInt(8))];//A - B
		break;
		case 4:
		aleatorio = [ Math.round(Math.random()*(14-8)+parseInt(8)) , Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8))];//B - C
		break;
		case 5:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8))];//todas
		break;
		case 6:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(7-1)+parseInt(1))];//A - D
		break;
		case 7:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(7-1)+parseInt(1))];//A - D
		break;
		case 8:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8))];//A - D
		break;
		case 9:
		aleatorio = [ Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(7-1)+parseInt(1)), Math.round(Math.random()*(14-8)+parseInt(8)), Math.round(Math.random()*(14-8)+parseInt(8))];//A - B
		break;
		case 10:
		aleatorio = arreglo_aleatorio(ale);
		break;
	}

	switch(opc){
		case 1:
		html = '<p class="pregunta" id="pregunta"> En el grupo del '+ arreglo[0].grupo + ' se encuentran diversos huesos, entre los cuales encontramos? </p>';
		mostrar = [arreglo[aleatorio[0]-1].nombre, arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre, arreglo[aleatorio[3]-1].nombre];
		break;
		case 2:
		html = '<p class="pregunta" id="pregunta"> En el grupo del '+ arreglo[0].grupo + ' se encuentran diversas regiones, las cuales son? </p>';
		mostrar = [arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division, arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division];
		break;
		case 3:
		html = '<p class="pregunta" id="pregunta"> En el grupo del '+ arreglo[0].grupo + ' se encuentran diversos huesos y regiones, cuales son? </p>';
		mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		break;
		case 4:
		html = '<p class="pregunta" id="pregunta"> El hueso '+ arreglo[0].nombre + ' se encuentra y pertenece a? </p>';
		if(aleatorio[0] < 8 && aleatorio[1] < 8){
			mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		}else if(aleatorio[1] < 8 && aleatorio[2] < 8){
			mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		}else if(aleatorio[0] < 8 && aleatorio[2] < 8){
			mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		}/*else if(aleatorio[0] < 8 && aleatorio[3] < 8){
			mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		}else if(aleatorio[1] < 8 && aleatorio[3] < 8){
			mostrar = [arreglo[aleatorio[0]-1].nombre + ' - ' + arreglo[aleatorio[0]-1].division, arreglo[aleatorio[1]-1].division + ' - ' + arreglo[aleatorio[1]-1].nombre, arreglo[aleatorio[2]-1].nombre + ' - ' + arreglo[aleatorio[2]-1].division, arreglo[aleatorio[3]-1].division + ' - ' + arreglo[aleatorio[3]-1].nombre];
		}*/
		break;
	}



	if(aleatorio[0] < 8 && aleatorio[1] < 8 && aleatorio[2] < 8 && aleatorio[3] > 7){
		/*mostrar[0] = arreglo[0].grupo;
		mostrar[1] = arreglo[0].nombre;
		mostrar[2] = arreglo[0].division;*/
		mostrar[3] = 'Todas Las Anteriores';
		aleatorio[0] = 10;
		aleatorio[1] = 10;
		aleatorio[2] = 10;
		aleatorio[3] = 1;
	}else if(aleatorio[0] > 7 && aleatorio[1] > 7 && aleatorio[2] > 7 && aleatorio[3] < 8){
		/*mostrar[0] = arreglo[1].nombre;
		mostrar[1] = arreglo[4].nombre;
		mostrar[2] = arreglo[2].nombre;*/
		mostrar[3] = 'Ninguna De Las Anteriores';
	}

	var respuesta = aleatorio;

	panel += '	<div class="tab-pane well" id="pregunta_'+i+'" style="border-style: outset; padding-left: 10px;"> ';
	panel += '<h5><label class="tree-toggler nav-header "> ';
	panel += html;
	panel += '</label></h5>';

	panel += '<div class="form-group">';//columna
	
	panel += ' <div class="col-lg-10">';
	panel += '<label> <input type="hidden" name="pregunta_' + i + '_tipo" id="pregunta_' + i + '_tipo" value="2"> </label>';
	panel += '<label> '+ /*respuesta[0]*/'' +' <input type="hidden" name="pregunta_' + i + '_0" id="pregunta_' + i + '_0" value="'+respuesta+'"> </label>';
	panel += ' </div> ';

	panel += '<div class="row">';

	panel += '<div class="col-lg-3"><label class="control-label">Seleccion Multiple</label>';
	panel += '</div>';

	panel += '<div class="col-lg-8">';

	panel += '<div class="checkbox"> <label>';
	panel += '<input type="checkbox" name="pregunta_' + i +'" id="pregunta_' + i + '_1" value="'+arreglo[aleatorio[0]-1].id+'">';
	panel +=  mostrar[0] +'</label> </div>';
	
	panel += '<div class="checkbox"> <label>';
	panel += '<input type="checkbox" name="pregunta_' + i +'" id="pregunta_' + i + '_2" value="'+arreglo[aleatorio[1]-1].id+'">';
	panel += mostrar[1] +'</label> </div>';

	panel += '<div class="checkbox"> <label>';
	panel += '<input type="checkbox" name="pregunta_' + i +'" id="pregunta_' + i + '_3" value="'+arreglo[aleatorio[2]-1].id+'">';
	panel += mostrar[2] +'</label> </div>';

	panel += '<div class="checkbox"> <label>';
	panel += '<input type="checkbox" name="pregunta_' + i +'" id="pregunta_' + i + '_4" value="'+arreglo[aleatorio[3]-1].id+'">';
	panel += mostrar[3] +'</label> </div>';

	panel += '</div> </div> </div> ';// columna row
	panel += '</div>';

	return panel;
}

function tipo3(arreglo, modulo, tema, i){ // Falso y Verdadero

	//console.log(modulo + " - " + tema);
	var html;

	var panel = "";
	var aleatorio ;
	var ale;
	var respuesta = false;
	var cual = Math.floor((Math.random() * 10) + 1);

	aleatorio = [Math.floor((Math.random() * 5) + 1)];
	aleatorio.push(Math.floor((Math.random() * 5) + 1));
	aleatorio.push(Math.floor((Math.random() * 5) + 1));
	aleatorio.push(Math.floor((Math.random() * 5) + 1));

	var division = arreglo[aleatorio[0]-1].division;
	division = arreglo[aleatorio[0]-1].division.toLowerCase();
	arreglo[aleatorio[0]-1].division = division;

	var grupo = arreglo[aleatorio[2]-1].grupo;
	grupo = arreglo[aleatorio[2]-1].grupo.toLowerCase();
	arreglo[aleatorio[2]-1].grupo = grupo;

	var nombre = arreglo[aleatorio[1]-1].nombre;
	nombre = arreglo[aleatorio[1]-1].nombre.toLowerCase();
	arreglo[aleatorio[1]-1].nombre = nombre;

	//console.log(cual);

	if(cual%2 != 0){
		ale = Math.floor((Math.random() * 5) + 1);
		aleatorio[0] = ale;
		aleatorio[1] = ale;
		aleatorio[2] = ale;
		aleatorio[3] = ale;
		respuesta = true;

	}   

	ale = Math.floor((Math.random() * 3) + 1);

	///aleatorio division 0, nombre 1, grupo 2, descripcion, 3
	if (ale == 1) {        
		html = '<p class="pregunta" id="pregunta"> En '+ arreglo[aleatorio[0]-1].division +' existen diversos huesos entre los cuales esta el '+ arreglo[aleatorio[1]-1].nombre +', este pertenece a '+ arreglo[aleatorio[2]-1].grupo +' </p>';
		//html = '<p class="pregunta" id="pregunta">' + 'oeoeo' + '  </p>';
	}
	if (ale == 2) {
		//var aa = arreglo[aleatorio[1]-1].nombre.charAt(0).toUpperCase() + arreglo[aleatorio[1]-1].nombre.slice(1);
		//arreglo[aleatorio[1]-1].nombre = aa;
		html = '<p class="pregunta" id="pregunta">' + arreglo[aleatorio[2]-1].nombre + ' perteneciente a ' + arreglo[aleatorio[0]-1].division + ' ' + arreglo[aleatorio[3]-1].descripcion + '  </p>';

	}
	if (ale == 3) {
		//html = '<p class="pregunta" id="pregunta">' + 'oeoeo' + '  </p>';
		html = '<p class="pregunta" id="pregunta"> El caballo se compone de diversos huesos de los cuales ' + arreglo[aleatorio[1]-1].nombre +' se ubica en '+ arreglo[aleatorio[0]-1].division +'</p>';
	}

	if (aleatorio.toString() == '1,1,1,1') {
		respuesta = true;
	}


	panel += '	<div class="tab-pane well" id="pregunta_'+i+'" style="border-style: outset; padding-left: 10px;"> ';
	panel += '<h5><label class="tree-toggler nav-header "> ';
	panel += html;
	panel += '</label></h5>';

	panel += '<div class="form-group">';//columna
	
	panel += ' <div class="col-lg-10">';
	panel += '<label> <input type="hidden" name="pregunta_' + i + '_tipo" id="pregunta_' + i + '_tipo" value="3"> </label>';
	panel += '<label> '+ /*respuesta[0]*/'' +' <input type="hidden" name="pregunta_' + i + '_0" id="pregunta_' + i + '_0" value="'+respuesta+'"> </label>';
	panel += ' </div> ';

	panel += '<div class="row">';
	panel += '<div class="col-lg-4"><label class="control-label">Falso O Verdadero</label>';
	panel += '</div>';

	panel += '<div class="col-lg-8">';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_1" value="true">';
	panel += 'Verdadero </label> </div>';
	
	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_' + i + '" id="pregunta_' + i + '_2" value="false">';
	panel += 'Falso </label> </div>';

	panel += '</div> </div> </div>';//fin row y columna
	panel += '</div>';

	//alert(panel);
	return panel;
}

function tipo4(arreglo, modulo, tema, i){

	var panel = "";
	var aleatorio = new Array(2);

	var mostrar = new Array(12);

	var ale;
	var html, columna1, columna2, columna3;

	var respuesta;
	var oo;

	var cual = Math.floor((Math.random() * 10) + 1);

	ale = Math.floor((Math.random() * 6) + 1);

	switch(ale){
		case 1:
		aleatorio[0] = new Array(1,2,3,4);
		aleatorio[1] = new Array(1,3,4,2);
		aleatorio[2] = new Array(2,4,3,1);
		//aleatorio[3] = new Array(1,2,4,3);
		break;
		case 2:
		aleatorio[0] = new Array(3,2,1,5);
		aleatorio[1] = new Array(5,3,4,1);
		aleatorio[2] = new Array(2,1,3,4);
		//aleatorio[3] = new Array(5,2,1,3); 
		break;
		case 3:
		aleatorio[0] = new Array(4,1,3,5);
		aleatorio[1] = new Array(5,1,4,2);
		aleatorio[2] = new Array(2,5,1,3);
		//aleatorio[3] = new Array(1,2,4,3); 
		break;
		case 4:
		aleatorio[0] = new Array(4,2,3,1);
		aleatorio[1] = new Array(1,5,3,2);
		aleatorio[2] = new Array(2,1,4,3);
		//aleatorio[3] = new Array(1,2,4,3); 
		break;
		case 5:
		aleatorio[0] = new Array(4,2,1,5);
		aleatorio[1] = new Array(4,2,3,1);
		aleatorio[2] = new Array(2,1,4,3);
		//aleatorio[3] = new Array(5,2,4,1);
		break;
		case 6:
		aleatorio[0] = new Array(5,2,3,1);
		aleatorio[1] = new Array(4,3,1,2);
		aleatorio[2] = new Array(2,1,3,5);
		//aleatorio[3] = new Array(1,2,4,3);
		break;
	}

	var cont = 0, y = 0;;

	var c = 0, j = 0;
	for (c = 0; c <= 12; c++) {
		mostrar[c] = new Array(6);
	}
	c = 0;

	//console.log(cont);
	/*var c = 0;
	for (c = 0; c <= 2; c++) {
		console.log(aleatorio[c][0] + ' | ' + aleatorio[c][1] + ' | ' + aleatorio[c][2] + ' | ' + aleatorio[c][3    ]);
	}
	c = 0;*/

	var c = 0, j = 0, cont = 0;
	ale = Math.floor((Math.random() * 3) + 1); 
	for (c = 0; c <= 2; c++) {
		for (j = 0; j <= 3; j++) {
			if(ale == 1){
				html = '<p class="pregunta" id="pregunta"> '+ arreglo[0].nombre + ' ..... </p>';
				respuesta = arreglo[0].division + '-' + arreglo[0].grupo + '-' + arreglo[0].descripcion;
				columna1 = 'Pertenece A';
				columna2 = 'Se Encuentra en el';
				columna3 = 'Y';
				mostrar[cont][0] = arreglo[aleatorio[c][j]-1].id;
				mostrar[cont][1] = arreglo[aleatorio[c][j]-1].division;
				mostrar[cont][2] = arreglo[aleatorio[c][j]-1].descripcion;
				mostrar[cont][3] = arreglo[aleatorio[c][j]-1].nombre;
				mostrar[cont][4] = arreglo[aleatorio[c][j]-1].grupo;
				mostrar[cont][5] = arreglo[aleatorio[c][j]-1].descripcion;
				//msg('aleatorios', aleatorio);
				oo = ale;  
				//console.log(ale);
				cont++;
			}
			if(ale == 2){
				html = '<p class="pregunta" id="pregunta"> En '+ arreglo[0].division +' ..... </p>';
				respuesta = arreglo[0].nombre + '-' + arreglo[0].grupo + '-' + arreglo[0].descripcion;
				columna1 = 'Existe';
				columna2 = 'El cual Pertenece a ';
				columna3 = 'Y';
				mostrar[cont][0] = arreglo[aleatorio[c][j]-1].id;
				mostrar[cont][1] = arreglo[aleatorio[c][j]-1].nombre;
				mostrar[cont][2] = arreglo[aleatorio[c][j]-1].descripcion;
				mostrar[cont][3] = arreglo[aleatorio[c][j]-1].division;
				mostrar[cont][4] = arreglo[aleatorio[c][j]-1].grupo;
				mostrar[cont][5] = arreglo[aleatorio[c][j]-1].descripcion;
				oo = ale;  
				cont++;
			}
			if(ale == 3){
				//var aa = arreglo[0].descripcion.charAt(0).toUpperCase() + arreglo[0].nombre.slice(1);
				//arreglo[0].descripcion = aa;
				html = '<p class="pregunta" id="pregunta"> '+ arreglo[0].descripcion +' </p>';
				respuesta = arreglo[0].nombre + '-' + arreglo[0].grupo + '-' + arreglo[0].division;
				columna1 = 'Corresponde a';
				columna2 = 'Se Encuentra en el';
				columna3 = 'y pertenece a';
				mostrar[cont][0] = arreglo[aleatorio[c][j]-1].id;
				mostrar[cont][1] = arreglo[aleatorio[c][j]-1].nombre;
				mostrar[cont][2] = arreglo[aleatorio[c][j]-1].descripcion;
				mostrar[cont][3] = arreglo[aleatorio[c][j]-1].division;
				mostrar[cont][4] = arreglo[aleatorio[c][j]-1].grupo;
				mostrar[cont][5] = arreglo[aleatorio[c][j]-1].division;
				oo = ale;  
				cont++;
			}
		}
	}
	c = j = 0;


	panel += '	<div class="tab-pane well" id="pregunta_'+i+'" style="border-style: outset; padding-left: 10px;"> ';
	panel += '<h5><label class="tree-toggler nav-header "> ';
	panel += html;
	panel += '</label></h5>';

	panel += '<div class="form-group">';//columna

	panel += ' <div class="col-lg-12">';
	panel += '<label> <input type="hidden" name="pregunta_' + i + '_tipo" id="pregunta_' + i + '_tipo" value="4"> </label>';
	panel += '<label> '+ /*respuesta[0]*/'' +' <input type="hidden" name="pregunta_' + i + '_0" id="pregunta_' + i + '_0" value="'+respuesta+'"> </label>';
	panel += ' </div> ';

	panel += '<div class="row">';
	panel += '<div class="col-lg-2"><label class="control-label">Asociación</label>';
	panel += '</div>';

	panel += '<div class="col-lg-3" style="overflow-x:scroll; overflow-y:scroll; height:200px;">';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_1" id="pregunta_' + i + '_1" value="'+mostrar[0][1]+'">';
	panel += mostrar[0][1]+'</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_1" id="pregunta_' + i + '_2" value="'+mostrar[1][1]+'">';
	panel += mostrar[1][1]+'</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_1" id="pregunta_' + i + '_3" value="'+mostrar[2][1]+'">';
	panel += mostrar[2][1]+'</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_1" id="pregunta_' + i + '_4" value="'+mostrar[3][1]+'">';
	panel += mostrar[3][1]+'</label> </div>';
	panel += '</div>';

	panel += '<div class="col-lg-2">';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_2" id="pregunta_' + i + '_11" value="Esqueleto Axial">';
	panel += 'Esqueleto Axial </label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_2" id="pregunta_' + i + '_22" value="Esqueleto Apendicular">';
	panel += 'Esqueleto Apendicular </label> </div>';
	panel += '</div>';

	panel += '<div class="col-lg-4" style="overflow-x:scroll; overflow-y:scroll; height:200px;">';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_3" id="pregunta_' + i + '_111" value="'+mostrar[0][5]+'">';
	panel += mostrar[0][5] + '</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_3" id="pregunta_' + i + '_222" value="'+mostrar[1][5]+'">';
	panel += mostrar[1][5] + '</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_3" id="pregunta_' + i + '_333" value="'+mostrar[2][5]+'">';
	panel += mostrar[2][5] + '</label> </div>';

	panel += '<div class="radio"> <label>';
	panel += '<input type="radio" name="pregunta_'+i+'_3" id="pregunta_' + i + '_444" value="'+mostrar[3][5]+'">';
	panel += mostrar[3][5] + '</label> </div>';
	panel += '</div>';

	panel += '</div> </div>';//fin row y columna
	panel += '</div>';

	return panel;

}


