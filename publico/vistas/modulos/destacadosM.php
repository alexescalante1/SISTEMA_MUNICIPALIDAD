<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();

$ruta = "sin-categoria";

/*=============================================
PRODUCTOS DESTACADOS
=============================================*/

$titulosModulos = "ARTICULOS DESTACADOS";
$rutaModulos = "mas-destacados";

$base = 0;
$tope = 6;

$ordenar = "prestados";
$item = null;
$valor = null;
$modo = "DESC";

/*
$ordenar = "prestados";
$item = "disponible";
$valor = 1;
$modo = "DESC";
*/

$ventas = ControladorArticulos::ctrMostrarArticulos($ordenar, $item, $valor, $base, $tope, $modo);

$modulos = $ventas;

	echo '

		<div class="container-fluid productos">
	
			<div class="container">
		
				<div class="row">

					<div class="col-xs-12 tituloDestacado text-center">
					
							<h3><small style="font-weight: bold;">'.$titulosModulos.' </small></h3>

					</div>

					<div class="clearfix"></div>

				</div>

				<ul class="grid0">';

				foreach ($ventas as $key => $value) {
					
					//if($value["disponible"] != 0){

					echo '<div class="col-md-2 col-sm-4 col-xs-6">
							
								<li class="sombra marginProducto">
									
									<figure>
										
										<a href="'.$value["ruta"].'" class="pixelProducto" >
											
											<center>
											<img src="'.$servidor.$value["portada"].'" class="img-responsive" width="100%">
											</center>

										</a>

									</figure>

									<h4 style="height:50px;">
							
										<small>
											
											<a href="'.$value["ruta"].'" class="pixelProducto">
												
												'.$value["titulo"].'<br>
												<!--
												<span style="color:rgba(0,0,0,0)">-</span>-->
											
											</a>	

										</small>			

									</h4>
									
								</li>

						</div>';

					//}
				}

				echo '</ul>


				<div class="col-xs-12">
					
					<a href="'.$rutaModulos.' ">
						
						<button class="btn btn-default pull-right botonPlus" style="outline: none;">
							
							<span class="fa fa-plus"></span>

						</button>

					</a>

				</div>


			</div>

		</div>';

?>


<br><br><br>

