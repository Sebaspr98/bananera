<?php
include("conexion.php");
if ($mysqli->connect_errno) {
    $json = array(
        "error" => 500,
        "titulo" => "Error del servidor",
        "mensaje" => "hay un error en la conexión " . $mysqli->connect_error,
        "tipo" => "error"
    );
} else {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $sql = "INSERT INTO usuarios (nombre,usuario,contra) 
                VALUES ('$nombre','$usuario','$contra');";
    if ($mysqli->query($sql) === TRUE) {
        $_SESSION['message'] = 'Ya estas registrado '.$nombre;
        $_SESSION['message_type'] = 'success';
        header("Location: ../index.php");
    } else {
        $json = array(
            "error" => 204,
            "titulo" => "Error de Validación",
            "mensaje" => "Ocurrió un error " . $mysqli->error,
            "tipo" => "warning"
        );
    }
    $mysqli->close();
}
echo json_encode($json);
