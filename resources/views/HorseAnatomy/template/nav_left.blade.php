
<div class="btn-group btn-group-justified" onresize="reajustar()">
  <a class="btn btn-default" style="opacity: 0.5;" href="#completo" data-toggle="tab" data-toggle="tooltip" title="Anatomy" class="" onclick="cambio_div(1)">Anatomy</a>
  <!--<li class="disabled"><a>Disabled</a></li>-->
  <a class="btn btn-default" style="opacity: 0.5;" href="#quiz" data-toggle="tab" onclick="cambio_div(2)">Evaluacion</a>
  <a class="btn btn-default" style="opacity: 0.5;" href="#administrar" data-toggle="tab" onclick="cambio_div(3);">

    @if(Auth::user()->rol == 'administrador')
    Administrar
    @else 
    Perfil
    @endif

  </a>

</div>
<div id="myTabContent" class="tab-content">

  <div class="btn-group btn-group-justified opc_huesos" id="opc_huesoss">
    <a href="#" class="btn btn-default" style="opacity: 0.5;" data-toggle="tab" class="" onclick="cambio_div(4)">Completo</a>
    <a href="#" class="btn btn-default" style="opacity: 0.5;" data-toggle="tab" class="" onclick="cambio_div(5)">Partes</a>
  </div>

  <!-- completo -->
  <div class="anatomy_nav tab-pane fade active in" id="completo" style="border:none;">

    <div class="well well-lg" style="width:100%; display: block;">
      <div style="overflow-y: scroll; overflow-x: hidden; height: 430px;">
        <ul class="nav nav-list"><!-- Inicio Arbol -->

          @foreach ($grupos as $grupo)

          <li> <div class="glyphicon glyphicon-plus" href="#" id="ocultar_{{ $grupo->grupo }}" onclick="ocultar_prueba(1, {{$grupo}})"></div>  <input checked type="checkbox" data-style="btn-group-sm" data-off-label="false" data-on-label="false" data-off-icon-class="gluphicon gluphicon-thumbs-down" data-on-icon-class="gluphicon gluphicon-thumbs-up" id="{{ $grupo->grupo }}" onchange="estado_hueso('1', {{$grupo}})"><label onclick="estado_hueso('11', {{$grupo}})" class="tree-toggler nav-header">&nbsp;{{ str_replace('_', ' ', $grupo->grupo) }}</label><!-- Grupos Arbol -->

            <ul class="nav nav-list tree">

              @foreach ($regiones as $region)

              @if (str_replace(' ', '_', $region->grupo) == $grupo->grupo)

              <li> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <div class="glyphicon glyphicon-plus" href="#" id="ocultar_{{ $region->division }}" onclick="ocultar_prueba(2, {{$region}})"></div> <input checked onchange="estado_hueso('2', {{ $region }})" type="checkbox" data-style="btn-group-sm" data-off-label="false" data-on-label="false" data-off-icon-class="gluphicon gluphicon-thumbs-down" data-on-icon-class="gluphicon gluphicon-thumbs-up" id="{{ $region->division }}"><label onclick="estado_hueso('22', {{ $region }})" class="tree-toggler nav-header">&nbsp; {{ str_replace('_', ' ', $region->division)  }}</label> <!-- Regiones Arbol -->

                <ul class="nav nav-list tree"><!-- Huesos Arbol -->

                  @foreach ($huesos as $hueso)

                  @if ($hueso->division == str_replace('_', ' ', $region->division))

                  <li> &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input checked onchange="estado_hueso('3', {{ $hueso }})" type="checkbox" data-style="btn-group-sm" data-off-label="false" data-on-label="false" data-off-icon-class="gluphicon gluphicon-thumbs-down" data-on-icon-class="gluphicon gluphicon-thumbs-up" id="hueso_{{ $hueso->id }}">&nbsp; <label onclick="estado_hueso('33', {{ $hueso }})" class="tree-toggler nav-header">&nbsp; {{ $hueso->nombre }}</label> <!-- Regiones Arbol --></li>

                  @endif

                  @endforeach

                </ul>

              </li>

              @endif

              @endforeach

            </ul>

          </li><!-- Titulo Principal Arbol Fin -->

          @endforeach

        </ul><!-- Fin Arbol -->
      </div>
    </div>

  </div>
  

  <div class="tab-pane fade active in" id="administrar" style="border:none;">
    <div class="well" style="overflow-y: scroll; overflow-x: hidden; height: 95%; width:100%; display: block;"> 

      <h3 class="text-center"> {{ Auth::user()->rol }}</h3>

      <ul class="nav nav-pills" style="color: black;">
        @if(Auth::user()->rol == 'administrador')

        <p><li class="lii"><a href="#"  onclick="cambio_div(9)">Administradores <span class="badge">{{ $contadores['administradores'] }}</span></a></li></p><br><br>

        <p><li class="lii"><a href="#"  onclick="cambio_div(7)">Profesores <span class="badge">{{ $contadores['profesores'] }}</span></a></li></p><br><br>

        <p><li class="lii"><a href="#"  onclick="cambio_div(6)">Estudiantes <span class="badge">{{ $contadores['estudiantes'] }}</span></a></li></p><br><br>

        <p><li class="lii"><a href="#"  onclick="cambio_div(8)">Grupos <span class="badge">{{ $contadores['grupos'] }}</span></a></li></p>

        @elseif(Auth::user()->rol == 'profesor')

        <p><li class="lii"><a href="#"  onclick="cambio_div(6)">Estudiantes <span class="badge">{{ $contadores['estudiantes'] }}</span></a></li></p><br><br>

        <p><li class="lii"><a href="#"  onclick="cambio_div(8)">Grupos <span class="badge">{{ $contadores['grupos'] }}</span></a></li></p>
        
        @endif



      </ul>

      <hr>
      <div class="media">
        <div class="media-left media-middle">
          <a href="#">
            <img class="media-object" width="90px" src="{{ asset('plugin/imagenes/' . Auth::user()->imagen) }}" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h5 class="media-heading">Informacion Personal</h5>
          <a href="#" onclick="cambio_div(10)">
            <p class="text-primary">{{ Auth::user()->nombre . ' ' . Auth::user()->apellido }}</p>
          </a>
          <p class="text-primary">{{ Auth::user()->email }}</p>
          <p class="text-primary">{{ Auth::user()->telefono }}</p>

          <a href="#" title="Analisis Grafico" onclick="cambio_div(11);"><h3 class="glyphicon glyphicon-stats"></h3></a>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="quiz" style="border:none;">
    <div class="well well-lg" style="width:100%; display: block;">
      <div style="overflow-y: scroll; overflow-x: hidden; height: 470px;">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  Modulo 1</a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">

                  <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" id="modulo1" class="modulo1" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 1, ¿Desea Continuar?'); if(val == true){carga_quiz('1', 15)}" onmouseover="mostrar_info_quiz('1')" onmouseout="mostrar_info_quiz('')" ><a href="#">Teorico</a></li>
                    <li role="presentation" id="modulo1" class="modulo1" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 1, ¿Desea Continuar?'); if(val == true){carga_quiz('11', 15)}" onmouseover="mostrar_info_quiz('11')" onmouseout="mostrar_info_quiz('')" ><a href="#">Practico</a></li>
                  </ul>

                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                    Modulo 2</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                      <li role="presentation" id="modulo2" class="modulo2" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 2, ¿Desea Continuar?'); if(val == true){carga_quiz('2', 10)}" onmouseover="mostrar_info_quiz('2')" onmouseout="mostrar_info_quiz('')"><a href="#">Teorico</a></li>
                      <li role="presentation" id="modulo1" class="modulo1" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 1, ¿Desea Continuar?'); if(val == true){carga_quiz('22', 10)}" onmouseover="mostrar_info_quiz('22')" onmouseout="mostrar_info_quiz('')" ><a href="#">Practico</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      Modulo 3</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" id="modulo3" class="modulo3" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 3, ¿Desea Continuar?'); if(val == true){carga_quiz('3', 25)}" onmouseover="mostrar_info_quiz('3')" onmouseout="mostrar_info_quiz('')"><a href="#">Teorico</a></li>
                        <li role="presentation" id="modulo1" class="modulo1" onclick="val = confirm('Esta Por Iniciar El Quiz Del Modulo 1, ¿Desea Continuar?'); if(val == true){carga_quiz('33', 25)}" onmouseover="mostrar_info_quiz('33')" onmouseout="mostrar_info_quiz('')" ><a href="#">Practico</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="info_quiz">
                <p class="navbar-text" id="info_quiz">
                  hola
                </p>
              </div>
            </div>  
          </div>  
        </div>
      </div>


      <!-- Partes -->
      <div class="anatomy_nav tab-pane fade active in" id="partes" style="padding: 0%; border:none;">
        <div class="well well-lg" style="width:100%; padding: 8px 10px; ">
          <div style="overflow-y: scroll; overflow-x: hidden; height: 400px;">


            <div class="panel-group" id="accordion2">


              @foreach ($grupos as $grupo)
              @foreach ($regiones as $region)
              @if (str_replace(' ', '_', $region->grupo) == $grupo->grupo)

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#mostrar_{{$region->division}}" onclick="cambio_partes(1, '{{ $region->division }}')">
                      {{ str_replace('_', ' ', $region->division) }}</a>
                    </h4>
                  </div>
                  <div id="mostrar_{{$region->division}}" class="panel-collapse collapse">
                    <div class="panel-body">

                      <ul class="nav nav-pills nav-stacked">
                        @foreach ($huesos as $hueso)

                        @if ($hueso->division == str_replace('_', ' ', $region->division))

                        <li role="presentation" id="modulo1"><a href="#" onclick="cambio_partes(2, '{{ $hueso->nombre }}')">{{ $hueso->nombre }}</a></li>

                        @endif

                        @endforeach

                      </ul>

                    </div>
                  </div>
                </div>

                @endif
                @endforeach
                @endforeach

              </div>
            </div>
          </div>
        </div>