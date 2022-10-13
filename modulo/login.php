<?php
require 'conexion.php';
sleep(2);
$usuarios = $mysqli->query("SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."'
AND contra = '".$_POST['contra']."'");
if($usuarios->num_rows==1){
    $datos = $usuarios->fetch_assoc();
    $_SESSION['usuario'] = $datos;
    // print_r ($_SESSION['usuario']['id']);

    echo json_encode(array('error'=>false,'nombre'=>$datos['nombre']));

}else{
    echo json_encode(array('error'=>true));
}

$mysqli->close();
