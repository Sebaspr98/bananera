<?php

include ("conexion.php");
    if(isset($_POST['save_task'])){
        $titulo = $_POST['title'];
        $description = $_POST['description'];
        $id = $_SESSION['usuario']['id'];
        $query = "INSERT INTO notas(titulo,texto,id_usuario) VALUES ('$titulo','$description','$id' )";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Tarea guardada';
        $_SESSION['message_type'] = 'success';

        header("location: index.php");
    }
?>