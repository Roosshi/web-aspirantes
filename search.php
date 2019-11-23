<?php
  session_start();

	require 'database.php';
	
	require 'queries.php';
	//Obtiene la lista de aspirantes de la bd y la asigna a $results
	$results = obtenerAspirantes($conn);

	//Busca el usuario actual y lo asigna a $user
	$user = obtenerUsuarioActual($results);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ITH | Gestor de Busqueda</title>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>
		<?php require 'Menu.html' ?>

		<?php
			if(!($user['tipo'] == 'aspirante')):
		?>

			<h1>Buscar aspirantes</h1>

			<div class="container">
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
	</body>
</html>