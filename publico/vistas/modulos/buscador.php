<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid barraProductos">

	<div class="container">
		
		<div class="row">

			<ul class="text-uppercase rutaraiz" >
				
				<li style="float: left;"><a href="<?php echo $url;  ?>">INICIO </a></li>
				<li style="float: left;" class="active pagActiva"> / <?php echo $rutas[3] ?></li>

			</ul>

			<div class="col-sm-6 col-xs-6">
				
				<div class="btn-group">
					
					 <button type="button" class="btn btn-default dropdown-toggle botonPlusNormal" data-toggle="dropdown">

					  Ordenar Productos <span class="caret"></span></button>

					  <ul class="dropdown-menu botonPlusList" role="menu">

					  <?php
					  	
						echo '<li><a href="'.$url.$rutas[0].'/1/recientes/'.$rutas[3].'">Más reciente</a></li>
							  <li><a href="'.$url.$rutas[0].'/1/antiguos/'.$rutas[3].'">Más antiguo</a></li>';

						?>

					  </ul>

				</div>

			</div>
			
			<div class="col-sm-6 col-xs-6 organizarProductos">

				<div class="btn-group pull-right">

					 <button type="button" class="btn btn-default btnGrid botonPlusNormal" id="btnGrid0">
					 	
						<i class="fa fa-th" aria-hidden="true"></i>  

						<span class="col-xs-0 pull-right"> GRID</span>

					 </button>

					 <button type="button" class="btn btn-default btnList botonPlusNormal" id="btnList0">
					 	
						<i class="fa fa-list" aria-hidden="true"></i> 

						<span class="col-xs-0 pull-right"> LIST</span>

					 </button>
					
				</div>		

			</div>

		</div>

	</div>

</div>



<br>



<!--=====================================
LISTAR PRODUCTOS
======================================-->

<div class="container-fluid productos">

	<div class="container">
		
		<div class="row">

			

			<?php

			/*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/

			if(isset($rutas[1])){

				if(isset($rutas[2])){

					if($rutas[2] == "antiguos"){

						$modo = "ASC";
						$_SESSION["ordenar"] = "ASC";

					}else{

						$modo = "DESC";
						$_SESSION["ordenar"] = "DESC";

					}

				}else{

					$modo = $_SESSION["ordenar"];

				}

				$base = ($rutas[1] - 1)*12;
				$tope = 12;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 12;
				$modo = "DESC";
				$_SESSION["ordenar"] = "DESC";

			}

			/*=============================================
			LLAMADO DE PRODUCTOS POR BÚSQUEDA
			=============================================*/

			$productos = null;
			$listaProductos = null;

			$ordenar = "titulo";

			if(isset($rutas[3])){

				$busqueda = $rutas[3];

				$productos = ControladorArticulos::ctrBuscarArticulos($busqueda, $ordenar, $modo, $base, $tope);
				$listaProductos = ControladorArticulos::ctrListarArticulosBusqueda($busqueda);

			}

			// var_dump($productos);

			if(!$productos){

				$estado = 0;

				echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

					</div>';

			}else{

				echo '<ul class="grid0">';

					foreach ($productos as $key => $value) {

					//if($value["disponible"] != 0){

					$estado = 1;
					
					echo '<div class="col-md-2 col-sm-2 col-xs-12">
						
						<li class="sombra marginProducto">

							<figure>
								
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive">

								</a>

							</figure>

							<h4 style="height:50px;">
					
								<small >
									
									<a href="'.$url.$value["ruta"].'" class="pixelProducto" >
										
										'.$value["titulo"].'

										<span style="color:rgba(0,0,0,0)">-</span>';

									echo '</a>	

								</small>			

							</h4>
						</li>
					</div>';

					//}else{

					//	$estado = 0;
						
					//}
				}

				if($estado == 0){

					echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

						</div>';
				}

				echo '</ul>



























				<ul class="list0" style="display:none">';
				



				foreach ($productos as $key => $value) {

					//if($value["disponible"] != 0){

						echo '<li class="col-xs-12">
					  
				  		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							   
							<figure>
						
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive">

								</a>

							</figure>

					  	</div>  	
							  
						<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
							
							<h1>

								<small>
		
									<a href="'.$url.$value["ruta"].'" class="pixelProducto textoInfoArt text-uppercase">
										
										'.$value["titulo"].'<br>';

									echo '</a>

								</small>

							</h1>
							<p style="text-align: justify;">
								'.$value["descripcion"].'
							</p>
							<h2>
								<small>USD $'.$value["precio"].'</small>
							</h2>

						</div>

						<div class="col-xs-12"><hr></div>

					</li>';

					//}

				}


				if($estado == 0){

					echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

						</div>';
				}


				echo '</ul>';
			}

			?>

			<div class="clearfix"></div>

			<center>





























			<!--=====================================
			PAGINACIÓN
			======================================-->
			
			<?php

			if($estado != 0){

				if(count($listaProductos) != 0){

					$pagProductos = ceil(count($listaProductos)/12);

					if($pagProductos > 4){

						/*=============================================
						LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
						=============================================*/

						if($rutas[1] == 1){

							echo '<ul class="pagination">';
							
							for($i = 1; $i <= 4; $i ++){

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' <li class="disabled"><a>...</a></li>
								   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
								   <li><a href="'.$url.$rutas[0].'/2/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

							</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] <  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];

								echo '<ul class="pagination">
									  <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

								}

								echo ' <li class="disabled"><a>...</a></li>
									   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
									   <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

								</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] >=  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];
							
								echo '<ul class="pagination">
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

								}


								echo '  <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>';
						}

						/*=============================================
						LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						=============================================*/

						else{

							$numPagActual = $rutas[1];

							echo '<ul class="pagination">
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
							for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' </ul>';

						}

					}else{

						echo '<ul class="pagination">';
						
						for($i = 1; $i <= $pagProductos; $i ++){

							echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

						}

						echo '</ul>';

					}

				}

			}

			?>

			</center>

</div>

</div>

</div>