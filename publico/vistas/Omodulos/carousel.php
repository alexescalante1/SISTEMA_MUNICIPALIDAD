<?php

  $Objetos = ControladorGeneral::ctrMostrar("carrusel", "prioridad", null, null, 0, 10, "DESC");

?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
  <div class="carousel-indicators">

    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <?php
      for($i = 1; $i < count($Objetos); ++$i) {
        echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$i.'" aria-label="Slide 2"></button>';
      }
    ?>
    
  </div>
  <div class="carousel-inner">
    
    <?php

      echo '
      <div class="carousel-item active">
        <img src="'.$servidor.$Objetos[0]["portada"].'" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>'.$Objetos[0]["titulo"].'</h5>
        </div>
      </div>
      ';
      
      for($i = 1; $i < count($Objetos); ++$i) {

        echo '
        <div class="carousel-item">
          <img src="'.$servidor.$Objetos[$i]["portada"].'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>'.$Objetos[$i]["titulo"].'</h5>
          </div>
        </div>
        ';
        
      }
    ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>