<?php
  session_start();

  $USER_ID = $_SESSION['user_id']; 
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITH | Verificacion de datos del aspirante</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
    crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'Menu.html' ?>
    
    <?php if(!empty($user)):?>
        
      <h1>Aspirantes</h1>

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
            <!-- PHP aqui para llenar la tabla con rows de la base de datos. -->
            <?php

//$sql = "SELECT id,curp, nombres, apellido_paterno, apellido_materno, carrera FROM users WHERE id = ?";
$tipousuario = "SELECT tipo FROM users WHERE id = ?";

$consultatipo = $conn->prepare($tipousuario);
$consultatipo->execute(array($USER_ID));
$tipo = $consultatipo->fetch(PDO::FETCH_ASSOC);


if($tipo['tipo'] == "administrador"){
$sql = "SELECT * FROM users";
$consulta = $conn->prepare($sql);

$consulta->execute();
}else{
  $sql = "SELECT id,curp, nombres, apellido_paterno, apellido_materno, carrera FROM users WHERE id = ?";
  $consulta = $conn->prepare($sql);
  $consulta->execute(array($USER_ID));
}


 while($mostrar = $consulta->fetch(PDO::FETCH_ASSOC)){
    
    ?>
    
        <tr >
            <td  ><?php echo $mostrar['id']?></td>
            <td  ><?php echo $mostrar['curp']?></td>
            <td  ><?php echo $mostrar['nombres']?></td>
            <td ><?php echo $mostrar['apellido_paterno']?></td>
            <td  ><?php echo $mostrar['apellido_materno']?></td>
            <td  ><?php echo $mostrar['carrera']?></td>
        </tr>
        <?php
        }
        ?>
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