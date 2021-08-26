 <?php

$admins = ControladorAdministradores::ctrMostrarAdministradores(null,null);
$url = Ruta::ctrRutaServidor();

?>

<!--=====================================
ÚLTIMOS admins
======================================-->

<!-- USERS LIST -->
<div class="card">
	<div class="card-header">
	<h3 class="card-title">Ultimos admins</h3>

	<div class="card-tools">
		<span class="badge badge-danger">8 New Members</span>
		<button type="button" class="btn btn-tool" data-card-widget="collapse">
		<i class="fas fa-minus"></i>
		</button>
		<button type="button" class="btn btn-tool" data-card-widget="remove">
		<i class="fas fa-times"></i>
		</button>
	</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body p-0">
	<ul class="users-list clearfix">

		<?php

			if(count($admins) > 8){
				$totaladmins = 8;
			}else{
				$totaladmins = count($admins);
			}

			for($i = 0; $i < $totaladmins; $i ++){

				if($admins[$i]["foto"] != ""){
					echo '
					<li>
						<img src="'.$url.$admins[$i]["foto"].'" alt="User Image">
						<a class="users-list-name" href="#">'.$admins[$i]["nombre"].'</a>
						<span class="users-list-date">Hoy</span>
					</li>
					';

				}else{
					echo '
					<li>
						<img src="vistas/img/perfiles/default/anonymous.png" alt="User Image">
						<a class="users-list-name" href="#">'.$admins[$i]["nombre"].'</a>
						<span class="users-list-date">Hoy</span>
					</li>
					';
				}

			}

	    ?> 

	</ul>
	<!-- /.users-list -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer text-center">
	<a href="perfiles">View All Users</a>
	</div>
	<!-- /.card-footer -->
</div>
<!--/.card -->