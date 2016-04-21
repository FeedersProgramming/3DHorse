$(document).ready(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	});

	$( "#savepdf" ).click(function() {



		var hhh=$(".modal-title").text();
		var rruta=$("#rutahueso").text();

		var save = document.createElement('a');
		save.href = rruta;
		save.target = '_blank';
		save.download = hhh+'.pdf';
		var clicEvent = new MouseEvent('click', {
			'view': window,
			'bubbles': true,
			'cancelable': true
		});
		save.dispatchEvent(clicEvent);

		(window.URL || window.webkitURL).revokeObjectURL(save.href);



	});

/*	$( "#audio" ).click(function() {

		
		if($('#audioson').is(':hidden')) {
			$('#audioson').show();

			$('#videomp3r')[0].play();

			$('#audio').css({
				'-webkit-transform' : 'scale(0.8,0.8)',
				'-moz-transform'    : 'scale(0.8,0.8)',
				'-ms-transform'     : 'scale(0.8,0.8)',
				'-o-transform'      : 'scale(0.8,0.8)',
				'transform'         : 'scale(0.8,0.8)'
			});

		}else{

			$('#audioson').hide();

			$('#videomp3r')[0].pause();

			$('#audio').css({
				'-webkit-transform' : 'scale(1)',
				'-moz-transform'    : 'scale(1)',
				'-ms-transform'     : 'scale(1)',
				'-o-transform'      : 'scale(1)',
				'transform'         : 'scale(1)'
			});
		}

		

	});*/


	///cargarmodals();
	//$('#audioson').hide();
	//$("#videomp3r").prop("volume", 0.5);

});

/*Modelo arreglo

| nombre hueso | Caracteristicas | imagenes | 

*/

function ver_definicion (nomhueso,grupo) {

	var h="";

	if (grupo=="Esqueleto Axial") {
		h="axial.xml";
	}else{
		h="apendicular.xml";

	}

	if (nomhueso=="Astragalo") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo Accesorio") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo Ulnar") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo Intermedio") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo Radial") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo 4") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo 3") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Carpo 2") {
		nomhueso="Carpo";
	}
	if (nomhueso=="Calcaneo") {
		nomhueso="Tarso";
	}
	if (nomhueso=="Sesamoide Distal") {
		nomhueso="Tarso";
	}
	if (nomhueso=="Base Metatarso") {
		nomhueso="Metatarso";
	}
	if (nomhueso=="Base Metacarpo") {
		nomhueso="Metacarpo";
	}
	if (nomhueso=="caninos") {
		nomhueso="Dientes";
	}
	if (nomhueso=="premolares") {
		nomhueso="Dientes";
	}
	if (nomhueso=="molares") {
		nomhueso="Dientes";
	}
	if (nomhueso=="incisivos") {
		nomhueso="Dientes";
	}

	$.get("plugin/modals/informacion/"+h , function(d){
		
		//alert($(d).find('rata').text());



		$(d).find('hueso').each(function(){
			var $hueso = $(this);
			var nombre = $hueso.attr("nombre");

			if (nombre==nomhueso) {


				$(".modal-title").html(nombre);
				var informacion=$hueso.find('info');

				
				$("#rutahueso").html($hueso.attr("ruta"));

				$("#informacion").html(' <img src="'+$hueso.attr("imageurl")+'" alt="" height="200" width="250" /> ' );
				$("#informacion").append('<br><br>'+informacion.text() );

				/*inf images*/
				var infoimg=$hueso.find('infoimg');
				var iim=1;
				var acord='<div class="panelingimg panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
				

				$(infoimg).find('imgs').each(function(){
					acord+='<div class="panel panel-default">'
					+'<div class="panel-heading" role="tab" id="h'+iim+'">'
					+'<h4 class="panel-title">'
					+'<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#c'+iim+'" aria-expanded="false" aria-controls="c'+iim+'">'
					+'<b>FIGURA '+iim+'</b>'
					+'</a>'
					+'</h4>'
					+'</div>'
					+'<div id="c'+iim+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h'+iim+'">'
					+'<div class="panel-body">'
					+'<img src="'+$(this).text()+'"  height="300" width="300" />'
					+'</div>'
					+'</div>'
					+'</div>';
					


					iim++;

					//alert($(this).text());


				}); 
				acord+='</div>';

				$("#informacion").append(acord);


				/*caracteristicas*/
				var carateristicas=$hueso.find('carateristicas');
				$("#caracte").html("");
				var cc;
				$(carateristicas).find('carac').each(function(){

					///alert("carateristicas: "+ $(this).text());
					cc='<a href="#" class="list-group-item "> '
					+'<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> '
					+$(this).text()
					+'</a>';
					$("#caracte").append(cc);

				}); 


				/*Imagenes*/

				var imagenes=$hueso.find('imagenes');
				$("#imagenesindicador").html("");
				$("#imagenesurl").html("");


				var aux=0;
				var auximg="";

				$(imagenes).find('imgs').each(function(){

					if (aux==0) {

						$("#imagenesindicador").append('<li data-target="#carouselimginfo" data-slide-to="0" class="active"></li>');
						auximg='<div class="item active">'
						+'<img src="'+$(this).text()+'" alt="Chania" width="460" height="345">'
						+'</div>';

						$("#imagenesurl").append(auximg);
					}else{
						$("#imagenesindicador").append('<li data-target="#carouselimginfo" data-slide-to="'+aux+'" ></li>');
						auximg='<div class="item">'
						+'<img src="'+$(this).text()+'" alt="Chania" width="460" height="345">'
						+'</div>';

						$("#imagenesurl").append(auximg);
					}

					aux++;
					auximg="";

				}); 

				/*videos*/
				var videos=$hueso.find('videos');
				$("#videos").html("");

				var vv="";
				$(videos).find('vid').each(function(){
					vv='<figure>'
					+'<iframe width="100%" height="400" src="http://www.youtube.com/embed/'+$(this).text()+'" frameborder="0" allowfullscreen></iframe>'
					+'<figcaption><b>'+$(this).attr("caption")+'</b></figcaption>'
					+'</figure>';

					$("#videos").append(vv);

				}); 


				/*referencias*/

				var referencias=$hueso.find('referencias');
				$("#referencias").html("");

				var rr="";
				$(referencias).find('ref').each(function(){
					rr='<li><a target="_blank" href="'+$(this).text()+'">'+$(this).text()+'</a></li>';

					$("#referencias").append(rr);

				}); 


			}/*heuso if*/

			
		}); 
});


	//activar modlas

	$('#myModaldefiniciones').modal('show');

	$('#activo_info').click();

	

}