<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM users WHERE id = :id');
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    
    <?php if(!empty($user)): ?>
      <?php require 'Menu.html' ?>
      <br> Bienvenido <?= $user['nombres']; ?>
      <br> Haz sido registrado,
      
      <a href="checkup.php">Verifica tus datos</a> o
      <a href="logout.php"> Cierra sesión </a>
    <?php else: ?>
      <h1>Por favor, selecciona una opción</h1>

      <a href="login.php">Iniciar Sesión</a> o
      <a href="signup.php">Registrar Aspirante</a>
    <?php endif; ?>
  </body>
</html>
