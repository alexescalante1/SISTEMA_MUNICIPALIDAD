
<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
	<div class="container" data-aos="fade-up">
	<header class="section-header">
		<h2>Blog</h2>
		<p>Recent posts form our Blog</p>
	</header>
	<div class="row">

		<?php
		
			/*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/

			if(isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1])){

				$base = ($rutas[1] - 1)*8;
				$tope = 8;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 8;
				
			}

			$Objetos = ControladorGeneral::ctrMostrar("publicar", "vistas", null, null, $base, $tope, "DESC");
			$listaObjetos = ControladorGeneral::ctrListar("publicar", null, null);

			if(!$Objetos){

				echo '
				<div class="col-xs-12 error404 text-center">
					<h1><small>¡Oops!</small></h1>
					<h2>Aún no hay Objetos en esta sección</h2>
				</div>
				';

			}else{

				foreach ($Objetos as $key => $value) {
					
					echo '
					<div class="col-lg-4" >
					<div class="post-box">
						<div class="post-img"><img src="'.$servidor.$value["portada"].'" class="img-fluid" alt=""></div>
						<span class="post-date">Tue, September 15</span>
						<h3 class="post-title">'.$value["titulo"].'</h3>
						<a href="'.$url.$value["ruta"].'" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
					</div>
					</div>
					';

				}

			}
		
		?>

	</div>
	</div>
</section><!-- End Recent Blog Posts Section -->



<section id="blog" class="blog">
<div class="entries">
<div class="blog-pagination">
	<ul class="justify-content-center">
	
	<!--=====================================
	PAGINACIÓN
	======================================-->
	
	<?php

		if($listaObjetos != 0){

			$pagObjetos = ceil($listaObjetos/8);

			if($pagObjetos > 4){

				/*=============================================
				LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
				=============================================*/

				if($rutas[1] == 1){
					
					for($i = 1; $i <= 4; $i ++){
						echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
					}

					echo '
					<li class="disabled"><a>...</a></li>
					<li id="item'.$pagObjetos.'"><a href="'.$url.$rutas[0].'/'.$pagObjetos.'">'.$pagObjetos.'</a></li>
					<li><a href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					';

				}

				/*=============================================
				LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
				=============================================*/

				else if($rutas[1] != $pagObjetos && 
						$rutas[1] != 1 &&
						$rutas[1] <  ($pagObjetos/2) &&
						$rutas[1] < ($pagObjetos-3)
						){

						$numPagActual = $rutas[1];

						echo '<li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
					
						for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
							echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
						}

						echo '
						<li class="disabled"><a>...</a></li>
						<li id="item'.$pagObjetos.'"><a href="'.$url.$rutas[0].'/'.$pagObjetos.'">'.$pagObjetos.'</a></li>
						<li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
						';

				}

				/*=============================================
				LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
				=============================================*/

				else if($rutas[1] != $pagObjetos && 
						$rutas[1] != 1 &&
						$rutas[1] >=  ($pagObjetos/2) &&
						$rutas[1] < ($pagObjetos-3)
						){

						$numPagActual = $rutas[1];
					
						echo '
						<li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
						<li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
						<li class="disabled"><a>...</a></li>
						';
					
						for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
							echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
						}

						echo '<li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
				}

				/*=============================================
				LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
				=============================================*/

				else{

					$numPagActual = $rutas[1];

					echo '
					<li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
					<li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
					<li class="disabled"><a>...</a></li>
					';
					
					for($i = ($pagObjetos-3); $i <= $pagObjetos; $i ++){
						echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
					}

				}

			}else{

				for($i = 1; $i <= $pagObjetos; $i ++){
					echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
				}

			}

		}

	?>

	</ul>
</div>
</div>
</section>