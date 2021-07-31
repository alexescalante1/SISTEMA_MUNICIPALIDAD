<!--=====================================
MENU
======================================-->	

      
<br>
<!-- SidebarSearch Form -->
<div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
     
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    


    <li class="nav-header">GESTOR DE VISTAS</li>

    <?php

      if($_SESSION["perfil"] == "administrador"){

        echo '
          <li class="nav-item">
            <a href="carrusel" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Carrusel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="publicacion" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Publicaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pvideos" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Videos
              </p>
            </a>
          </li>
        ';
      }

    ?>
    <li class="nav-item">
      <a href="gerencias" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Gerencias
        </p>
      </a>
    </li>
    <li class="nav-header">GENERADOR DE REPORTE</li>
    <li class="nav-item">
      <a href="reporte" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Por Dias
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="reportefecha" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Por Fecha y Hora
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="reporteoficina" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Por Gerencias
        </p>
      </a>
    </li>
    <li class="nav-header">GESTOR DE CUENTAS</li>
    <?php

      if($_SESSION["perfil"] == "administrador"){

        echo '
          <li class="nav-item">
            <a href="perfiles" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestor de Perfiles
              </p>
            </a>
          </li>
        ';

      }

    ?>
    
    
  </ul>
</nav>
<!-- /.sidebar-menu -->
