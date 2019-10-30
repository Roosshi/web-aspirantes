<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, curp, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITH | Registro de Aspirantes</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['curp']; ?>
      <br>Haz sido registrado, cierra sesión en
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?>
      <h1>Por favor, selecciona una opción</h1>

      <a href="login.php">Iniciar Sesión</a> o
      <a href="signup.php">Registrar Aspirante</a>
    <?php endif; ?>
  </body>
</html>
