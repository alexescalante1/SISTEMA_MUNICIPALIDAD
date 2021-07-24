/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaProductos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

/*=============================================
RUTA ARTICULO
=============================================*/

function limpiarURL(texto){
	var texto = texto.toLowerCase(); 
	texto = texto.replace(/[á]/g, 'a');
	texto = texto.replace(/[é]/g, 'e');
	texto = texto.replace(/[í]/g, 'i');
	texto = texto.replace(/[ó]/g, 'o');
	texto = texto.replace(/[ú]/g, 'u');
	texto = texto.replace(/[ñ]/g, 'n');
	texto = texto.replace(/ /g, "-");
	texto = texto.replace(/'/g, "");
	texto = texto.replace(/"/g, "");
	texto = texto.replace(/”/g, "");
	texto = texto.replace(/“/g, "");
	texto = texto.replace(/¨/g, "");
	texto = texto.replace(/´/g, "");
	texto = texto.replace(/[@ªº!|@·#$~%€&¬/()=?¿'¡çÇ}`+¨*:;.,]/g, "");
	return texto;
  }
  

$(".tituloPublicacion").change(function(){
  
	  $(".rutaPublicacion").val(limpiarURL($(".tituloPublicacion").val()));

})

$(".tituloPublicacionE").change(function(){
  
	$(".rutaPublicacionE").val(limpiarURL($(".tituloPublicacionE").val()));

})

$(".tituloCimagen").change(function(){
  
	$(".rutaCimagen").val(limpiarURL($(".tituloCimagen").val()));

})

$(".tituloGerencia").change(function(){
  
	$(".rutaGerencia").val(limpiarURL($(".tituloGerencia").val()));

})

$(".tituloGerenciaE").change(function(){
  
	$(".rutaGerenciaE").val(limpiarURL($(".tituloGerenciaE").val()));

})

/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayMFiles = [];

$(".multimediaAdd").dropzone({

	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 10,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayMFiles.push(file);

			//console.log("arrayFiles", arrayMFiles);

		})

		this.on("removedfile", function(file){

			var index = arrayMFiles.indexOf(file);

			arrayMFiles.splice(index, 1);

			//console.log("arrayFiles", arrayMFiles);

		})

	}

})


/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var imagenFotoPrincipalA = null;

$(".fotoPrincipalA").change(function(){

	imagenFotoPrincipalA = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenFotoPrincipalA["type"] != "image/jpeg" && imagenFotoPrincipalA["type"] != "image/png"){

  		$(".fotoPrincipalA").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagenFotoPrincipalA["size"] > 5000000){

  		$(".fotoPrincipalA").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenFotoPrincipalA);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPrincipalA").attr("src", rutaImagen);

  		})

  	}

})





/*=============================================
GUARDAR EL PUBLICACION
=============================================*/

var multimediaArticulo = null;	

$(".guardarPublicacion").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".tituloPublicacion").val() != "" &&
	   $(".seleccionarCategoria").val() != "" &&
	   $(".descripcionPublicacion").val() != ""){

		
		if(arrayMFiles.length > 0 && $(".rutaPublicacion").val() != ""){

			var listaMultimedia = [];
			var finalFor = 0;

			for(var i = 0; i < arrayMFiles.length; i++){

				var datosMultimedia = new FormData();
				datosMultimedia.append("fileM", arrayMFiles[i]);
				datosMultimedia.append("rutaM", $(".rutaPublicacion").val());

				$.ajax({
					url:"ajax/publicacion.ajax.php",
					method: "POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){

						$(".modal-footer .preload").html(`


							<center>

								<img src="vistas/img/plantilla/status.gif" id="status" />
								<br>

							</center>

						`);

					},
					success: function(respuesta){

						$("#status").remove();
						
						listaMultimedia.push({"foto" : respuesta.substr(3)})
						multimediaArticulo = JSON.stringify(listaMultimedia);

						if(multimediaArticulo == null){

							Swal.fire({
								icon: 'error',
								title: 'El campo de multimedia no debe estar vacío',
								text: 'Algo Salio Mal!'
							})

							return;

						}

						if((finalFor + 1) == arrayMFiles.length){

							agregarMiPublicacion(multimediaArticulo);
							finalFor = 0;

						}

						finalFor++;

					}

				})

			}

		}

	}else{
		
		Swal.fire({
			icon: 'error',
			title: 'Llenar todos los campos obligatorios',
			text: 'Algo Salio Mal!'
		})

		return;
	}

})




function agregarMiPublicacion(imagen){

		/*=============================================
		ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
		=============================================*/

		var tituloPublicacion = $(".tituloPublicacion").val();
		var rutaPublicacion = $(".rutaPublicacion").val();
	   	var seleccionarCategoria = $(".seleccionarCategoria").val();
	    var descripcionPublicacion = $(".descripcionPublicacion").val();
	    var pClavesPublicacion = $(".pClavesPublicacion").val();
	    var Departamento = $(".Departamento").val();
	    var Provincia = $(".Provincia").val();
		var Distrito = $(".Distrito").val();

		
		tituloPublicacion = tituloPublicacion.replace(/'/g,"&#39")
		tituloPublicacion = tituloPublicacion.replace(/"/g,"&#34")
		tituloPublicacion = tituloPublicacion.replace(/”/g,"&#8221")
		tituloPublicacion = tituloPublicacion.replace(/“/g,"&#8220")
		tituloPublicacion = tituloPublicacion.replace(/¨/g,"&#168")
		tituloPublicacion = tituloPublicacion.replace(/´/g,"&#180")

		descripcionPublicacion = descripcionPublicacion.replace(/'/g,"&#39")
		descripcionPublicacion = descripcionPublicacion.replace(/"/g,"&#34")
		descripcionPublicacion = descripcionPublicacion.replace(/”/g,"&#8221")
		descripcionPublicacion = descripcionPublicacion.replace(/“/g,"&#8220")
		descripcionPublicacion = descripcionPublicacion.replace(/¨/g,"&#168")
		descripcionPublicacion = descripcionPublicacion.replace(/´/g,"&#180")
	
	 	var datosArticulo = new FormData();
		 datosArticulo.append("tituloPublicacion", tituloPublicacion);
		 datosArticulo.append("rutaPublicacion", rutaPublicacion);
		 datosArticulo.append("seleccionarCategoria", seleccionarCategoria);
		 datosArticulo.append("descripcionPublicacion", descripcionPublicacion);
		 datosArticulo.append("pClavesPublicacion", pClavesPublicacion);
		 datosArticulo.append("Departamento", Departamento);
		 datosArticulo.append("Provincia", Provincia);
		 datosArticulo.append("Distrito", Distrito);	

		 datosArticulo.append("multimedia", imagen);
		 datosArticulo.append("fotoPrincipal", imagenFotoPrincipalA);

		$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datosArticulo,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){

						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = "publicacion";
							}
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












/*=============================================
EDITAR PUBLICACION
=============================================*/

$('#tablaPublicacion').on("click", ".btnEditarPublicacion", function(){
	
	$(".previsualizarImgAdd").html("");

	var idPublicar = $(this).attr("idPublicar");
	
	var datos = new FormData();
	datos.append("idPublicar", idPublicar);
	$.ajax({

		url:"ajax/publicacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#modalEditarPublicacion .idPublicar").val(respuesta[0]["idPublicar"]);
			$("#modalEditarPublicacion .tituloPublicacionE").val(respuesta[0]["titulo"]);
			$("#modalEditarPublicacion .rutaPublicacionE").val(respuesta[0]["ruta"]);
			$("#modalEditarPublicacion .descripcionPublicacion").val(respuesta[0]["descripcion"]);
			$("#modalEditarPublicacion .pClavesPublicacion").val(respuesta[0]["palabrasClave"]);
			$("#modalEditarPublicacion .seleccionarCategoria").val(respuesta[0]["categoria"]);
			$("#modalEditarPublicacion .Departamento").val(respuesta[0]["departamento"]);
			$("#modalEditarPublicacion .Provincia").val(respuesta[0]["provincia"]);
			$("#modalEditarPublicacion .Distrito").val(respuesta[0]["distrito"]);

			//$("#modalEditarPublicacion .optionEditarCategoria").html(respuesta["idCategoria"]);

			$("#modalEditarPublicacion .previsualizarPrincipalA").attr("src", respuesta[0]["portada"]);
			$("#modalEditarPublicacion .antiguaFotoPrincipalA").val(respuesta[0]["portada"]);
			
			if(respuesta[0]["multimedia"] != ""){
				
				var imagenesMultimedia = JSON.parse(respuesta[0]["multimedia"]);
				
				for(var i = 0; i < imagenesMultimedia.length; i++){

					$(".previsualizarImgAdd").append(

							'<div class="col-md-3">'+
							'<div class="thumbnail text-center">'+
								'<img class="imagenesRestantes" src="'+imagenesMultimedia[i].foto+'" style="width:100%;border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">'+
								'<div class="removerImagen" style="cursor:pointer">Remove file</div>'+
							'</div>'+

							'</div>'

					);

					localStorage.setItem("multimediaAdd", JSON.stringify(imagenesMultimedia));

				}		

				/*=============================================
				CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
				=============================================*/

				$(".removerImagen").click(function(){

					$(this).parent().parent().remove();

					var imagenesRestantes = $(".imagenesRestantes");
					var arrayImgRestantes = [];

					for(var i = 0; i < imagenesRestantes.length; i++){
						
						arrayImgRestantes.push({"foto":$(imagenesRestantes[i]).attr("src")})
						
					}

					localStorage.setItem("multimediaAdd", JSON.stringify(arrayImgRestantes));
					
				})

			}



			/*=============================================
			GUARDAR CAMBIOS DE PUBLICACION
			=============================================*/	

			var multimediaArticulo = null;	

			$(".guardarCambiosPublicacion").click(function(){

					/*=============================================
					PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
					=============================================*/
					

					if($("#modalEditarPublicacion .tituloPublicacionE").val() != "" && 
					   $("#modalEditarPublicacion .seleccionarCategoria").val() != "" && 
					   $("#modalEditarPublicacion .descripcionPublicacion").val() != ""){

							
						if(arrayMFiles.length > 0 && $("#modalEditarPublicacion .rutaPublicacionE").val() != ""){

							var listaMultimedia = [];
							var finalFor = 0;

							for(var i = 0; i < arrayMFiles.length; i++){
								
								var datosMultimedia = new FormData();
								datosMultimedia.append("fileM", arrayMFiles[i]);
								datosMultimedia.append("rutaM", $("#modalEditarPublicacion .rutaPublicacionE").val());

								$.ajax({
									url:"ajax/publicacion.ajax.php",
									method: "POST",
									data: datosMultimedia,
									cache: false,
									contentType: false,
									processData: false,
									beforeSend: function(){

										$(".modal-footer .preload").html(`


											<center>

												<img src="vistas/img/plantilla/status.gif" id="status" />
												<br>

											</center>

										`);

									},
									success: function(respuesta){

										$("#status").remove();

										listaMultimedia.push({"foto" : respuesta.substr(3)});
										multimediaArticulo = JSON.stringify(listaMultimedia);
										
										if(localStorage.getItem("multimediaAdd") != null){

											var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaAdd"));

											var jsonMultimediaAdd = listaMultimedia.concat(jsonLocalStorage);

											multimediaArticulo = JSON.stringify(jsonMultimediaAdd);												
										}

										if(multimediaArticulo == null){

											Swal.fire({
												icon: 'error',
												title: 'El campo de multimedia no debe estar vacío',
												text: 'Algo Salio Mal!'
											  })

											return;
										}

										if((finalFor + 1) == arrayMFiles.length){

											editarPublicacion(multimediaArticulo);
											finalFor = 0;

										}

										finalFor++;							
							
									}

								})

							}

						}else{
				
							var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaAdd"));

							multimediaArticulo = JSON.stringify(jsonLocalStorage);

							editarPublicacion(multimediaArticulo);										
							
						}

					}else{

						Swal.fire({
							icon: 'error',
							title: 'Llenar todos los campos obligatorios',
							text: 'Algo Salio Mal!'
						  })
						 
						return;

					}					

			})
					
		}

	})

})






function editarPublicacion(imagen){

	var idPublicar = $("#modalEditarPublicacion .idPublicar").val();
	var tituloPublicacion = $("#modalEditarPublicacion .tituloPublicacionE").val();
	var rutaPublicacion = $("#modalEditarPublicacion .rutaPublicacionE").val();
	var seleccionarCategoria = $("#modalEditarPublicacion .seleccionarCategoria").val();
	var descripcionPublicac = $("#modalEditarPublicacion .descripcionPublicacion").val();
	var pClavesPublicacion = $("#modalEditarPublicacion .pClavesPublicacion").val();
	var departamento = $("#modalEditarPublicacion .Departamento").val();
	var provincia = $("#modalEditarPublicacion .Provincia").val();
	var distrito = $("#modalEditarPublicacion .Distrito").val();
	var antiguaFotoPrincipalA = $("#modalEditarPublicacion .antiguaFotoPrincipalA").val();

	var datosPubl = new FormData();
	datosPubl.append("idMPublicac", idPublicar);
	datosPubl.append("editarPublicac", tituloPublicacion);
	datosPubl.append("rutaPublicac", rutaPublicacion);
	datosPubl.append("seleccionarCategoria", seleccionarCategoria);	
	datosPubl.append("descripcionPublicac", descripcionPublicac);	
	datosPubl.append("pClavesPublicac", pClavesPublicacion);
	datosPubl.append("depart", departamento);
	datosPubl.append("provin", provincia);
	datosPubl.append("distri", distrito);

	if(imagen == null){

		multimediaArticulo = localStorage.getItem("multimediaAdd");
		datosPubl.append("multimedia", multimediaArticulo);

	}else{

		datosPubl.append("multimedia", imagen);
	}	

	datosPubl.append("fotoPrincipal", imagenFotoPrincipalA);
	datosPubl.append("antiguaFotoPrincipalA", antiguaFotoPrincipalA);

	$.ajax({
			url:"ajax/publicacion.ajax.php",
			method: "POST",
			data: datosPubl,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta == "ok"){

					Swal.fire({
						title: 'Se Cambio Correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					  }).then((result) => {
						if (result.isConfirmed) {
						  localStorage.removeItem("multimediaAdd");
						  localStorage.clear();
						  window.location = "publicacion";
						}
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


/*=============================================
ELIMINAR PUBLICAC
=============================================*/

$('#tablaPublicacion').on("click", ".btnEliminarPublicacion", function(){

	var idPublicacion = $(this).attr("idPublicar");
	var rutaCabecera = $(this).attr("rutaCabecera");
	var imgPrincipal = $(this).attr("imgPrincipal");
	
	console.log(idPublicacion);
	console.log(rutaCabecera);
	console.log(imgPrincipal);

	
	Swal.fire({
		title: 'Esta Seguro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar!'
	  }).then((result) => {
		if (result.isConfirmed) {

			//window.location = "index.php?ruta=articulos&idArticulo="+idArticulo+"&rutaCabecera="+rutaCabecera+"&imgPrincipal="+imgPrincipal;
			var datos = new FormData();
			datos.append("idEPublicacion", idPublicacion);
			datos.append("rutaCabecera", rutaCabecera);
			datos.append("imgPrincipal", imgPrincipal);
			$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					
					if(rsp == "ok"){
						
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((res) => {
							if (res.isConfirmed) {
							  window.location = "publicacion";
							}
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
	
  
})





/*=============================================
GUARDAR VIDEO
=============================================*/


$(".guardarPvideo").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".tituloPvideo").val() != "" &&
	   $(".seleccionarCategoriaV").val() != "" &&
	   $(".enlaceVideo").val() != ""){

		agregarPvideo();

	}else{
		
		Swal.fire({
			icon: 'error',
			title: 'Llenar todos los campos obligatorios',
			text: 'Algo Salio Mal!'
		})

		return;
	}

})


function agregarPvideo(){

	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
	=============================================*/

	var tituloPvideo = $(".tituloPvideo").val();
	var enlaceVideo = $(".enlaceVideo").val();
	var seleccionarCategoriaV = $(".seleccionarCategoriaV").val();
	
	tituloPvideo = tituloPvideo.replace(/'/g,"&#39")
	tituloPvideo = tituloPvideo.replace(/"/g,"&#34")
	tituloPvideo = tituloPvideo.replace(/”/g,"&#8221")
	tituloPvideo = tituloPvideo.replace(/“/g,"&#8220")
	tituloPvideo = tituloPvideo.replace(/¨/g,"&#168")
	tituloPvideo = tituloPvideo.replace(/´/g,"&#180")

	 var datosPv = new FormData();
	 datosPv.append("tituloPvideo", tituloPvideo);
	 datosPv.append("enlaceVideo", enlaceVideo);
	 datosPv.append("seleccionarCategoriaV", seleccionarCategoriaV);

	$.ajax({
			url:"ajax/publicacion.ajax.php",
			method: "POST",
			data: datosPv,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					Swal.fire({
						title: 'Se Guardo Correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					  }).then((result) => {
						if (result.isConfirmed) {
						  window.location = "pvideos";
						}
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

/*=============================================
ELIMINAR VIDEO
=============================================*/

$('#tablaPvideo').on("click", ".btnEliminarVideo", function(){

	var idPvideo = $(this).attr("idPvideos");
	
	console.log(idPvideo);

	Swal.fire({
		title: 'Esta Seguro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar!'
	  }).then((result) => {
		if (result.isConfirmed) {

			var datos = new FormData();
			datos.append("idEPvideo", idPvideo);
			$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					
					if(rsp == "ok"){
						
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((res) => {
							if (res.isConfirmed) {
							  window.location = "pvideos";
							}
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
	
})


$('#ActDark').on('click', function () {
	var idAdmin = $('#IDADMINN').val();
	if ($(this).is(':checked')) {
		
		var datos = new FormData();
		datos.append("idAdmin", idAdmin);
			$.ajax({
	
			url:"ajax/publicacion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta=="ok"){$('body').addClass('dark-mode')}
				
			}
   
		 })

	} else {

		var datos = new FormData();
		datos.append("idAdmin", idAdmin);
			$.ajax({
	
			url:"ajax/publicacion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta=="ok"){$('body').removeClass('dark-mode')}
				
			}
   
		 })
		

	}
})


/*=============================================
GUARDAR CARRUSEL
=============================================*/


$(".guardarCimagen").click(function(){

	var tituloCimagen = $(".tituloCimagen").val();
	var rutaCimagen = $(".rutaCimagen").val();
	var Cprioridad = $(".Cprioridad").val();

	if($(".tituloCimagen").val() != "" &&
	   $(".Cprioridad").val() != ""){

		tituloCimagen = tituloCimagen.replace(/'/g,"&#39")
		tituloCimagen = tituloCimagen.replace(/"/g,"&#34")
		tituloCimagen = tituloCimagen.replace(/”/g,"&#8221")
		tituloCimagen = tituloCimagen.replace(/“/g,"&#8220")
		tituloCimagen = tituloCimagen.replace(/¨/g,"&#168")
		tituloCimagen = tituloCimagen.replace(/´/g,"&#180")

		var datosC = new FormData();
		datosC.append("tituloCimagen", tituloCimagen);
		datosC.append("rutaCimagen", rutaCimagen);
		datosC.append("Cprioridad", Cprioridad);
		datosC.append("fotoPrincipal", imagenFotoPrincipalA);

		$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datosC,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){

						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = "carrusel";
							}
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

	}else{
		
		Swal.fire({
			icon: 'error',
			title: 'Llenar todos los campos obligatorios'
		})

		return;
	}

})





/*=============================================
ELIMINAR CARRUSEL
=============================================*/

$('#tablaCarrrusel').on("click", ".btnEliminarCimagen", function(){

	var idCarrusel = $(this).attr("idCarrusel");
	var imgPrincipal = $(this).attr("imgPrincipal");

	Swal.fire({
		title: 'Esta Seguro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar!'
	  }).then((result) => {
		if (result.isConfirmed) {

			var datos = new FormData();
			datos.append("idECarrusel", idCarrusel);
			datos.append("imgPrincipal", imgPrincipal);
			$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					
					if(rsp == "ok"){
						
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((res) => {
							if (res.isConfirmed) {
							  window.location = "carrusel";
							}
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
	
  
})


/*=============================================
GUARDAR GERENCIA
=============================================*/

$(".guardarGerencia").click(function(){

	var tituloGerencia = $(".tituloGerencia").val();
	var rutaGerencia = $(".rutaGerencia").val();
	var nombreGerente = $(".nombreGerencia").val();
	var numContacto = $(".numContacto").val();

	if($(".tituloGerencia").val() != "" &&
	   $(".nombreGerencia").val() != "" &&
	   $(".numContacto").val() != ""){

		tituloGerencia = tituloGerencia.replace(/'/g,"&#39")
		tituloGerencia = tituloGerencia.replace(/"/g,"&#34")
		tituloGerencia = tituloGerencia.replace(/”/g,"&#8221")
		tituloGerencia = tituloGerencia.replace(/“/g,"&#8220")
		tituloGerencia = tituloGerencia.replace(/¨/g,"&#168")
		tituloGerencia = tituloGerencia.replace(/´/g,"&#180")

		var datosC = new FormData();
		datosC.append("tituloGerencia", tituloGerencia);
		datosC.append("rutaGerencia", rutaGerencia);
		datosC.append("nombreGerente", nombreGerente);
		datosC.append("numContacto", numContacto);
		datosC.append("fotoPrincipal", imagenFotoPrincipalA);

		$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datosC,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){

						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = "gerencias";
							}
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

	}else{
		
		Swal.fire({
			icon: 'error',
			title: 'Llenar todos los campos obligatorios'
		})

		return;
	}

})


/*=============================================
ELIMINAR GERENCIAS
=============================================*/

$('#tablaCarrrusel').on("click", ".btnEliminarGerencia", function(){

	var idGerencias = $(this).attr("idGerencias");
	var imgPrincipal = $(this).attr("imgPrincipal");

	Swal.fire({
		title: 'Esta Seguro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar!'
	  }).then((result) => {
		if (result.isConfirmed) {

			var datos = new FormData();
			datos.append("idEGerencias", idGerencias);
			datos.append("imgPrincipal", imgPrincipal);
			$.ajax({
				url:"ajax/publicacion.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					
					if(rsp == "ok"){
						
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((res) => {
							if (res.isConfirmed) {
							  window.location = "gerencias";
							}
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
	
  
})





/*=============================================
EDITAR GERENCIA
=============================================*/

$('#tablaCarrrusel').on("click", ".btnEditarGerencia", function(){
	
	$(".previsualizarImgAdd").html("");

	var idGerencias = $(this).attr("idGerencias");
	
	var datos = new FormData();
	datos.append("idGerencias", idGerencias);
	$.ajax({
		url:"ajax/publicacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#modalEditarGerencia .idGerencias").val(respuesta[0]["idGerencias"]);
			$("#modalEditarGerencia .tituloGerenciaE").val(respuesta[0]["titulo"]);
			$("#modalEditarGerencia .rutaGerenciaE").val(respuesta[0]["ruta"]);
			$("#modalEditarGerencia .nombreGerencia").val(respuesta[0]["encargado"]);
			$("#modalEditarGerencia .numContacto").val(respuesta[0]["contacto"]);

			$("#modalEditarGerencia .previsualizarPrincipalA").attr("src", respuesta[0]["portada"]);
			$("#modalEditarGerencia .antiguaFotoPrincipalA").val(respuesta[0]["portada"]);
			
			
					
		}

	})

})
