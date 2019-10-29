<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /web-aspirantes');
  }
  require 'database.php';

  if (!empty($_POST['curp']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, curp, password FROM users WHERE curp = :curp');
    $records->bindParam(':curp', $_POST['curp']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /web-aspirantes");
    } else {
      $message = 'Sus datos están incorrectos';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Inicio de Sesión</h1>
    <span>o <a href="signup.php">Registrar</a></span>

    <form action="login.php" method="POST">
      <input name="curp" type="text" placeholder="CURP">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Ingresar">
    </form>
  </body>
</html>
