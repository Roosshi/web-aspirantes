<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros de Aspirante</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?>

    <h1>Registro de Aspirantes</h1>
    <span>o <a href="login.php">Iniciar Sesion</a></span>
    
    <form action="signup.php" method="post">
    <input type="text" name="apellidopaterno" placeholder="Apellido Paterno">
    <input type="text" name="apellidomaterno" placeholder="Apellido Materno">
    <input type="text" name="nombreaspirante" placeholder="Nombre">
    <input type="text" name="carrera" placeholder="Carrera">
    <input type="text" name="curp" placeholder="CURP">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="submit" value="Registrar">
    </form>
    
</body>
</html>