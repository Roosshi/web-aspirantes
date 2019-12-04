<?php
    function obtenerAspirantes($conn){
        $records = $conn->prepare('SELECT * FROM users');
        $records->execute();
        return $records->fetchall(PDO::FETCH_ASSOC);
    }

    function obtenerAspirante($conn, $id){
        $records = $conn->prepare('SELECT * FROM users WHERE id = :id');
        $records->bindParam(':id', $id);
        $records->execute();
        return $records->fetch(PDO::FETCH_ASSOC);
    }

    function obtenerAdministradores($conn){
        $records = $conn->prepare('SELECT * FROM admin');
        $records->execute();
        return $records->fetchall(PDO::FETCH_ASSOC);
    }

    function obtenerAdministrador($conn, $id){
        $records = $conn->prepare('SELECT * FROM admin WHERE id = :id');
        $records->bindParam(':id', $id);
        $records->execute();
        return $records->fetch(PDO::FETCH_ASSOC);
    }
?>