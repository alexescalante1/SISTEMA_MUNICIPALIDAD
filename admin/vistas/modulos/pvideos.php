<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">VIDEOS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">VIDEOS</li>
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
              <h3 class="card-title">VIDEOS INFORMATIVOS</h3>

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
                                  <table id="tablaPvideo" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th style="width:150px">ENLACE</th>
                                      <th>TITULO</th>
                                      <th style="width:150px">CATEGORIA</th>
                                      <th style="width:100px">FECHA</th>
                                      <th style="width:60px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            
                                            $pvideo = ControladorPublicacion::ctrMostrar("pvideos",null, null);
                                            
                                            foreach ($pvideo as $key => $value) {
                                              
                                              $cat = "SIN CATEGORIA";
                                              if($pvideo[$key]["categoria"]==1){
                                                $cat = "NOTICIAS";
                                              }else if($pvideo[$key]["categoria"]==2){
                                                $cat = "PROXIMAS ACTIVIDADES";
                                              }else if($pvideo[$key]["categoria"]==3){
                                                $cat = "OBRAS REALIZADAS";
                                              }

                                              $acciones = "<div class='btn-group'><button class='btn btn-danger btnEliminarVideo' idPvideos='".$pvideo[$key]["idPvideos"]."'><i class='fa fa-times'></i></button></div>";

                                              echo '
                                              <tr>
                                                <td>'.$key.'</td>
                                                <td class="PVideo">'.$pvideo[$key]["enlace"].'</td>
                                                <td><h5>'.$pvideo[$key]["titulo"].'</h5></td>
                                                <td><h5>'.$cat.'</h5></td>
                                                <td><h5>'.$pvideo[$key]["fecha"].'</h5></td>
                                                <td>'.$acciones.'</td>
                                              </tr>
                                              ';

                                            }

                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>ENLACE</th>
                                      <th>TITULO</th>
                                      <th>CATEGORIA</th>
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

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarPvideo">AGREGAR NUEVO VIDEO PROMOCIONAL</a>
              
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




<div class="modal fade" id="modalAgregarPvideo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR NUEVO VIDEO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control enlaceVideo" placeholder="CODIGO DE INSERCION">
            </div>
          </div>



          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloPvideo" placeholder="TITULO">
            </div>
          </div>

          

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <select class="form-control seleccionarCategoriaV">
                
                <option value="">SELECCIONAR CATEGORIA</option>
                <option value="1">NOTICIAS</option>
                <option value="2">PROXIMAS ACTIVIDADES</option>
                <option value="3">OBRAS REALIZADAS</option>

              </select>

            </div>
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarPvideo">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->