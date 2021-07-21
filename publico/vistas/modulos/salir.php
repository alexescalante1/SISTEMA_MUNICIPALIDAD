<?php

//session_destroy();

unset($_SESSION["validarSesionUSERSIUNAP"]);
unset($_SESSION["idUSERSIUNAP"]);
unset($_SESSION["codigoUSERSIUNAP"]);
unset($_SESSION["nombreUSERSIUNAP"]);
unset($_SESSION["userUSERSIUNAP"]);
unset($_SESSION["fotoUSERSIUNAP"]);
unset($_SESSION["emailUSERSIUNAP"]);
unset($_SESSION["passwordUSERSIUNAP"]);
unset($_SESSION["modoUSERSIUNAP"]);



$url = Ruta::ctrRuta();

if(isset($_SESSION['id_token_google']) && !empty($_SESSION['id_token_google'])){

  unset($_SESSION['id_token_google']);

}


echo '<script>
	
	localStorage.removeItem("usuario");
	localStorage.clear();
	window.location = "'.$url.'";

</script>';