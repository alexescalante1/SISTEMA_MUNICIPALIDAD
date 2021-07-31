    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Nuevos</h2>
          <p>VIDEOS</p>
        </header>
        
        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="10000">
          <div class="swiper-wrapper">


            <?php 
              $Objetos = ControladorGeneral::ctrMostrar("pvideos", "fecha", null, null, 0, 3, "DESC");

              if($Objetos){

                foreach ($Objetos as $key => $value) {
                  
                  echo '
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                      <div class="profile mt-auto">
                      <div class="PVideo">
                      '.$value["enlace"].'
                      </div>
                        <h3>'.$value["titulo"].'</h3>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->
                  ';

                }

              }
            ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->
