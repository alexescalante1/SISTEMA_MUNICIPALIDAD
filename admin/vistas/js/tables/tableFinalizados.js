function viewTable(respuesta){

	var textBody = '';
	var textHead = `
	<thead>
		<tr>
			<th style="width:10px">COD</th>
			<th style="width:30px">MODO</th>
			<th style="width:80px">TIPO</th>
			<th style="width:30px">NUM</th>
			<th>ASUNTO</th>
			<th>REMITENTE</th>
			<th style="width:100px">FECHA</th>
			<th style="width:10px">OP</th>
		</tr>
	</thead>`;
	var textFoot = `
	<tfoot>
		<tr>
			<th>COD</th>
			<th>MODO</th>
			<th>TIPO</th>
			<th>NUM</th>
			<th>ASUNTO</th>
			<th>REMITENTE</th>
			<th>FECHA</th>
			<th>OP</th>
		</tr>
	</tfoot>`;

	for(var i = 0; i < respuesta.length; i++){

		textBody = textBody + `
		<tr>
			<td>`+respuesta[i][1]+`</td>
			<td>`+respuesta[i][2]+`</td>
			<td>`+respuesta[i][3]+`</td>
			<td>`+respuesta[i][4]+`</td>
			<td>`+respuesta[i][7]+`</td>
			<td>`+respuesta[i][5]+`</td>
			<td>`+respuesta[i]["fecha"]+`</td>
			<td><div class="btn-group"><a href='`+URLADMIN+respuesta[i][8]+`' class='btn btn-info' >PDF</a><button class="btn btn-success btnVerDoc" idDocumentos="`+respuesta[i][0]+`" data-toggle="modal" data-target="#modalVerDoc"><i class="fa fa-eye"></i></button></div></td>
		</tr>`;

	}

	$("#viewTabla").html('<table id="TablaAjax" class="table table-bordered table-striped">'+textHead+'<tbody>'+textBody+'</tbody>'+textFoot+'</table>');

	$("#TablaAjax").DataTable({
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["excel", "print", "colvis"]
	}).buttons().container().appendTo('#TablaAjax_wrapper .col-md-6:eq(0)');
	
}

function PagClick(pag, total){

	$(".Tpage").click(function(){

		var Tin = $(this).attr("Tdin");

		traerDocSeg(Tin, total);

	})

}

function viewTablePag(pag, total){
	
	var pagination = '';
	var entero = Math.floor( total/10 );
	var resto = total%10;
	
	pag = (pag/10);
	if(resto != 0){
		entero += 1;
	}

	for(var i = 0; i < entero; i++){

		if(i==pag){
			pagination += `
				<li class="paginate_button page-item active">
				<a Tdin = "" class="page-link">`+(i+1)+`</a>
				</li>
			`;
		}else{
			pagination += `
				<li class="paginate_button page-item">
				<a Tdin = "`+(i*10)+`" class="page-link Tpage">`+(i+1)+`</a>
				</li>
			`;
		}

	}

	//console.log(pag+"=="+total);
	//console.log(entero+"=="+resto);

	$('.dataTables_filter .form-control').on('input', function(){
		
		if($(this).val()==""){
			$(".pagination").html('<ul class="pagination">'+pagination+'</ul>');
			PagClick(pag, total)
		}else{
			$(".pagination").html('');
			PagClick(pag, total)
		}

	});

	$('.sorting').on("click", function(){
		$(".pagination").html('<ul class="pagination">'+pagination+'</ul>');
		PagClick(pag, total)
	})

	$(".pagination").html('<ul class="pagination">'+pagination+'</ul>');
	PagClick(pag, total)

}

function viewDoc(){

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
						
			}
	
		})
	
	})
}

function traerDocSeg(pag, total){

	var datos2 = new FormData();
	datos2.append("viewSeg", 1);
	datos2.append("modo", "ASC");
	datos2.append("base", pag);
	datos2.append("tope", 10);
	$.ajax({
		url:"ajax/tramite.ajax.php",
		method: "POST",
		data: datos2,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		timeout: 60000,
		success: function(respuesta){
			
			console.log(respuesta);

			viewTable(respuesta);
			
			viewTablePag(pag, total);

			viewDoc();
			
		},error: function(jqXHR, textStatus, errorThrown) {
			if(textStatus==="timeout") {
				alert("Call has timed out");
			} else { 
				alert("Another error was returned");
			}
		}

	})

}

$(function () {
	
	var datos = new FormData();
	datos.append("viewBdj", 1);
	$.ajax({
		url:"ajax/tramite.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			traerDocSeg(0,respuesta);
			
		}

	})

});
