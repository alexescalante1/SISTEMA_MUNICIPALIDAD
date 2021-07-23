<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
	<div class="container" data-aos="fade-up">
	<header class="section-header">
		<h2>ACTUALIDAD</h2>
		<p>NOTICIAS</p>
	</header>
	<div class="row">

		<?php

		$Objetos = ControladorGeneral::ctrMostrar("detallearticulo", "prestados", null, null, 0, 4, "DESC");
		$listaObjetos = ControladorGeneral::ctrListar("detallearticulo", null, null);

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
				<div class="col-lg-3">
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
    
	<header class="section-header">
		<p>PROXIMAS ACTIVIDADES</p>
	</header>
	<div class="row">

		<?php

		$Objetos = ControladorGeneral::ctrMostrar("detallearticulo", "prestados", null, null, 4, 4, "DESC");
		$listaObjetos = ControladorGeneral::ctrListar("detallearticulo", null, null);

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
				<div class="col-lg-3">
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


	<header class="section-header">
		<p>OBRAS REALIZADAS</p>
	</header>
	<div class="row">

		<?php

		$Objetos = ControladorGeneral::ctrMostrar("detallearticulo", "prestados", null, null, 8, 4, "DESC");
		$listaObjetos = ControladorGeneral::ctrListar("detallearticulo", null, null);

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
				<div class="col-lg-3">
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

	<footer class="section-header">
        
        <a href="mas-noticias">
            <h4>VER MAS</h4>
        </a>

	</footer>

	</div>
</section><!-- End Recent Blog Posts Section -->

