<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">GESTOR DE GERENCIAS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">GERENCIAS</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">



      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-lg-12">
          


          <!-- TABLE: LATEST ORDERS -->
          <div class="card">

            <div class="card-header border-transparent">
              <h3 class="card-title">CARRUSEL</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">


                  <!-- Main content -->
                <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-12">

                              <div class="card">
                                
                                

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <table id="tablaCarrrusel" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th style="width:40px">IMG</th>
                                      <th>TITULO</th>
                                      <th>ENCARGADO</th>
                                      <th style="width:80px">CONTACTO</th>
                                      <th style="width:20px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            
                                            $publica = ControladorPublicacion::ctrMostrar("gerencias",null, null);
                                            
                                            foreach ($publica as $key => $value) {
                                              
                                              $imagenPrincipal = "<a><img src='".$publica[$key]["portada"]."' class='img-thumbnail imgTablaPrincipal' width='70px'></a>";
                                              
                                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarGerencia' idGerencias='".$publica[$key]["idGerencias"]."' data-toggle='modal' data-target='#modalEditarGerencia'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarGerencia' idGerencias='".$publica[$key]["idGerencias"]."' imgPrincipal='".$publica[$key]["portada"]."'><i class='fa fa-times'></i></button></div>";

                                              echo '
                                              <tr>
                                                <td><h5>'.$key.'</h5></td>
                                                <td>'.$imagenPrincipal.'</td>
                                                <td><h5>'.$publica[$key]["titulo"].'</h5></td>
                                                <td><h5>'.$publica[$key]["encargado"].'</h5></td>
                                                <td><h5>'.$publica[$key]["contacto"].'</h5></td>
                                                <td>'.$acciones.'</td>
                                              </tr>
                                              ';

                                            }

                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>IMG</th>
                                      <th>TITULO</th>
                                      <th>ENCARGADO</th>
                                      <th>CONTACTO</th>
                                      <th>OP</th>
                                    </tr>
                                    </tfoot>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                  </section>
                      <!-- /.content -->





            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarGerencia">AGREGAR NUEVA GERENCIA</a>
              
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->



        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->










<div class="modal fade" id="modalAgregarGerencia">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR NUEVA GERENCIA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloGerencia" placeholder="TITULO GERENCIA">
              <input type="hidden" class="form-control rutaGerencia" readonly>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control nombreGerencia" placeholder="NOMBRES Y APELLIDOS">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone" style="width:20px"></i></span>
              </div>
              <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="form-control numContacto" placeholder="NUMERO DE CONTACTO" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <input type="file" id="filePR" class="SelIM fotoPrincipalA" accept="image/*">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SUBIR FOTO (10MB)
              </label>

              <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarPrincipalA" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

            </div>
          </div>
          

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarGerencia">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal fade" id="modalEditarGerencia">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR NUEVA GERENCIA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloGerenciaE" placeholder="TITULO GERENCIA">
              <input type="hidden" class="form-control rutaGerenciaE" readonly>
              <input type="hidden" class="idGerencias">
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control nombreGerencia" placeholder="NOMBRES Y APELLIDOS">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone" style="width:20px"></i></span>
              </div>
              <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="form-control numContacto" placeholder="NUMERO DE CONTACTO" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <input type="file" id="filePR" class="SelIM fotoPrincipalA" accept="image/*">
              <input type="hidden" class="antiguaFotoPrincipalA">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SUBIR FOTO (10MB)
              </label>

              <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarPrincipalA" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

            </div>
          </div>
          

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarGerencia">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

