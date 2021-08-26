
$(".guardarRemitente").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".Rtipoper").val() != "" &&
	   $(".Rtipodoc").val() != "" &&
	   $(".Rndoc").val() != "" &&
	   $(".Rnombre").val() != ""){

		/*=============================================
		ALMACENAMOS TODOS LOS CAMPOS
		=============================================*/

		var Rtipopersona = $(".Rtipoper").val();
		var Rtipodoc = $(".Rtipodoc").val();
	   	var Rndoc = $(".Rndoc").val();
	    var Rnombre = $(".Rnombre").val();
	    var Rdireccion = $(".Rdireccion").val();
	    var Remail = $(".Remail").val();
	    var Rtelefono = $(".Rtelef").val();
		var Rfax = $(".Rfax").val();
		var RDepartamento = $(".Rdep").val();
	    var RProvincia = $(".Rprov").val();
		var RDistrito = $(".Rdistr").val();
		var Rrepresentante = $(".Rrepresentante").val();

	 	var datos = new FormData();
		 datos.append("Rtipopersona", Rtipopersona);
		 datos.append("Rtipodoc", Rtipodoc);
		 datos.append("Rndoc", Rndoc);
		 datos.append("Rnombre", Rnombre);
		 datos.append("Rdireccion", Rdireccion);
		 datos.append("Remail", Remail);
		 datos.append("Rtelefono", Rtelefono);
		 datos.append("Rfax", Rfax);
		 datos.append("RDepartamento", RDepartamento);
		 datos.append("RProvincia", RProvincia);	
		 datos.append("RDistrito", RDistrito);
		 datos.append("Rrepresentante", Rrepresentante);

		$.ajax({
				url:"ajax/tramite.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					console.log(respuesta);

					if(respuesta != "error"){
						Swal.fire({
							icon: 'success',
							title: 'Se Guardo Correctamente',
							showConfirmButton: false,
							timer: 1500
						  })
						  
						$(".cerrarModal").click();

						$("#formulario .Iremitente").val(Rndoc);
						$("#formulario .IDREMITENTE").val(respuesta);
						$("#formulario .remitenetName").val(Rnombre);

						$("#modalAgregarRemitente .Rtipoper").val("");
						$("#modalAgregarRemitente .Rtipodoc").val("");
						$("#modalAgregarRemitente .Rndoc").val("");
						$("#modalAgregarRemitente .Rnombre").val("");
						$("#modalAgregarRemitente .Rdireccion").val("");
						$("#modalAgregarRemitente .Remail").val("");
						$("#modalAgregarRemitente .Rtelef").val("");
						$("#modalAgregarRemitente .Rfax").val("");
						$("#modalAgregarRemitente .Rdep").val("");
						$("#modalAgregarRemitente .Rprov").val("");
						$("#modalAgregarRemitente .Rdistr").val("");
						$("#modalAgregarRemitente .Rrepresentante").val("");

					}else{

						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Algo Salio Mal!'
						  })
					}

				}

		})

	}else{
		
		Swal.fire({
			icon: 'error',
			title: 'Llenar todos los campos obligatorios',
			text: 'Algo Salio Mal!'
		})

		return;
	}

})


$(".Iremitente").change(function(){

	$(".alert").remove();

	var remitente = $(this).val();

	var datos = new FormData();
	datos.append("validarRemitente", remitente);

	 $.ajax({
	    url:"ajax/tramite.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

    		if(respuesta.length == 0){

				$(".RegNRem").click();
	    		$(".Iremitente").val("");
				$("#modalAgregarRemitente .Rndoc").val(remitente);

    		}else{

				$("#formulario .IDREMITENTE").val(respuesta[0]["idRemitente"]);
				$("#formulario .remitenetName").val(respuesta[0]["nombre"]);

			}

	    }

   	})

})