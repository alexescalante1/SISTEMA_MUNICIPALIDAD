<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PUBLICACIONES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">PUBLICACIONES</li>
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
              <h3 class="card-title">EVENTOS DE ADMISION</h3>

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
                                  <table id="tablaPublicacion" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th style="width:350px">PORTADA</th>
                                      <th>TITULO</th>
                                      <th style="width:150px">CATEGORIA</th>
                                      <th style="width:60px">VISTAS</th>
                                      <th style="width:80px">FECHA</th>
                                      <th style="width:80px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            
                                            $publica = ControladorPublicacion::ctrMostrar("publicar",null, null);
                                            
                                            foreach ($publica as $key => $value) {
                                              
                                              $cat = "SIN CATEGORIA";
                                              if($publica[$key]["categoria"]==1){
                                                $cat = "NOTICIAS";
                                              }else if($publica[$key]["categoria"]==2){
                                                $cat = "PROXIMAS ACTIVIDADES";
                                              }else if($publica[$key]["categoria"]==3){
                                                $cat = "OBRAS REALIZADAS";
                                              }

                                              $imagenPrincipal = "<a><img src='".$publica[$key]["portada"]."' class='img-thumbnail imgTablaPrincipal' width='400px'></a>";
                                              
                                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPublicacion' idPublicar='".$publica[$key]["idPublicar"]."' data-toggle='modal' data-target='#modalEditarPublicacion'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarPublicacion' idPublicar='".$publica[$key]["idPublicar"]."' rutaCabecera='".$publica[$key]["ruta"]."' imgPrincipal='".$publica[$key]["portada"]."'><i class='fa fa-times'></i></button></div>";

                                              //$accionesFinal = "<div class='btn-group'><a href='".$articulos[$key]["ruta"]."'><button class='btn btn-success' ><i class='fa fa-eye'></i></button></a><button class='btn btn-warning btnEditarArticulo' idArticulo='".$articulos[$key]["idDetalleArticulo"]."' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-edit'></i></button></div>";

                                              echo '
                                              <tr>
                                                <td>'.$key.'</h5></td>
                                                <td>'.$imagenPrincipal.'</td>
                                                <td><h5>'.$publica[$key]["titulo"].'</h5></td>
                                                <td><h5>'.$cat.'</h5></td>
                                                <td><h5>'.$publica[$key]["vistas"].' Vistas</h5></td>
                                                <td><h5>'.$publica[$key]["fecha"].'</h5></td>
                                                <td>'.$acciones.'</td>
                                              </tr>
                                              ';

                                            }

                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>PORTADA</th>
                                      <th>TITULO</th>
                                      <th>CATEGORIA</th>
                                      <th>VISTAS</th>
                                      <th>FECHA</th>
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

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarPublicacion">AGREGAR NUEVO EVENTO DE ADMISION</a>
              
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










<div class="modal fade" id="modalAgregarPublicacion">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR NUEVA PUBLICACION</h4>
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
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloPublicacion" placeholder="TITULO">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control rutaPublicacion" placeholder="RUTA" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <select class="form-control seleccionarCategoria">
                  
                <option value="">SELECCIONAR CATEGORIA</option>
                <option value="1">NOTICIAS</option>
                <option value="2">PROXIMAS ACTIVIDADES</option>
                <option value="3">OBRAS REALIZADAS</option>

              </select>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <textarea type="text" maxlength="8000" rows="5" class="form-control descripcionPublicacion" placeholder="DESCRIPCION"></textarea>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control pClavesPublicacion" placeholder="PALABRAS CLAVE">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <input type="file" id="filePR" class="SelIM fotoPrincipalA" accept="image/*">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SUBIR FOTO 16:9 (10MB)
              </label>

              <img src="vistas/img/publicacion/default/default.png" class="previsualizarPrincipalA" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

            </div>
          </div>
          <div class="form-group agregarMultimedia">
            
              <div class="panel">SUBIR CARRUSEL DE IMAGENES</div>

              <div class="multimediaAdd needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  ARRASTRAR O DAR CLICK PARA SUBIR IMAGENES.

                </div>

              </div>
              
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Departamento"  placeholder="DEPARTAMENTO">

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
  
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Provincia"  placeholder="PROVINCIA">

              </div>

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
              
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Distrito"  placeholder="DISTRITO">

              </div>

            </div>
          </div>

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarPublicacion">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





<div class="modal fade" id="modalEditarPublicacion">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDITAR PUBLICACION</h4>
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
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloPublicacionE" placeholder="TITULO">
              <input type="hidden" class="idPublicar">
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control rutaPublicacionE" placeholder="RUTA" readonly>
            </div>
          </div>
        
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <select class="form-control seleccionarCategoria">
                  
                <option value="">SELECCIONAR CATEGORIA</option>
                <option value="1">NOTICIAS</option>
                <option value="2">PROXIMAS ACTIVIDADES</option>
                <option value="3">OBRAS REALIZADAS</option>

              </select>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <textarea type="text" maxlength="8000" rows="5" class="form-control descripcionPublicacion" placeholder="DESCRIPCION"></textarea>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control pClavesPublicacion" placeholder="PALABRAS CLAVE">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <input type="file" id="filePR" class="SelIM fotoPrincipalA" accept="image/*">
              <input type="hidden" class="antiguaFotoPrincipalA">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SUBIR FOTO 16:9 (10MB)
              </label>

              <img src="vistas/img/publicacion/default/default.png" class="previsualizarPrincipalA" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

            </div>
          </div>
          <div class="form-group agregarMultimedia">
              
              <!--<div class="panel">SUBIR CARRUSEL DE IMAGENES</div>-->
              <div class="row previsualizarImgAdd"></div>
              <div class="multimediaAdd needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  ARRASTRAR O DAR CLICK PARA SUBIR IMAGENES.

                </div>

              </div>
              
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Departamento"  placeholder="DEPARTAMENTO">

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
  
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Provincia"  placeholder="PROVINCIA">

              </div>

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
              
                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control Distrito"  placeholder="DISTRITO">

              </div>

            </div>
          </div>

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarCambiosPublicacion">GUARDAR</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


