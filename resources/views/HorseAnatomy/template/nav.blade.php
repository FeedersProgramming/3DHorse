    <nav class="navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">   3DHorse</a>
        </div>

        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a id="icon_nav" href="#" class="glyphicon glyphicon-tint dropdown-toggle icon_nav" title="Temas" data-toggle="dropdown"  role="button" aria-expanded="false"><span>&nbsp;Temas</span></a>
              <ul class="dropdown-menu" role="menu">

                <li><a href="#" onclick="changeCss('css_cambio','sandstone');return false;">Sandstone</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','cerulean');return false;">Cerulean</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','slate');return false;">Slate</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','cosmo');return false;">Cosmo</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','darkly');return false;">Darkly</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','lumen');return false;">Lumen</a></li>
                <li><a href="#" onclick="changeCss('css_cambio','united');return false;">United</a></li>
                <li class="divider"></li>
              </ul>
            </li>

            <li><a id="icon_nav" class="glyphicon glyphicon-search icon_nav" title="Busqueda" href="#"><span>&nbsp;Busqueda</span></a></li>
            <li><a id="icon_nav" class="glyphicon glyphicon-question-sign icon_nav" title="Ayuda" href="#"><span>&nbsp;Ayuda</span></a></li>

            @if(Auth::user())

            <li class="dropdown">
              <a id="icon_nav" href="#" class="icon_nav glyphicon glyphicon-user dropdown-toggle" title="Perfil" data-toggle="dropdown"  role="button" aria-expanded="false"><span>&nbsp;Perfil</span></a>
              <ul class="dropdown-menu" role="menu">

                <li><a href="#" class="cedula" id="{{ Auth::user()->id }}">{{ Auth::user()->nombre }}</a></li>
                <li><a href="#">Opciones</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}">Salir</a></li>
                <li class="divider"></li>
              </ul>
            </li>

            @endif

          </ul>
        </div>
      </div>
    </nav>

