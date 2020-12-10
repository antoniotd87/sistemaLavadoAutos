<?php
$server="localhost";
$user="root";
$password="";
$bd="sistemaauto";
$conexion=new mysqli($server,$user,$password,$bd) or die ("Error al conectarse con la base de datos".$mysqli->error);
?>