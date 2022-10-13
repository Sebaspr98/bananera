<?php
    include ("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM notas WHERE id = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
            die("Query failed");
        }

        $_SESSION['message'] = 'Tarea removida';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php"); 
    }
?>