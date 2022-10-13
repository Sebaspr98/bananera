<?php
    include('modulo/conexion.php');
    header('Content-Type: application/json');
    // $datos = array("nombre"=>$_GET["nombre"]." mosquera","id"=>$_GET["id"]);
    $id = ($_SESSION['usuario']['id']);
    $query = "SELECT * FROM notas where id_usuario = $id";
    $result_notas = mysqli_query($mysqli, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result_notas)) {
        array_push ( $data , $row );
    }
    echo json_encode( array("error"=>mysqli_errno($mysqli),"message"=>"Todo bien","data"=>$data) );