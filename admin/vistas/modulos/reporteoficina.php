<?php

function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array()) {
        $fechainicio = strtotime($fechainicio);
        $fechafin = strtotime($fechafin);
       
        $diainc = 24*60*60;
       
        $diashabiles = array();
        for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
                // Si el dia indicado, no es sabado o domingo es habil
                if (!in_array(date('N', $midia), array(6,7))) { // DOC: http://www.php.net/manual/es/function.date.php
                        // Si no es un dia feriado entonces es habil
                        if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                array_push($diashabiles, date('Y-m-d', $midia));
                        }
                }
        }
       
        return $diashabiles;
}

function get_nombre_dia($fecha){
  $fechats = strtotime($fecha); //pasamos a timestamp

  //el parametro w en la funcion date indica que queremos el dia de la semana
  //lo devuelve en numero 0 domingo, 1 lunes,....
  switch (date('w', $fechats)){
    case 0: return "Domingo"; break;
    case 1: return "Lunes"; break;
    case 2: return "Martes"; break;
    case 3: return "Miercoles"; break;
    case 4: return "Jueves"; break;
    case 5: return "Viernes"; break;
    case 6: return "Sabado"; break;
  }
}

$feriados = array('2021-07-28', '2021-07-29');

$meses = array(1=>'Jan', 2=>'Feb', 3=>'Mar', 4=>'Apr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Aug', 9=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec');
$mesesEs = array(1=>'Enero', 2=>'Febrero', 3=>'Marzo', 4=>'Abril', 5=>'Mayo', 6=>'Junio', 7=>'Julio', 8=>'Agosto', 9=>'Septiembre', 10=>'Octubre', 11=>'Noviembre', 12=>'Diciembre');

$param = ControladorPublicacion::ctrMostrar("reporteparametros","idRepParam", 1);

$gerencias1 = array(
  'Gerencia de Transportes y Seguridad Vial',
  'Subgerencia de Registro de Transportes',
  'Subgerencia de Inspecciones de Tránsito',
  'Gerencia de Planificación y Presupuesto',
  'Subgerencia de Actividades Económicas',
  'Gerencia de Administración Tributaria',
  'Casa de la Cultura',
  'Fase Instructora',
  'Oficina de Ejecución Coactiva',
  'Omaped',
  'Gerencia de Asesoría Jurídica',
  'Unidad de Registro Civil',
  'Gerencia Municipal',
  'Subgerencia de limpieza y recolección',
  'Gerencia de Ingeniería Municipal'
  );

$gerencias2 = array(
  'Subgerencia de Inspecciones de Tránsito',                                       
  'Subgerencia de Registro de Transportes',
  'Gerencia de Transportes y Seguridad Vial',
  'Subgerencia de limpieza y recolección',
  'Subgerencia de Parques, Jardines y Conservación de Áreas Verdes',
  'Gerencia de Desarrollo Urbano',
  'Asesoria Legal - Gerencia de Transporte y Seguridad Vial',
  '2455252',
  'IVP-Puno',
  'Gerencia de Turismo y Desarrollo Económico',
  'Subgerencia de Actividades Económicas',
  'Subgerencia de Planeamiento y Control Urbano',
  'Subgerencia de Gestión Ambiental y Salud Pública',
  'Gerencia de Planificación y Presupuesto'
  );


$gerencias3 = array(
  'Subgerencia de Actividades Económicas',
  'Subgerencia de Personal',
  'Secretaría General',
  'Subgerencia de Promoción de Educación, Cultura y Deporte',
  'Alcaldía y Asesoria de Alcaldia',
  'Gerencia de Turismo y Desarrollo Económico',
  'Oficina de Ejecución Coactiva',
  'SALA DE REGIDORES',
  'Unidad de Registro Civil',
  'Oficina de Defensa Civil',
  'Subgerencia de Parques, Jardines y Conservación de Áreas Verdes',
  'Gerencia Municipal',
  'Gerencia de Planificación y Presupuesto',
  'Subgerencia de Logística',
  'Gerencia de Desarrollo Humano y Participación Ciudadana',
  'Gerencia de Gestión Integral de Residuos Solidos',
  'Subgerencia de Formulación y Evaluación de Proyectos, y Cooperación Técnica Internacional',
  'Gerencia de Desarrollo Urbano',
  'Gerencia de Administración Tributaria',
  'Gerencia de Administración',
  'Subgerencia de Tesorería',
  'Gerencia de Transportes y Seguridad Vial',
  'Subgerencia de Protección Ciudadana y Defensa Civil',
  'Programa Especial de Complejos Culturales y Recreativos',
  'Subgerencia de Estudios Definitivos',
  'Oficina de Supervisión y Liquidación de Inversiones',
  'Programa Especial de la Bahía del Lago',
  'Subgerencia de Turismo y Comercio Exterior',
  'Subgerencia de Obras Públicas y Mantenimiento',
  'Subgerencia de Gestión Ambiental y Salud Pública',
  'Gerencia de Ingeniería Municipal',
  'Unidad de Imagen Institucional y Protocolo',
  'Unidad de Archivo',
  'Gerencia de Medio Ambiente, Saneamiento y Servicios',
  'Gerencia de Asesoría Jurídica',
  'Programa Especial Terminal Terrestre',
  'Subgerencia de Promoción Empresarial y Desarrollo Económico Rural',
  'Comisión Central de la Festividad Virgen de la Candelaria 2020',
  'Procuraduría Pública Municipal',
  'Oficina de Atención y Orientación al Vecino',
  'Unidad Local de Empadronamiento - SISFOH',
  'Subgerencia de Promoción Social y Participación Ciudadana',
  'Subgerencia de Planeamiento y Control Urbano',
  'Subgerencia de Planificación y Programación Multianual de Inversiones',
  'Subgerencia de Registro de Transportes',
  'IVP-Puno',
  'Centro Comercial Ramis',
  'Comité Provincial de Administración del Programa Vaso de Leche',
  'Subgerencia de Contabilidad',
  'Subgerencia de Desarrollo de la Mujer,Niño,Adolescente y Adulto Mayor',
  'Programa Especial de Operación y Mantenimiento de Maquinaria y Equipo (Taller)',
  'Subgerencia de Catastro',
  'Oficina de Patrimonio',
  '2211301'
  );


?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">CARRUSEL DE IMAGENES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">CARRUSEL</li>
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
                            <div class="col-md-2">

                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" class="form-control Pyear" placeholder="2020" value="<?php echo $param[0]["year"]; ?>" required>
                                    </div>
                                  </div>

                            </div>
                            <div class="col-md-2">

                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control FcolumInit" placeholder="E0000" value="<?php echo $param[0]["columInit"]; ?>" required>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-2">

                                <div class="form-group">
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control FcolumFin" placeholder="E0000" value="<?php echo $param[0]["columFin"]; ?>" required>
                                  </div>
                                </div>

                              </div>

                              <div class="col-md-2">

                                <a class="btn btn-sm btn-info float-right actParam">ACTUALIZAR</a>

                              </div>
                          </div>



                          <div class="row">
                            <div class="col-12">

                              <div class="card">
                                
                                

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <table id="tablaCarrrusel" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th>FECHA ES</th>
                                      <th>FORMULA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    

                                    <?php


                                        $j = 2029;
                                        $TABLAV_I = "E2";
                                        $TABLAV_F = "E21309";

                                        $TABLAV_GI = "G2";
                                        $TABLAV_GF = "G21309";

                                        $FORMULA = null;
                                        $IDCONT = 0;
                                        
                                        for($i=1;$i<=12;$i++){
                                            
                                            //=CONTAR.SI.CONJUNTO(G1:G684;"Gerencia de Transportes y Seguridad Vial";E1:E684;"Apr*")
                                            foreach($gerencias3 as $key => $value){
                                                
                                                $FORMULA = '=CONTAR.SI.CONJUNTO('.$TABLAV_GI.':'.$TABLAV_GF.';"'.$value.'";'.$TABLAV_I.':'.$TABLAV_F.';"'.$meses[$i].'*")<br>';
                                              
                                                echo '
                                                <tr>
                                                  <td>'.$IDCONT.'</td>
                                                  <td>'.$value.'</td>
                                                  <td>'.$FORMULA.'</td>
                                                </tr>
                                                ';
                                                $IDCONT = $IDCONT + 1;

                                            }

                                            for($Rp = 0; $Rp < 10 ; $Rp++){
                                                echo '
                                                <tr>
                                                  <td>'.$IDCONT.'</td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                                ';
                                                $IDCONT = $IDCONT + 1;
                                            }
                                        }
                                        
                                    ?>
     
                                              


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>FECHA ES</th>
                                      <th>FORMULA</th>
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

