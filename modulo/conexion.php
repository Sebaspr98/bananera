<?php
    session_start();

    $mysqli = @new mysqli('localhost','root','','usuario');
    if($mysqli->connect_errno){
        echo "ERROR AL CONECTARSE CON MySQL DEBIDO AL ERROR".$conn->connect_errno;
    }

    
    

	// setlocale(LC_ALL,"es_CO.utf8");
	// header("content-type:application/json;charset-utf8");
	// $host = "127.0.0.1";
	// $user = "root";
	// $pass = "";
	// $bd = "usuario";
    // $conn = @new mysqli($host,$user,$pass,$bd);
    // if($conn->connect_errno){
    //     echo "ERROR AL CONECTARSE CON MySQL DEBIDO AL ERROR".$conn->connect_errno;
    // }
?>