<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">REGISTRO DE DOCUMENTOS CON TUPA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">REGISTRO</li>
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
                                            <select class="form-control def-input select2 tipoDoc">
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
                                            <a class="btn btn-sm btn-info float-right RegNRem" data-toggle="modal" data-target="#modalAgregarRemitente">NUEVO REMITENTE</a>
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
                                          <select class="form-control def-input select2 oficinaDoc">
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
                </section>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <button type="button" class="btn btn-sm btn-info float-right guardarDocumento">REGISTRAR</button>
              <button class='AddArchivoR' style="display:none" data-toggle='modal' data-target='#modalAgregarArchivo'></button>

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










<div class="modal fade" id="modalAgregarRemitente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">REMITENTE/INSTITUCION</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>* TIPO DE PERSONA</label>
                    <select class="form-control def-input Rtipoper">
                        <option value="">SELECCIONAR</option>
                        <option value="NATURAL">NATURAL</option>
                        <option value="JURIDICA">JURIDICA</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>* TIPO DE DOCUMENTO</label>
                    <select class="form-control def-input Rtipodoc" disabled="disabled">
                        <option value=""></option>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                    </select>
                </div>
            </div>
          </div>

          <div class="form-group">
              <input type="number" class="form-control def-input Rndoc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" placeholder="* Nº DOCUMENTO">
          </div>

          <div class="form-group">
              <input type="text" class="form-control def-input Rnombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="* INGRESAR EL NOMBRE">
          </div>

          <div class="form-group">
              <input type="text" class="form-control def-input Rdireccion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="INGRESAR LA DIRECCION">
          </div>

          <div class="form-group">
              <input type="email" class="form-control def-input Remail" placeholder="INGRESAR EL E-MAIL">
          </div>

          <div class="form-group">
              <input type="number" class="form-control def-input Rtelef" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" placeholder="Nro TELEFONICO">
          </div>

          <div class="form-group">
              <input type="number" class="form-control def-input Rfax" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" placeholder="FAX">
          </div>

          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control def-input Rdep" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="DEPARTAMENTO">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control def-input Rprov" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="PROVINCIA">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control def-input Rdistr" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="DISTRITO">
                </div>
            </div>
          </div>


          <div class="form-group">
              <input type="text" class="form-control def-input Rrepresentante" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="REPRESENTANTE">
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-info guardarRemitente">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modalAgregarArchivo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADJUNTAR ARCHIVO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <canvas style="width:100%;" id="MyCode"></canvas>
          <input style="display:none" id="CODDOCUMENTO">

            <div class="input-group">
              
              <input type="file" accept="application/pdf" id="filePR" class="SelIM archivo">
              
              <label for="filePR" class="fileButton">
                <i class="fas fa-file-image "></i> &nbsp; ADJUNTAR ARCHIVO PDF
              </label>
              
            </div>
        
      </div>
      <div class="modal-footer justify-content-between">
        
        <button type="button" class="btn btn-info guardarArchivo" style="width:100%;">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->