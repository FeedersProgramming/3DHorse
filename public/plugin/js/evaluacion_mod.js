var matriz;
var total_preguntas=15;
var num_pregunta=0;
var respuestas=new Array(total_preguntas);




var shape_selecionado=null;

var matriz_opciones;

var material;

function getshape_selecionado () {

	return this.shape_selecionado;
}
function setshape_selecionado (id) {
	this.shape_selecionado=id;
	console.log('chape selecionado es '+this.shape_selecionado);
	//console.log(document.getElementById('M'+id).getAttribute('DEF') + ' - ' + id);
}

function cargar_evaluacion (tt, n_preguntas) {
	

	var modulo = "osteologia";
	var tema ;
	var arreglo;

	var numpp=0;
	var ciclo=true;
	var noigual=false;

	total_preguntas = n_preguntas;

	matriz=new Array(total_preguntas+1);
	for (i = 0; i < total_preguntas; i++){
		matriz[i]=new Array(total_preguntas);
	}

	matriz_opciones=new Array(11);
	for (i = 0; i < total_preguntas; i++){
		matriz_opciones[i]=new Array(15);
	}

	if (tt==1) {
		tema= "Esqueleto Axial";
	}else if (tt==2){
		tema= "Esqueleto Apendicular";
	}else{
		tema= "3";
	}


	while(ciclo!=false){


		arreglo = ajax_quiz(modulo, tema, 5, division);

		if (i > 0 && i < 6) {
			division = "Cabeza";
		}else if (i > 5 && i < 11) {
			division = "Columna Vertebral";
		}else if (i > 10 && i < 16) {
			division = "Esqueleto Del Torax";
		}else if (i > 15 && i < 21) {
			division = "Miembro Anterior";
		}else if (i > 20 && i < 26) {
			division = "Miembro Posterior";
		}
		

		for (var i = 0; i < 15; i++) {

			if ( matriz[i][0] == arreglo[0]['nombre'] ) {
				noigual=true;
			}

		}

		if (noigual==false) {

			matriz[numpp]=[ arreglo[0]['idshape'], arreglo[0]['nombre'], arreglo[0]['grupo'],  arreglo[0]['descripcion2'] ]  ;

			matriz_opciones[numpp]= [ arreglo[1]['nombre'] ,arreglo[2]['nombre'],arreglo[3]['nombre'],arreglo[4]['nombre'] ];
			
			numpp++;

			if (tema=="Esqueleto Axial" && tt==3) {
				tema= "Esqueleto Apendicular";

			}else if(tt==3){
				tema= "Esqueleto Axial";

			}
			console.log('guarda');

		}else{
			noigual=false;
		}

		if (numpp==15) {
			ciclo=false;
		}

	}


	console.table(matriz);
	console.table(matriz_opciones);

}

function pregunta () {
	
	

	if (num_pregunta<4) {

		var mostrar=document.getElementById('pe_body');
		

		if ( $("#tabla_evaluacion_all")[0] ) {
			$("#tabla_evaluacion_all").remove();
		}

		var htmll="";

		

		

		htmll='<table id="tabla_evaluacion_all"><tr><th>Seleccione El hueso Selecionado Del Modelo</th></tr><tbody >'
		+' <tr >'
		+'<td width="20px"><a href="#" class="btn btn-primary btn-evapee btn-sm" id="btn-evas1" onclick="eva_boton_select(this,1000)"> </a></td>'
		
		+'</tr>'
		+' <tr>'
		+'<td width="20px"><a href="#" class="btn btn-primary btn-evapee btn-sm" id="btn-evas2" onclick="eva_boton_select(this,1000)"> </a></td>'
		
		+'</tr>'
		+' <tr>'
		+'<td width="20px"><a href="#" class="btn btn-primary btn-evapee btn-sm" id="btn-evas3" onclick="eva_boton_select(this,1000)"></a></td>'
		
		+'</tr>'
		+' <tr>'
		+'<td width="20px"><a href="#" class="btn btn-primary btn-evapee btn-sm" id="btn-evas4" onclick="eva_boton_select(this,1000)"></a></td>'
		
		+'</tr>'
		+' <tr>'
		+'<td width="20px"><a href="#" class="btn btn-primary btn-evapee btn-sm" id="btn-evas5" onclick="eva_boton_select(this,1000)"> </a></td>'
		
		+'</tr>'
		+'</tbody></table>'	;


		mostrar.innerHTML =  htmll;

		aux=Math.floor(Math.random() * (6 - 1)) + 1;
		document.getElementById('btn-evas'+aux).innerHTML = matriz[num_pregunta][1] ;

		$('#btn-evas'+aux).attr("onclick","eva_boton_select(this,"+matriz[num_pregunta][0]+")");

		var yyy=0;
		for (var i = 1; i < 6; i++) {
			if (i!=aux) {
				document.getElementById('btn-evas'+i).innerHTML = matriz_opciones[num_pregunta][yyy] ;
				yyy++;

			}
		}

		material.setAttribute('diffuseColor', '1.000 0.956 0.871');
		material.setAttribute('specularColor', '0.161 0.161 0.16');
		material.setAttribute('emissiveColor', '0.000 0.000 0.000');
		material.setAttribute('ambientIntensity', '0.333');
		material.setAttribute('shininess', '0.098');


		document.getElementById('M'+matriz[num_pregunta][0]).setAttribute('diffuseColor', '1 0 0');
		
		material = document.getElementById('M'+matriz[num_pregunta][0]);

	}else{

		$("#pe_title").html("pregunta -No."+(num_pregunta+1)+"-");
		$("#pe_body").html("Seleciones el Hueso Llamado ! "+matriz[num_pregunta][1]+" !");
	}





}

var btn_eva_aux=null;
function eva_boton_select (boton,valor) {

	if (btn_eva_aux!=null) {
		$(btn_eva_aux).removeClass( "btn-success" ).addClass( "btn-primary" );

	}

	$(boton).removeClass( "btn-primary" ).addClass( "btn-success" );

	btn_eva_aux=boton;


	setshape_selecionado(valor);
	
}

//////////////mause action
function validar () {
	
	if (shape_selecionado!=null) {
		if (matriz[num_pregunta][0]==shape_selecionado ){
			console.log('correto');
			matriz[num_pregunta][4]=1;

		}else{
			console.log('incorreto');
			matriz[num_pregunta][4]=0;
		}

		num_pregunta++;

		if (num_pregunta>=total_preguntas) {
			guardar_resultados();

			console.log('ha terminadocon exito');
			console.table(matriz);

		}else{
			limpiar_modelo();
			pregunta();
		}

	}else{
		console.log("shape vacio");
		msmpe();


	}
}

//guardar resuldatos
function guardar_resultados () {
	var resultado=0;
	for (var i = 0; i < 10; i++) {
		resultado+=matriz[i][4];
	};

	//console.log('res '+resultado);

	ajax_almacenar(resultado);
	/*var parametros = {
		"tipo" : "guardar",
		"resultado" : resultado
	};


	$.ajax({
		data:  parametros,
		type: "POST",
		url: "phpsimulacion/evaluacon.php",
		success: function(data){

			alert(data);

		}
	});*/


}

function limpiar_modelo() {
	// body...
	/*if (material !=null) {
		material.setAttribute('diffuseColor', '1 1 1');
	}*/
	var aux_material;
	for (var i = 0; i < 60; i++) {

		aux_material=document.getElementById("M"+i);

		
		if (aux_material!=null) {
			aux_material.setAttribute('diffuseColor', '1.000 0.956 0.871');
			aux_material.setAttribute('specularColor', '0.161 0.161 0.16');
			aux_material.setAttribute('emissiveColor', '0.000 0.000 0.000');
			aux_material.setAttribute('ambientIntensity', '0.333');
			aux_material.setAttribute('shininess', '0.098');
		}
		
	}
	
	shape_selecionado=null;
}




function inicio_evaluacion () {
	
	pregunta();
}



function nextp(){
	
	///$("x3d").attr("background", "white");
	validar();

			//var i =0;
			///var uxx=$( "#modelo" ).children().children().children().children().children();
			
		//	uxx.eq(0).find("Appearance").attr("id", "rata") ;
		//	uxx.eq(0).find("material").attr("id", "rata") ;

		//uxx.eq(0).find("Appearance").children().find("material").attr("id", "rata") ;

		//var ee=$("#0").find("Appearance").attr("id", "rata") ;
		//var ee=$("#0").find("Appearance").children().attr("id", "rata") ;

	}

	function msmpe () {
	// body...
	$("#pe_botones").append('<div class="alert alert-dismissible alert-warning" style="margin-top: 4px;"><button type="button" class="glyphicon glyphicon-remove close" data-dismiss="alert"></button>	<h4>Cuidado!</h4>	<p>Selecione La respueta antes de continuar</p>	</div>');
}