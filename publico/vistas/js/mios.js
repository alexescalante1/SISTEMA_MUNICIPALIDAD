/*=============================================
MIGAS DE PAN
=============================================*/

var pagActiva = $(".pagActiva").html();

if(pagActiva != null){

	var regPagActiva = pagActiva.replace(/-/g, " ");

	$(".pagActiva").html(regPagActiva);

}

/*=============================================
ENLACES PAGINACIÓN
=============================================*/

var url = window.location.href;

var indice = url.split("/");

var pagActual =indice[6];

if(isNaN(pagActual)){

   $("#item1").addClass("active");

}else{

   $("#item"+pagActual).addClass("active");
   
 
}


