<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['nocontrol']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO admin (nocontrol, password, nombres, apellido_paterno, apellido_materno, tipo, carrera) 
    VALUES (:nocontrol, :password, :nombres, :apellido_paterno, :apellido_materno, 'supervisor', :carrera)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nocontrol', $_POST['nocontrol']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':nombres', $_POST['nombre']);
    $stmt->bindParam(':apellido_paterno', $_POST['apellidop']);
    $stmt->bindParam(':apellido_materno', $_POST['apellidom']);
    $stmt->bindParam(':carrera', $_POST['carrera']);
    
    if ($stmt->execute()) {
      $message = 'Se ha creado el usuario';
    } else {
      $message = 'Lo sentimos, hubo problemas al crear el usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUpSupervisor</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrar Supervisor</h1>

    <form action="signupsupervisor.php" method="POST">
      <input name="apellidop" type="text" placeholder="Apellido Paterno">
      <input name="apellidom" type="text" placeholder="Apellido Materno">
      <input name="nombre" type="text" placeholder="Nombre">
      <input name="carrera" type="text" placeholder="Carrera">
      <input name="nocontrol" type="text" placeholder="Nocontrol">
      <input name="password" type="password" placeholder="Contraseña">

      <input type="submit" value="Registrar">
    </form>

  </body>
</html>