<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de Sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?>

    <h1>Iniciar Sesion</h1>
    <span>o <a href="signup.php">Registrar Aspirante</a></span>
    <form action="login.php" method="post">
    <input type="text" name="curp" placeholder="CURP">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="submit" value="Iniciar">
    </form>

</body>
</html>