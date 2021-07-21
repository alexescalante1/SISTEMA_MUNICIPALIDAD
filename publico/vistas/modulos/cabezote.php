<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/

if(isset($_SESSION["validarSesionUSERSIUNAP"])){

	if($_SESSION["validarSesionUSERSIUNAP"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["idUSERSIUNAP"].'");

		</script>';

	}
	
}

?>

<!--=====================================
TOP
======================================-->

<div class="container-fluid barraSuperior" id="top">
	
	<div class="container">
		
		<div class="row">
	
			<!--=====================================
			SOCIAL
			======================================-->
			
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
				
				<ul>	

					<?php
					/*
					$social = ControladorPlantilla::ctrEstiloPlantilla();

					$jsonRedesSociales = json_decode($social["redesSociales"],true);		

					foreach ($jsonRedesSociales as $key => $value) {

						echo '<li>
								<a href="'.$value["url"].'" target="_blank">
									<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
								</a>
							</li>';
					}
					*/
					?>
			
				</ul>

			</div>

			<!--=====================================
			REGISTRO
			======================================-->

			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
				
				<ul>

				<?php

				if(isset($_SESSION["validarSesionUSERSIUNAP"])){

					if($_SESSION["validarSesionUSERSIUNAP"] == "ok"){

						if($_SESSION["modoUSERSIUNAP"] == "directo"){

							if($_SESSION["fotoUSERSIUNAP"] != ""){

								echo '<li>

										<img class="img-circle" src="'.$url.$_SESSION["fotoUSERSIUNAP"].'" width="10%">

									 </li>';

							}else{

								echo '<li>

									<img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">

								</li>';

							}

							echo '<li>|</li>
							 <li><a href="'.$url.'perfil">Ver Perfil</a></li>
							 <li>|</li>
							 <li><a href="'.$url.'salir">Salir</a></li>';

						}

					}

				}else{

					echo '<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
						  <li>|</li>
						  <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>';

				}

				?>
	
				</ul>

			</div>	

		</div>	

	</div>

</div>





<!--=====================================
VENTANA MODAL PARA EL REGISTRO
======================================-->



<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">REGISTRARSE</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

			<!--=====================================
			REGISTRO DIRECTO
			======================================-->

			<form method="post" onsubmit="return registroUsuario()">

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control text-uppercase" id="regCodigo" name="regCodigo" placeholder="Codigo" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>

					</div>

				</div>


				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control" id="regUser" name="regUser" placeholder="User" required>

					</div>

				</div>


				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="CONTRASEÑA" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="CORREO ELECTRONICO" required>

					</div>

				</div>

				<?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

        </div>
      
    </div>

</div>






























<!--=====================================
VENTANA MODAL PARA EL INGRESO
======================================-->

<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">INGRESAR</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
    
			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="text" class="form-control" id="ingUser" name="ingUser" placeholder="Usuario" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

					</div>

				</div>

				

				<?php

					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">	

				<br>

				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>


<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

			<form method="post">

				<label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>
					
						<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>			

				<?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>



