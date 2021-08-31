


/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var dtsArchivo = null;

$(".archivo").change(function(){

	dtsArchivo = this.files[0];
	
	$(".fileButton").html(dtsArchivo["name"].substring(0, 40))
})

$(".Rtipoper").change(function(){

	if($(".Rtipoper").val() == "NATURAL"){
		$(".Rtipodoc").val("DNI");
	}else{
		$(".Rtipodoc").val("RUC");
	}

})

$(".guardarRemitente").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/
	if($(".Rtipoper").val() == ""){
		toastr.error('Seleccione Un Tipo de Remitente')
	}else if($(".Rndoc").val() == ""){
		toastr.error('Ingrese un Nume de Doc')
	}else if($(".Rndoc").val() != "" ){
		if($(".Rtipoper").val() == "NATURAL"){
			if($(".Rndoc").val().length != 8 ){
				toastr.error('El numero de documeto debe contener 8 digitos')
			}
		}else{
			if($(".Rndoc").val().length != 11 ){
				toastr.error('El numero de documeto debe contener 11 digitos')
			}
		}
	}
	
	if($(".Rnombre").val() == ""){
		toastr.error('Ingrese un Nombre')
	}else{
		
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
						$("#formulario #IDREMITENTE").val(respuesta);
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

	}

})


$(".Iremitente").change(function(){

	$(".alert").remove();

	if($(this).val().length != 8 && $(this).val().length != 11){
		toastr.error('El numero de documeto debe contener 8 o 11 digitos')
		return;
	}
	
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

				$("#formulario #IDREMITENTE").val(respuesta[0]["idRemitente"]);
				$("#formulario .remitenetName").val(respuesta[0]["nombre"]);

			}

	    }

   	})

})

$(".guardarDocumento").click(function(){

	var IDADMIN = $("#IDADMIN").val();
	var IDREMITENTE = $("#IDREMITENTE").val();
	var modoDoc = $(".modoDoc").val();
	var tipoDoc = $(".tipoDoc").val();
	var numDoc = $(".numDoc").val();
	var asuntoDoc = $(".asuntoDoc").val();
	var claseDoc = $(".claseDoc").val();
	var referenciaDoc = $(".referenciaDoc").val();
	var oficinaDoc = $(".oficinaDoc").val();
	var observacionesDoc = $(".observacionesDoc").val();
	var requicitosDoc = $(".requicitosDoc").val();
	var tiempoResDoc = $(".tiempoResDoc").val();
	var foliosDoc = $(".foliosDoc").val();

	if(tipoDoc == ""){
		toastr.error('Seleccione Un Tipo de Documento')
	}else if(IDREMITENTE == ""){
		toastr.error('Ingrese Un Remitente')
	}else if(asuntoDoc == ""){
		toastr.error('Ingrese Un Asunto')
	}else if(oficinaDoc == ""){
		toastr.error('Seleccione una oficina')
	}else{

		if(numDoc == ""){
			numDoc = "S/N";
		}
		
	 	var datos = new FormData();
		 datos.append("REGDOCIDADMIN", IDADMIN);
		 datos.append("IDREMITENTE", IDREMITENTE);
		 datos.append("modoDoc", modoDoc);
		 datos.append("tipoDoc", tipoDoc);
		 datos.append("numDoc", numDoc);
		 datos.append("asuntoDoc", asuntoDoc);
		 datos.append("claseDoc", claseDoc);
		 datos.append("referenciaDoc", referenciaDoc);
		 datos.append("oficinaDoc", oficinaDoc);
		 datos.append("observacionesDoc", observacionesDoc);
		 datos.append("requicitosDoc", requicitosDoc);	
		 datos.append("tiempoResDoc", tiempoResDoc);
		 datos.append("foliosDoc", foliosDoc);
		 datos.append("archivo", "");

		$.ajax({
				url:"ajax/tramite.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					dtsArchivo = "";

					if(respuesta != "error"){

						Swal.fire({
							title: 'Se Cambio Correctamente',
							icon: 'success',
							showConfirmButton: false,
							timer: 900
						  }).then((r) => {

								$(".AddArchivoR").click();
								$("#CODDOCUMENTO").val(respuesta);

								$("#MyCode").JsBarcode(respuesta,{displayValue:true,fontSize:20});
								
							  	//window.location = "regConTupa";
							
								

								$("#formulario .Iremitente").val("");
								$("#formulario #IDREMITENTE").val("");
								$("#formulario .remitenetName").val("");
								$("#formulario .modoDoc").val("SIN TUPA");
								$("#formulario .tipoDoc").val("");
								$("#formulario .numDoc").val("");
								$("#formulario .asuntoDoc").val("");
								$("#formulario .claseDoc").val("");
								$("#formulario .referenciaDoc").val("");
								$("#formulario .oficinaDoc").val("");
								$("#formulario .observacionesDoc").val("");
								$("#formulario .requicitosDoc").val("");
								$("#formulario .tiempoResDoc").val("");
								$("#formulario .foliosDoc").val("");

								

						  })

					}else{
						
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Algo Salio Mal!'
						  })

					}

				}

		})

	}

})

$(".guardarArchivo").click(function(){

	var CODDOCUMENTO = $("#CODDOCUMENTO").val();


	if(dtsArchivo == ""){
		
		Swal.fire({
			icon: 'error',
			title: 'SELECCIONE UN ARCHIVO',
			showConfirmButton: false,
			timer: 1500
		  })

	}else if(CODDOCUMENTO == ""){
		Swal.fire({
			icon: 'error',
			title: 'ERROR',
			showConfirmButton: false,
			timer: 1500
		  })
	}else{
		
	 	var datos = new FormData();
		 datos.append("CODDOCUMENTO", CODDOCUMENTO);
		 datos.append("archivo", dtsArchivo);

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
							title: 'Se Cambio Correctamente',
							icon: 'success',
							showConfirmButton: false,
							timer: 1000
						  }).then((r) => {

							dtsArchivo = "";
							$("#CODDOCUMENTO").val("");
							$(".fileButton").html('<i class="fas fa-file-image "></i> &nbsp; ADJUNTAR ARCHIVO PDF')
							$(".AddArchivoR").click();
							localStorage.removeItem("archivo");
							localStorage.clear();

						  })

					}else{
						
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Algo Salio Mal!'
						  })

					}

				}

		})

	}

})



/*=============================================
EDITAR PUBLICACION
=============================================*/
$(".btnVerDoc").click(function(){
//$('#tablaDocM').on("click", ".btnVerDoc", function(){

	
	var idDocumentos = $(this).attr("idDocumentos");
	console.log(idDocumentos);
	var datos = new FormData();
	datos.append("idDocumentos", idDocumentos);
	$.ajax({

		url:"ajax/tramite.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			console.log(respuesta);

			$("#modalVerDoc #IDADMIN").val(respuesta[0][13]);

			$("#modalVerDoc .remitenetName").val(respuesta[0][5]);
			$("#modalVerDoc .Iremitente").val(respuesta[0][6]);
			$("#modalVerDoc .modoDoc").val(respuesta[0][2]);
			$("#modalVerDoc .tipoDoc").val(respuesta[0]["tipodoc"]);
			$("#modalVerDoc .numDoc").val(respuesta[0]["numdoc"]);
			$("#modalVerDoc .asuntoDoc").val(respuesta[0]["asunto"]);
			$("#modalVerDoc .claseDoc").val(respuesta[0]["clase"]);
			$("#modalVerDoc .referenciaDoc").val(respuesta[0]["referencia"]);
			$("#modalVerDoc .oficinaDoc").val(respuesta[0][5]);
			$("#modalVerDoc .observacionesDoc").val(respuesta[0]["obserbaciones"]);
			$("#modalVerDoc .requicitosDoc").val(respuesta[0]["requicitos"]);
			$("#modalVerDoc .tiempoResDoc").val(respuesta[0]["tiempoRespuesta"]);
			$("#modalVerDoc .foliosDoc").val(respuesta[0]["folios"]);


			/*
			var IDADMIN = $("#IDADMIN").val();
			var IDREMITENTE = $("#IDREMITENTE").val();
			var modoDoc = $(".modoDoc").val();
			var tipoDoc = $(".tipoDoc").val();
			var numDoc = $(".numDoc").val();
			var asuntoDoc = $(".asuntoDoc").val();
			var claseDoc = $(".claseDoc").val();
			var referenciaDoc = $(".referenciaDoc").val();
			var oficinaDoc = $(".oficinaDoc").val();
			var observacionesDoc = $(".observacionesDoc").val();
			var requicitosDoc = $(".requicitosDoc").val();
			var tiempoResDoc = $(".tiempoResDoc").val();
			var foliosDoc = $(".foliosDoc").val();
			*/
					
		}

	})

})



console.log(URLADMIN);