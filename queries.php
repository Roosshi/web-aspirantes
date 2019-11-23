<?php
    function obtenerAspirantes($conn){
        $records = $conn->prepare('SELECT * FROM users WHERE tipo = \'aspirante\'');
        $records->execute();
        return $records->fetchall(PDO::FETCH_ASSOC);
    }

    function obtenerUsuarios($conn){
        $records = $conn->prepare('SELECT * FROM users');
        $records->execute();
        return $records->fetchall(PDO::FETCH_ASSOC);
    }

    function obtenerUsuarioActual($results){
        foreach ($results as $result) {
            if ($result['id'] == $_SESSION['user_id']) {
                return $result;
            }
        }
    }

?>