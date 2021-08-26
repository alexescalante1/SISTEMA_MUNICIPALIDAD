<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">CONSULTA DOCUMENTOS GENERALES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">CONSULTA</li>
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
              <h3 class="card-title">DOCUMENTOS</h3>

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

                <section class="content">
                  <div class="container-fluid">
                    HOLA
                  </div>
                </section>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarCimagen">AGREGAR NUEVA IMAGEN</a>
              
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










<div class="modal fade" id="modalAgregarCimagen">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR NUEVA IMAGEN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          

          
          <div class="row">
              <div class="col-md-10">

                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
                        </div>
                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control tituloCimagen" placeholder="TITULO">
                        <input type="hidden" class="form-control rutaCimagen" readonly>
                      </div>
                    </div>

              </div>
              <div class="col-md-2">

                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
                        </div>
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" class="form-control Cprioridad" placeholder="PRIORIDAD" required>
                      </div>
                    </div>

                </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <input type="file" id="filePR" class="SelIM fotoPrincipalA" accept="image/*">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SUBIR FOTO PRINCIPAL 16:9 (10MB)
              </label>

              <img src="vistas/img/publicacion/default/default.png" class="previsualizarPrincipalA" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

            </div>
          </div>
          

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarCimagen">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

