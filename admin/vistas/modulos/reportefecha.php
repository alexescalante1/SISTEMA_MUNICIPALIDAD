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

$arrHrMn = array();
        
$arrHrMn[] = "07:30";
for($Hr=8;$Hr<13;$Hr++){
  for($Mn=0;$Mn<60;$Mn+=30){
    if($Hr<10){
      if($Mn==0){
        $arrHrMn[] = "0".$Hr.":0".$Mn;
      }else{
        $arrHrMn[] = "0".$Hr.":".$Mn;
      }
    }else{
      if($Mn==0){
        $arrHrMn[] = $Hr.":0".$Mn;
      }else{
        $arrHrMn[] = $Hr.":".$Mn;
      }
    }
  }
}
for($Hr=1;$Hr<5;$Hr++){
  for($Mn=0;$Mn<60;$Mn+=30){
    if($Hr<10){
      if($Mn==0){
        $arrHrMn[] = "0".$Hr.":0".$Mn;
      }else{
        $arrHrMn[] = "0".$Hr.":".$Mn;
      }
    }else{
      if($Mn==0){
        $arrHrMn[] = $Hr.":0".$Mn;
      }else{
        $arrHrMn[] = $Hr.":".$Mn;
      }
    }
  }
}
$arrHrMn[] = "05:00";
$arrHrMn[] = "05:30";


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
                            <div class="col-12">

                              <div class="card">
                                
                                

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <table id="tablaCarrrusel" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>2</th>
                                      <th>3</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    


                                    <?php
                                    
                                      $FECHA_LABORAL = null;
                                      $CYEARI = null;
                                      $CYEARF = null;
                                      $DATE =   null;
                                      $DIADATE = null;
                                      $FORMULA = null;


                                      $j=2020;
                                      $TABLAV_I = "E2";
                                      $TABLAV_F = "E21309";
                                      $IDCONT = 0;
                                      $HoraMin = 0;
                                      
                                      for($i=1;$i<=12;$i++){
                                          $ndias = cal_days_in_month(CAL_GREGORIAN, $i, $j);
                                          if($i<10){
                                              $CYEARI = $j."-0".$i."-01";
                                              $CYEARF = $j."-0".$i."-".$ndias;
                                          }else{
                                              $CYEARI = $j."-".$i."-01";  
                                              $CYEARF = $j."-".$i."-".$ndias;  
                                          }

                                          $COMPLETAR = 29;
                                          echo '<tr>
                                          <td>'.$IDCONT.'</td>
                                          <td>HORA</td>
                                          ';

                                          foreach(getDiasHabiles($CYEARI, $CYEARF, $feriados) as $key => $value){
                                                    
                                                if($i<10){
                                                  $DATE = $value[8].$value[9]."/0".$i."/".$j;
                                                }else{
                                                  $DATE = $value[8].$value[9]."/".$i."/".$j;
                                                }

                                                echo "<td>".$DATE."</td>";

                                                $COMPLETAR = $key;
                                            
                                          }
                                          for($s = $COMPLETAR;$s<27;$s++){
                                            echo '<td></td>';
                                          }
                                          echo '</tr>';
                                          $IDCONT = $IDCONT + 1;


                                          for($IN = 1; $IN < count($arrHrMn); $IN++){
                                              
                                            $HoraMin = "[".$arrHrMn[$IN-1]." ".$arrHrMn[$IN].">";
                                            
                                            echo '<tr>
                                            <td>'.$IDCONT.'</td>
                                            <td>'.$HoraMin.'</td>
                                            ';

                                            foreach(getDiasHabiles($CYEARI, $CYEARF, $feriados) as $key => $value){
                                                  
                                                  if($value[8]=="0"){
                                                    $FECHA_LABORAL = $meses[$i]." ".$value[9]." ".$j;
                                                  }else{
                                                    $FECHA_LABORAL = $meses[$i]." ".$value[8].$value[9]." ".$j;
                                                  }
                                                  

                                                  if($arrHrMn[$IN]=='01:00'){
                                                    $FORMULA = '=CONTAR.SI.CONJUNTO('.$TABLAV_I.':'.$TABLAV_F.';">="&"'.$FECHA_LABORAL.' '.$arrHrMn[$IN-1].'*";'.$TABLAV_I.':'.$TABLAV_F.';"<="&"'.$FECHA_LABORAL.' 12:59*")';
                                                  }else{
                                                    $FORMULA = '=CONTAR.SI.CONJUNTO('.$TABLAV_I.':'.$TABLAV_F.';">="&"'.$FECHA_LABORAL.' '.$arrHrMn[$IN-1].'*";'.$TABLAV_I.':'.$TABLAV_F.';"<"&"'.$FECHA_LABORAL.' '.$arrHrMn[$IN].'*")';
                                                  }

                                                  
                                                  //=CONTAR.SI.CONJUNTO(E1:E684;">="&"Apr 1 2019 10:15*";E1:E684;"<"&"Apr 1 2019 10:30*")
                                                  //echo $DATE.'<br>';

                                                  // echo $FORMULA.' '.$key.'<br>';

                                                  echo '<td>'.$FORMULA.'</td>';
                                                  $COMPLETAR = $key;
                                                  
                                            }

                                            for($s = $COMPLETAR;$s<27;$s++){
                                              echo '<td></td>';
                                            }

                                            echo '</tr>';

                                            $IDCONT = $IDCONT + 1;

                                          // echo "<br><br>";
                                        }

                                        for($Rp = 0; $Rp < 10 ; $Rp++){
                                          echo '<tr>
                                            <td>'.$IDCONT.'</td>';
                                            for($s = 0;$s<29;$s++){
                                              echo '<td></td>';
                                            }$IDCONT = $IDCONT + 1;
                                          echo '</tr>';
                                        }

                                      }
                                      


                                    ?>      


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>1</th>
                                      <th>2</th>
                                      <th>3</th>
                                      <th>2</th>
                                      <th>3</th>
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

