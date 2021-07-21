/*=============================================
CAPTURA DE RUTA
=============================================*/

var rutaActual = location.href;

$(".btnIngreso, .facebook, .google").click(function(){

	localStorage.setItem("rutaActual", rutaActual);

})

/*=============================================
FORMATEAR LOS IPUNT
=============================================*/

$("input").focus(function(){

	$(".alert").remove();
})



















/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/
/*
var validarEmailRepetido = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url:rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;

			}else{

				var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

					validarEmailRepetido = true;

			}

		}

	})

})

*/














/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
function registroNotificacion(){

	/*=============================================
	VALIDAR DATOS
	=============================================*/

	var Ndoc = $("#regNumDocT").val();

	if(Ndoc != ""){

		var expresion = /^[0-9]*$/;

		if(!expresion.test(Ndoc)){

			$("#regNumDocT").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong>Solo se permite numeros</div>')

			return false;

		}

	}else{

		$("#regNumDocT").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}


	var nombre = $("#regNombreT").val();

	if(nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)){

			$("#regNombreT").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong>Solo se permite numeros</div>')

			return false;

		}

	}else{

		$("#regNombreT").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	var detalleA = $("#regDetalle").val();

	if(detalleA != ""){

		var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(detalleA)){

			$("#regDetalle").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se acepta caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regDetalle").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	return true;
}
