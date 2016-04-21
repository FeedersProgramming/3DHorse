<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> @yield('titulo', 'Default') | HorseAnatomy </title>
	
	@include('HorseAnatomy.template.head')
	<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

	<!-- LESS -->
	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/variables.less') }}" class="cssdeck">
	<link rel="stylesheet/less" href="{{ asset('plugin/bootstrap/css/sandstone/bootswatch.less') }}" class="cssdeck">
	<script type="text/javascript" src="{{ asset('plugin/js/less/less.js') }}"></script>

	@yield('jss')

</head>

<body onload="">

	@include('HorseAnatomy.template.nav') 

	<div class="div_nav_left" id="div_nav_left" name="div_nav_left" onmousemove="reajustar()" onmouseover="reajustar()" onmouseout="reajustar()">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
			<li><a href="#profile" data-toggle="tab">Profile</a></li>
			<li class="disabled"><a>Disabled</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="home">
				<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
			</div>
			<div class="tab-pane fade" id="profile">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
			</div>
		</div>
	</div>

	<div class="div_contenido" id="div_contenido" name="div_contenido" onmousemove="reajustar()" onmouseover="reajustar()" onmouseout="reajustar()">
		<div class="bs-example" data-example-id="media-list"> 
			<ul class="media-list"> 
				<li class="media"> 
					<div class="media-left"> 
						<a href="#"> 
							<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
						</a> 
					</div> 
					<div class="media-body"> 
						<h4 class="media-heading">Media heading</h4> 
						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>  
						<div class="media"> 
							<div class="media-left"> 
								<a href="#"> 
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
								</a> 
							</div> 
							<div class="media-body">
								<h4 class="media-heading">Nested media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.  
								<div class="media"> 
									<div class="media-left"> 
										<a href="#"> 
											<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
										</a> 
									</div> 
									<div class="media-body"> 
										<h4 class="media-heading">Nested media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. 
										<div class="media"> 
											<div class="media-left"> 
												<a href="#"> 
													<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
												</a> 
											</div> 
											<div class="media-body"> 
												<h4 class="media-heading">Nested media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. 
											</div> 
										</div> 
									</div> 
								</div> 
							</div> 
						</div>  
						<div class="media"> 
							<div class="media-left"> 
								<a href="#"> 
									<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
								</a> 
							</div> 
							<div class="media-body">
								<h4 class="media-heading">Nested media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. 
							</div> 
						</div>
					</div> 
				</li> 
			</ul>
		</div>
	</div>
	
	@include('HorseAnatomy.template.footer') 

</body>

@yield('js')

</html>	
