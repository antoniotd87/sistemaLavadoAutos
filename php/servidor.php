<?php
/* 
    EL SERVIDOR ES QUE REALIZA LAS ACCIONES QUE SOLICITE EL CLIENTE
*/
include "conexion.php";
session_start();
$accion=$_GET["accion"];
switch ($accion) {
    /* 
        AQUI SE REALIZA LA VALIDACIONDEL TIPO DE USUARIO
        SE CONSULTAN LOS DATOS EN LA BASE DE DATOS Y SE REGRESA EL TIPO DE USUARIO
        PARA VALIDAR SI ES ADMINISTRADOR O ENCARGADO
    */
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
    /* 
        AQUI SE DESTRYE LA SESION PARA QUE EL USUARIO, AL SALIR, YA NO PUEDA VOLVER
        A ENTRAR HASTA QUE INGRESE SUS DATOS
    */
    case 'salir':
        session_destroy();
        echo '1';
    break;
    }
?>