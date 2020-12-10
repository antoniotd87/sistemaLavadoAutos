<?php
include "conexion.php";
session_start();
$accion=$_GET["accion"];
switch ($accion) {
    case 'validarIngreso':
        $email = $_GET['email'];
        $password = $_GET['password'];
        $tipo = $_GET['tipo'];
        $sql="SELECT * FROM usuarios WHERE email = '$email' AND pass = '$password' AND tipo = '$tipo'";
        $result = mysqli_query($conexion, $sql);
        $datosUsuario =  mysqli_fetch_row($result);
        if($datosUsuario != []){
            $_SESSION['user']= $datosUsuario;
            echo $datosUsuario[6];
        }else{
            echo "0";
        }
    break;
    case 'salir':
        session_destroy();
        echo '1';
    break;
    }
?>