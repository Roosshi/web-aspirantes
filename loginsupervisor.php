<?php

  session_start();

  if (isset($_SESSION['admin_id'])) {
    header('Location: /web-aspirantes');
  }
  require 'database.php';

  if (!empty($_POST['nocontrol']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, nocontrol, password FROM admin WHERE nocontrol = :nocontrol');
    $records->bindParam(':nocontrol', $_POST['nocontrol']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['admin_id'] = $results['id'];
        header("Location: /web-aspirantes");
      } else{
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Inicio de Sesión</h1>
    

    <form action="loginsupervisor.php" method="POST">
      <input name="nocontrol" type="text" placeholder="NOCONTROL">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Ingresar">
    </form>
  </body>
</html>