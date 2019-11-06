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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITH | Verificacion de datos del aspirante</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?>
    
    <?php if(!empty($user)):?>
        
        <h1>Aspirantes</h1>
        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre(s)</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Curp</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">13</th>
                <td>Martin Francisco</td>
                <td>Hurtado</td>
                <td>Arellano</td>
                <td>HUAM951008HSRRRR09</td>
              </tr>
            </tbody>
          </table>

        </div>

    <?php else:
        // Redirige al Login si no ha iniciado sesion.
        header("Location: /web-aspirantes/login.php")
    ?>
    <?php endif;?>

</body>
</html>