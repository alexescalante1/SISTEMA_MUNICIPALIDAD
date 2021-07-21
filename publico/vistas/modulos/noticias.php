<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();

?>

<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

    <header class="section-header">
        <h2>Blog</h2>
        <p>Noticias</p>
    </header>

    <div class="row">
        


        <?php
        
            $ventas = ControladorArticulos::ctrMostrarArticulos("vistas", null, null, 0, 6, "DESC");
            
            foreach ($ventas as $key => $value) {
					
                echo '
                <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="'.$servidor.$value["portada"].'" class="img-fluid" alt=""></div>
                    <span class="post-date">'.$value["fecha"].'</span>
                    <h3 class="post-title">'.$value["titulo"].'</h3>
                    <a href="'.$value["ruta"].'" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
                </div>
                ';
            }
        ?>
                
        <div class="col-lg-4">
        <div class="post-box">
            <div class="post-img"><img src="<?php echo $url; ?>vistas/assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Tue, September 15</span>
            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
            <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>
        </div>


    </div>

    </div>

</section><!-- End Recent Blog Posts Section -->