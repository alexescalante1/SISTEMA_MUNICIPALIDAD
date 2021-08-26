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
              <h3 class="card-title">DATOS GENERALES</h3>

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
                                            <label>REMITENTE / INSTITUCION</label>
                                            <input type="number" class="form-control def-input Iremitente" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" placeholder="INGRESAR EL DNI">
                                            <input style="display:none" id="IDREMITENTE">
                                            <a class="btn btn-sm btn-info float-right RegNRem" data-toggle="modal" data-target="#modalAgregarRemitente">NUEVO REMITENTE</a>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NOMBRE</label>
                                            <input type="text" class="form-control def-input remitenetName" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
                                        </div>
                                      </div>

                                    </div>

                                </div>

                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>* TIPO DE DOCUMENTO</label>
                                        <select class="form-control def-input">
                                            <option value="">SELECCIONAR</option>
                                            <option value="normal">AYUDA MEMORIA</option>
                                            <option value="beca">CARTA</option>
                                            <option value="beca">INFORME</option>
                                            <option value="beca">OFICIO</option>
                                            <option value="beca">PLANILLA</option>
                                            <option value="beca">RECIBO</option>
                                            <option value="beca">SOLICITUD</option>
                                            <option value="beca">CARTA DE NOTIFICACION</option>
                                            <option value="beca">CARTA MULTIPLE</option>
                                            <option value="beca">CARTA SIMPLE</option>
                                            <option value="beca">CEDULA DE NOTIFICACION</option>
                                            <option value="beca">CERTIFICACION PRESUPUESTAL</option>
                                            <option value="beca">CITACION DE CAFAE</option>
                                            <option value="beca">CITACION DE PROCESOS ADMINISTRATIVOS</option>
                                            <option value="beca">DECRETO</option>
                                            <option value="beca">DECRETO LEGISLATIVO</option>
                                            <option value="beca">DECRETO LEY</option>
                                            <option value="beca">DIRECTIVA</option>
                                            <option value="beca">EXPEDIENTE</option>
                                            <option value="beca">GENERAL</option>
                                            <option value="beca">HOJA DE CORDINACION</option>
                                            <option value="beca">HOJA DE TRAMITE</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Nº DEL DOCUMENTO</label>
                                        <input type="text" class="form-control def-input">
                                    </div>

                                </div>



                            </div>

                            <div class="row">

                              <div class="col-md-6">


                                  <div class="form-group">
                                    
                                      <label>ASUNTO</label>
                                      <textarea type="text" maxlength="8000" rows="5" class="form-control def-input" placeholder="DESCRIPCION"></textarea>

                                  </div>

                                  <div class="form-group">
                                      <label>CLASE</label>
                                      <select class="form-control def-input">
                                          <option value="">SELECCIONAR</option>
                                          <option value="PROCESOS">PROCESOS</option>
                                          <option value="SERVICIOS">SERVICIOS</option>
                                      </select>

                                  </div>

                                  <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>REFERENCIA</label>
                                          <input type="number" class="form-control def-input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" placeholder="INGRESAR EL DNI">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>OFICINA</label>
                                          <select class="form-control def-input">
                                              <option value="">SELECCIONAR</option>
                                              <option value="normal">AYUDA MEMORIA</option>
                                              <option value="beca">CARTA</option>
                                              <option value="beca">INFORME</option>
                                          </select>
                                      </div>
                                    </div>

                                  </div>
                                  



                                  <!--
                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      
                                      <input type="file" id="filePR" class="SelIM fotoPrincipalA">
                                      
                                      <label for="filePR" class="fileButton">
                                        <i class="fas fa-file-image"></i> &nbsp; ADJUNTAR ARCHIVO
                                      </label>
                                      
                                    </div>
                                  </div>
                                  -->

                              </div>

                              <div class="col-md-6">
                                  
                                  <div class="form-group">
                                    
                                    <label>OBSERVACIONES</label>
                                    <textarea type="text" maxlength="8000" rows="5" class="form-control def-input" placeholder="DESCRIPCION"></textarea>

                                  </div>

                                  <div class="form-group">
                                      <label>REQUICITOS</label>
                                      <input type="text" class="form-control def-input" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
                                  </div>


                                  <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>TIEMPO DE RESPUESTA</label>
                                          <input type="number" class="form-control def-input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" placeholder="DIAS">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label>FOLIOS</label>
                                          <input type="number" class="form-control def-input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" value="1">
                                      </div>
                                    </div>

                                  </div>

                              </div>

                            </div>

                        </form>

                  </div>
                </section>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalRegistrarDoc">REGISTRAR</a>
              
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
                    <select class="form-control def-input Rtipodoc">
                        <option value="">SELECCIONAR</option>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                    </select>
                </div>
            </div>
          </div>

          <div class="form-group">
              <input type="number" class="form-control def-input Rndoc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" placeholder="* Nº DOCUMENTO">
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
        <button type="button" class="btn btn-primary guardarRemitente">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

