<?php
/* 
ESTE ES EL CODIGO QUE SE UTILIZA PARA 
CREAR LA CONEXION A LA BASE DE DATOS 
*/
$server="localhost";
$user="root";
$password="";
$bd="sistemaauto";
$conexion=new mysqli($server,$user,$password,$bd) or die ("Error al conectarse con la base de datos".$mysqli->error);
?>