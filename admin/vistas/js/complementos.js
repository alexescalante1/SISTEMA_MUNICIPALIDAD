
$(function () {

  $('.select2').select2()
  $(".select2-selection").css("border", "2px solid #cecece");

  $("#tablaPublicacion").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaPublicacion_wrapper .col-md-6:eq(0)');

  $("#tablaPvideo").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "colvis"]
  }).buttons().container().appendTo('#tablaPvideo_wrapper .col-md-6:eq(0)');

  $("#tablaCarrrusel").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "colvis"]
  }).buttons().container().appendTo('#tablaCarrrusel_wrapper .col-md-6:eq(0)');

  $("#tablaAdmin").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaAdmin_wrapper .col-md-6:eq(0)');


  $("#tablaDoc").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaDoc_wrapper .col-md-6:eq(0)');

});







/*
$("#refress").click(function(){
    
    $('#RecargarCole').load('vistas/modulos/tablas/admision.php');

});

$(document).ready(function(){
    setInterval(
    function(){
      $('#RecargarCole').load('vistas/modulos/tablas/admision.php');
    },2000
    );
});

*/