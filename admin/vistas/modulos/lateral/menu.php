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
    
    <li class="nav-header">TRAMITE DOCUMENTARIO</li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          REGISTRO
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="regConTupa" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>DOC CON TUPA</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="regSinTupa" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>DOC SIN TUPA</p>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          BANDEJA
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="bandejaPendientes" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>PENDIENTES</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="bandejaDerivados" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>DERIVADOS</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="bandejaFinalizados" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>FINALIZADOS</p>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          CONSULTA
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="consultaDocGenerales" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>DOC GENERALES</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="consultaDocConTupa" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>TRAMITES TUPA</p>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a href="mesaVirtual" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          MESA VIRTUAL
        </p>
      </a>
    </li>

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
