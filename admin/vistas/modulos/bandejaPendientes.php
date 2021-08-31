<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">BANDEJA DE PENDIENTES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">BANDEJA</li>
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
            <?php 
              $postulantes = ModeloTramite::mdlMostrarBandeja("documentos","estado", 1);
            ?>
            <div class="card-body p-0">

                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                          <div class="card">
                              
                            <div class="card-body">
                              <table id="tablaDoc" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    
                                    <th style="width:10px">COD</th>
                                    <th style="width:30px">MODO</th>
                                    <th style="width:30px">TIPO</th>
                                    <th>NUM</th>
                                    <th>ASUNTO</th>
                                    <th>REMITENTE</th>
                                    <th style="width:100px">FECHA</th>
                                    <th style="width:10px">OP</th>

                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php

                                      foreach($postulantes as $key => $value){

                                          $acciones = "<div class='btn-group'><a href='".(new Ruta)->ctrRutaServidor().$value["archivo"]."' class='btn btn-info' >PDF</a><button class='btn btn-success btnVerDoc' idDocumentos='".$value["idDocumentos"]."' data-toggle='modal' data-target='#modalVerDoc'><i class='fa fa-eye'></i></button><button class='btn btn-warning btnEditarDoc' idDocumentos='".$value["idDocumentos"]."' data-toggle='modal' data-target='#modalEditarDoc'><i class='fa fa-edit'></i></button></div>";

                                          echo '
                                            <tr>
                                              <td>'.$value["codigo"].'</td>
                                              <td>'.$value["modo"].'</td>
                                              <td>'.$value["tipodoc"].'</td>
                                              <td>'.$value["numdoc"].'</td>
                                              <td>'.$value["asunto"].'</td>
                                              <td>'.$value["nombre"].'<br><div style="font-size=5px;color: #82E0AA;">'.$value["numDoc"].'</div></td>
                                              <td>'.$value["fecha"].'</td>
                                              <td>'.$acciones.'</td>
                                            </tr>
                                            ';
                                      }
                                      
                                  ?>

                                  </tbody>
                                  <tfoot>
                                  <tr>
                                  <th>COD</th>
                                  <th>MODO</th>
                                  <th>TIPO</th>
                                  <th>NUM</th>
                                  <th>ASUNTO</th>
                                  <th>REMITENTE</th>
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
                  </div>
                </section>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

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










<div class="modal fade" id="modalVerDoc">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">DATOS DEL TRAMITE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          

        <form id="formulario">

          <div class="row">

              <div class="col-md-6">


                  <div class="form-group">
                      <label>RESPONSABLE</label>
                      <input type="text" class="form-control def-input" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo 'value="'.$_SESSION["nombre"].'"'; ?> readonly>
                      <input style="display:none" id="IDADMIN" <?php echo 'value="'.$_SESSION["id"].'"'; ?> >
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>* TIPO DE DOCUMENTO</label>
                          <select class="form-control def-input tipoDoc">
                              <option value="">SELECCIONAR</option>
                              <option value="SOLICITUD">SOLICITUD</option>
                              <option value="INFORME">INFORME</option>
                              <option value="CARTA">CARTA</option>
                              <option value="AYUDA MEMORIAL">AYUDA MEMORIAL</option>
                              <option value="DIRECTIVA">DIRECTIVA</option>
                              <option value="EXPOSICION DE MOTIVOS">EXPOSICION DE MOTIVOS</option>
                              <option value="MEMORANDO">MEMORANDO</option>
                              <option value="MEMORANDO MULTIPLE">MEMORANDO MULTIPLE</option>
                              <option value="OFICIO">OFICIO</option>
                              <option value="OFICIO CIRCULAR">OFICIO CIRCULAR</option>
                              <option value="OFICIO MULTIPLE">OFICIO MULTIPLE</option>
                              <option value="RESOLUCION">RESOLUCION</option>

                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>TRAMITE</label>
                          <input type="text" class="form-control def-input numDoc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="S/N">
                      </div>
                    </div>

                  </div>


              </div>

              <div class="col-md-6">
                  
                  <div class="form-group">
                      <label>* MODO</label>
                      <select class="form-control def-input modoDoc">
                          <option value="SIN TUPA">SIN TUPA</option>
                          <option value="CON TUPA">CON TUPA</option>
                      </select>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>* REMITENTE / INSTITUCION</label>
                          <input type="number" class="form-control def-input Iremitente" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" placeholder="INGRESAR EL DNI">
                          <input style="display:none" id="IDREMITENTE">
                          
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>NOMBRE</label>
                          <input type="text" class="form-control def-input remitenetName" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="NO SELECCIONADO" readonly>
                      </div>
                    </div>

                  </div>



              </div>

          </div>

          <div class="row">

            <div class="col-md-6">


                <div class="form-group">
                  
                    <label>* ASUNTO</label>
                    <textarea type="text" maxlength="8000" rows="5" class="form-control def-input asuntoDoc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="DESCRIPCION"></textarea>

                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <?php 
                        $gerencias = ControladorPublicacion::ctrMostrar("gerencias",null, null);
                      ?>
                      <label>* OFICINA</label>
                        <select class="form-control def-input oficinaDoc">
                            <option value="">SELECCIONAR</option>
                            <?php 
                                foreach($gerencias as $key => $value){
                                  echo '<option value="'.$value["idGerencias"].'">'.$value["titulo"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>REFERENCIA</label>
                        <input type="number" class="form-control def-input referenciaDoc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" placeholder="NUMERO DOC">
                    </div>
                  </div>


                </div>
                
                
                <div class="form-group">
                    <label>CLASE</label>
                    <select class="form-control def-input claseDoc">
                        <option value="">SELECCIONAR</option>
                        <option value="PROCESOS">PROCESOS</option>
                        <option value="SERVICIOS">SERVICIOS</option>
                    </select>

                </div>

                

                

            </div>

            <div class="col-md-6">
                
                <div class="form-group">
                  
                  <label>OBSERVACIONES</label>
                  <textarea type="text" maxlength="8000" rows="5" class="form-control def-input observacionesDoc" placeholder="DESCRIPCION"></textarea>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>TIEMPO DE RESPUESTA</label>
                        <input type="number" class="form-control def-input tiempoResDoc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" placeholder="DIAS" value="5">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>FOLIOS</label>
                        <input type="number" class="form-control def-input foliosDoc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" value="1">
                    </div>
                  </div>

                </div>

                <div class="form-group">
                    <label>REQUICITOS</label>
                    <input type="text" class="form-control def-input requicitosDoc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="NULL" readonly>
                    
                </div>

            </div>

          </div>

          </form>
          

        
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

