
var material;
var material; 
var shape_id = 0;
var parte = "";


function setCookie(c_name,value,expiredays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString()+";path=/");
}

function ocultar_prueba(tipo, ocultar){


	if(tipo == 1){
		$("#ocultar_"+ocultar['grupo']).parent().children('ul.nav.nav-list.tree').toggle(300);
	}else if(tipo == 2){

		$("#ocultar_"+ocultar['division']).parent().children('ul.nav.nav-list.tree').toggle(300);
	}
}



function carga(huesos, regiones, grupos){

	setHuesos(huesos);

	for (var i = 0; i < grupos.length; i++) {
		$('#'+grupos[i].grupo).checkboxpicker({
			html: true,
			offLabel: '<span class="glyphicon glyphicon-remove">',
			onLabel: '<span class="glyphicon glyphicon-ok">',
			style:'width:20px; height:20px;'
		});
	}

	for (var i = 0; i < regiones.length; i++) {
		$('#'+regiones[i].division).checkboxpicker({
			html: true,
			offLabel: '<span class="glyphicon glyphicon-remove">',
			onLabel: '<span class="glyphicon glyphicon-ok">',
			style:'width:20px; height:20px;'
		});
	}

	for (var i = 0; i < huesos.length; i++) {
		$('#hueso_'+huesos[i].id).checkboxpicker({
			html: true,
			offLabel: '<span class="glyphicon glyphicon-remove">',
			onLabel: '<span class="glyphicon glyphicon-ok">',
			style:'width:20px; height:20px;'
		});
	}

}

function estado_hueso(tipo, datos){

	if(tipo == 1){

		var grupo = datos['grupo'];
		datos['grupo'] = grupo.replace(" ", "_");

		var aux_huesos = huesos;
				//console.log(datos['grupo']);

				var checkbox = document.getElementById(datos['grupo']);
				if(checkbox.checked) {
					//alert(aux_huesos.length);
					for(var i = 0; i < aux_huesos.length; i++){
						if(datos['grupo'] == aux_huesos[i]['grupo'].replace(" ", "_"))
						{
							if(document.getElementById('M'+aux_huesos[i]['idshape']) != null){
								document.getElementById('M'+aux_huesos[i]['idshape']).setAttribute('transparency', '0'); 
								$("#hueso_"+aux_huesos[i]['id']).prop('checked', true); 
								$("#"+aux_huesos[i]['region']).prop('checked', true);
							}
						}
					}
				}else{
					for(var i = 0; i < aux_huesos.length; i++){
						if(datos['grupo'] == aux_huesos[i]['grupo'].replace(" ", "_"))
						{
							if(document.getElementById('M'+aux_huesos[i]['idshape']) != null){
								document.getElementById('M'+aux_huesos[i]['idshape']).setAttribute('transparency', '1'); 
								$("#hueso_"+aux_huesos[i]['id']).prop('checked', false); 
								$("#"+aux_huesos[i]['region']).prop('checked', false);
							} 
						}
					}
				}

			}else if(tipo == 2){

				var aux_huesos = huesos;

				var checkbox = document.getElementById(datos['region']);
				if(checkbox.checked) {
					for(var i = 0; i < aux_huesos.length; i++){
						if(datos['region'] == aux_huesos[i]['region'] && document.getElementById('M'+aux_huesos[i]['idshape']) != null)
						{
							document.getElementById('M'+aux_huesos[i]['idshape']).setAttribute('transparency', '0'); 
							$("#hueso_"+aux_huesos[i]['id']).prop('checked', true); 
						}
					}
				}else{
					for(var i = 0; i < aux_huesos.length; i++){
						if(datos['region'] == aux_huesos[i]['region'] && document.getElementById('M'+aux_huesos[i]['idshape']) != null)
						{
							document.getElementById('M'+aux_huesos[i]['idshape']).setAttribute('transparency', '1'); 
							$("#hueso_"+aux_huesos[i]['id']).prop('checked', false); 
						}
					}
				}

			}else if(tipo == 3){
				if (document.getElementById('M'+datos['idshape']) != null){
					var checkbox = document.getElementById('hueso_' + datos['id']);
					if(checkbox.checked) {
						document.getElementById('M'+datos['idshape']).setAttribute('transparency', '0');

					}else{
						document.getElementById('M'+datos['idshape']).setAttribute('transparency', '1');
					}
				}
			}else if(tipo == 11){
				var idd= $(shape).attr("id");

				material.setAttribute('diffuseColor', '1 1 1');
				document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
				material = document.getElementById('M'+idd);
			}else if(tipo == 22){

				console.log(material);
				material.setAttribute('diffuseColor', '1 1 1');
				var aux_huesos = huesos;
				for(var i = 0; i < aux_huesos.length; i++){
					if(datos['region'] == aux_huesos[i]['region'])
					{
						var idd= aux_huesos[i]['idshape'];
						//material = document.getElementById('M'+idd);
						
						if (document.getElementById('M'+idd) != null){
							document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
						}
					}
				}
			}else if(tipo == 33){
				console.log(material);

				var aux_huesos = huesos;
				var idd = datos['idshape'];
				material.setAttribute('diffuseColor', '1 1 1');
				for (var i = 0; i < aux_huesos.length; i++) {
					if(aux_huesos[i]['idshape'] == idd){	
						if (document.getElementById('M'+idd) != null){
							document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0'); 
							material = document.getElementById('M'+idd);
							var titulo=document.getElementById('info_panel_title');
							titulo.innerHTML =  aux_huesos[i]['nombre'];

							var info=document.getElementById('info');
							info.innerHTML =  aux_huesos[i]['descripcion2'];
						}
					}
				}
			}

		}


		function cambio_partes(opc, file){

			//console.log(opc, nombre);
			
			if(opc == 1) {

				//$('#modelo_general').attr('url')
				//console.log($('#modelo_general').attr('url'));
				if('plugin/Modelos/partes/'+file+'.x3d' != $('#modelo_general').attr('url')){
					$('#modelo_general').attr('url', 'plugin/Modelos/partes/'+file+'.x3d');
					/*parte = file+'_';
					a = document.getElementById('listado_partes');
					while(a.hasChildNodes()){
						a.removeChild(a.firstChild);  
					} */
				}
			}else if(opc == 2) {
				if('plugin/Modelos/partes/'+file+'.x3d' != $('#modelo_partes').attr('url')){
					$('#modelo_partes').attr('url', 'plugin/Modelos/partes/'+file+'.x3d');
					parte = file+'_';
					a = document.getElementById('listado_partes');
					while(a.hasChildNodes()){
						a.removeChild(a.firstChild);  
					} 
				}
			}
		}

		function handleSingleClick_partes(shape)
		{
			console.log($(shape).attr("id"));
			console.log(material.getAttribute('id'));
			var idd= $(shape).attr("id");
			var hueso = document.getElementById('M'+idd).getAttribute('DEF');

			if(hueso.substr(0,5) == 'MA_H_'){
				hueso = hueso.replace(/_/g,' ');
				document.getElementById("nombres").innerHTML = hueso.substr(4);
				material.setAttribute('diffuseColor', '0.144 0.451 0.799');
				material = document.getElementById('M100');

			}else{
				hueso = hueso.replace(/_/g,' ');
				document.getElementById("nombres").innerHTML = hueso.substr(3); 
				material.setAttribute('diffuseColor', '0.144 0.451 0.799');
				document.getElementById('M'+idd).setAttribute('diffuseColor', '1 0 0');
				material = document.getElementById('M'+idd);     
			} 

			/*document.getElementById('p'+idd).className='active_setting';
			document.getElementById('p'+shape_id).className='setting';
			shape_id = idd; */
		}

		function click_lista(id){
			handleSingleClick_partes(document.getElementById(id));
			var hueso = document.getElementById('M'+id).getAttribute('DEF');
			hueso = hueso.replace(/_/g,' ');
			//document.getElementById('tran_modelo_partes').runtime.resetView();
			document.getElementById(parte+hueso.substr(3)).setAttribute('set_bind','true');  
			console.log(parte, hueso);
		}

		function modelo_partes(){  
			
			var i = 0;
			var y = 100;
			var uxx=$( "#tran_modelo_partes" ).children().children().children().children().children();
			console.log(uxx);
			uxx.each(function() {
				uxx.eq(i).attr("onclick", "handleSingleClick_partes(this)");

				uxx.eq(i).attr("id", y);
				uxx.eq(i).find("Appearance").children().attr("id", "M"+y) ;
				var parte = document.getElementById('M'+y).getAttribute('DEF');
				if(parte.substr(0,5) == 'MA_H_'){
					parte = parte.replace(/_/g,' ');      
				}else{
					parte = parte.replace(/_/g,' ');
					elemento1 = document.createElement('div');
					elemento1.id = 'p'+y;
					elemento1.appendChild(document.createTextNode(parte.substr(2)));
					elemento2 = document.getElementById('listado_partes');
					elemento2.appendChild(elemento1);
					elemento1.className='setting';
					elemento1.setAttribute("onclick", "click_lista("+y+")");
				}
				y = y + 1;
				i = i + 1;
			});
			console.log(uxx);
			material = document.getElementById('M100'); 
		}


//create ui

createGui = function()
{
    //create accordion
    $(".section").accordion({
    	collapsible: true,
    	heightStyle: "content",
    	active: 0
    });

    //statistics


    
    // render mode
    $("#renderMode").buttonset();
    $("#renderMode").change(function() {

    }
    );

     // rotacion mode
     $("#ModeRotar").buttonset();
     $("#ModeRotar").change(function() {
     	event.preventDefault();

     }
     );


    //reset view button
    $( "#rvButton" )
    .button()
    .click(function( event ) {
    	event.preventDefault();
    	document.getElementById('modelo').runtime.resetView();
    });

    $( "#rotar_btn" )
    .button()
    .click(function( event ) {

    });



    //create tooltips
    $(function() {
    	$( document ).tooltip();
    });
}


$(document).ready(function()
{
	createGui();    

});