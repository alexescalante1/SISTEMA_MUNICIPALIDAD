
<div id="particles-js"style="background-color:#000;"></div>

<div style="padding-top:10%;"></div>

<div class="login-box" style="box-shadow: 0px 0px 15px #00FF63;">

  <div class="login-box-body" style="border-radius:3px;">
    
    <div style="padding-bottom: 25px;">
      <img src="<?php echo $servidor;?>/vistas/img/plantilla/logo.png" class="img-responsive" style="padding:10px 50px;">
    </div>
    
    <form  method="post">

      <div class="form-group form has-feedback">
        <input type="text" id="ingUser" name="ingUser" style="padding-top:15px;padding-left:10px;" required>
        <label class="lbl-nombre">
          <span class="text-nomb">Usuario</span>
          <span class="glyphicon glyphicon-user form-control-feedback spanIcon "></span>
        </label>
      </div>

      <div class="form-group form has-feedback">
        <input type="password" id="ingPassword" name="ingPassword" style="padding-top:15px;padding-left:10px;" required>
        <label class="lbl-nombre">
          <span class="text-nomb">Password</span>
          <span class="glyphicon glyphicon-lock form-control-feedback spanIcon"></span>
        </label>
      </div>

      <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>-->

      <button type="submit" class="ov-btn-slide-top">Ingresar</button>
      
      <?php

        $ingreso = new ControladorUsuarios();
        $ingreso -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->


<script src="vistas/js/particles.min.js"></script>
<script src="vistas/js/particula.js"></script>