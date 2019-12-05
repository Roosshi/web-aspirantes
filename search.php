<?php
  session_start();

	require 'database.php';
	require 'queries.php';
	
	$results = obtenerAspirantes($conn);

	$user = obtenerAdministrador($conn, $_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ITH | Gestor de Busqueda</title>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style-search.css">
	</head>

	<body>
		<?php require 'Menu.html' ?>

		<?php
			//if($_SESSION['id_admin']):
			if(true):
		?>


			<div class="container">
				<div class="row">
					<div class="col"><h1>Buscar aspirantes</h1></div>
					<div class="col">
						<div class="input-group mb-3">
							<input type="text" id="nombre" class="form-control" placeholder="Nombre del aspirante">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" onclick="buscarAspirante(nombre.value);" type="button">Buscar Aspirante</button>
							</div>
						</div>
					</div>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Curp</th>
							<th scope="col">Nombre(s)</th>
							<th scope="col">Apellido Paterno</th>
							<th scope="col">Apellido Materno</th>
							<th scope="col">Carrera</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($results as $result){ ?>
							<tr id=<?= $result['id'] ?> >
								<th scope="col"><?= $result['id'] ?></th>
								<th><?= $result['curp'] ?></th>
								<th><?= $result['nombres'] ?></th>
								<th><?= $result['apellido_paterno'] ?></th>
								<th><?= $result['apellido_materno'] ?></th>
								<th><?= $result['carrera'] ?></th>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<?php else:
			header("Location: /web-aspirantes")
		?>
		<?php endif; ?>

		<script src="./assets/js/search.js"></script>
	</body>
</html>