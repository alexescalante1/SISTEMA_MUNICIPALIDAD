<div class="sidebar">

<h3 class="sidebar-title">Search</h3>
<div class="sidebar-item search-form" id="buscador">

    <input type="search" name="buscar" class=" buscadorInpt nameBusq" placeholder="Ingresar Datos de Busqueda">
    <a href="<?php echo $url; ?>buscador/1/recientes">
      <button type="submit"><i class="bi bi-search"></i></button>
    </a>
  
</div><!-- End sidebar search formn-->

<h3 class="sidebar-title">Categories</h3>
<div class="sidebar-item categories">
  <ul>
    <li><a href="CNoticia">Noticias <span>(<?php echo ControladorGeneral::ctrListar("publicar", "categoria", 1); ?>)</span></a></li>
    <li><a href="CProxAct">Proximas Actividades <span>(<?php echo ControladorGeneral::ctrListar("publicar", "categoria", 2); ?>)</span></a></li>
    <li><a href="CObrasRe">Obras Realizadas <span>(<?php echo ControladorGeneral::ctrListar("publicar", "categoria", 3); ?>)</span></a></li>
  </ul>
</div><!-- End sidebar categories-->

<h3 class="sidebar-title">Best Posts</h3>
<div class="sidebar-item recent-posts">

    
  <?php 

    $Objetos = ControladorGeneral::ctrMostrar("publicar", "vistas", null, null, 0, 5, "ASC");

    foreach ($Objetos as $key => $value) {
      
      echo '
      <div class="post-item clearfix">
        <img src="'.$servidor.$value["portada"].'" alt="">
        <h4><a href="'.$value["ruta"].'">'.$value["titulo"].'</a></h4>
        <time datetime="2020-01-01">'.$value["fecha"].'</time>
      </div>
      ';

    }

  ?>

</div><!-- End sidebar recent posts-->

<h3 class="sidebar-title">Tags</h3>
<div class="sidebar-item tags">
  <ul>
    <li><a href="#">App</a></li>
    <li><a href="#">IT</a></li>
    <li><a href="#">Business</a></li>
    <li><a href="#">Mac</a></li>
    <li><a href="#">Design</a></li>
    <li><a href="#">Office</a></li>
    <li><a href="#">Creative</a></li>
    <li><a href="#">Studio</a></li>
    <li><a href="#">Smart</a></li>
    <li><a href="#">Tips</a></li>
    <li><a href="#">Marketing</a></li>
  </ul>
</div><!-- End sidebar tags-->

</div><!-- End sidebar -->