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
    Codigo que permite guardar el empleado en la base de datos
    */
    case 'agregarEmpleado':
        $clave=$_GET["clave"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $sql="INSERT into empleado values (0,'$clave','$nombre','$apellido','$telefono')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al empleado".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
        echo "0";
        }
    break;
    /* 
        Este codigo permite actualizar la informacion de un epleado a un empleado
    */
    case 'editarEmpleado':
        $id = $_GET["id"];
        $clave=$_GET["clave"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $sql="UPDATE empleado set clave='$clave', nombre='$nombre',apellido='$apellido',
        telefono='$telefono' where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al empleado".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        } 
        else
        {
            echo "0";
        }
    break;
    /* 
        codigo que permite eliminar el empleado
    */
    case 'eliminarEmpleado';
        $id=$_GET["id"];
        $sql="DELETE from empleado where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al empleado".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;

    /* 
    Codigo que permite guardar el cliente en la base de datos
    */
    case 'agregarCliente':
        $clave=$_GET["clave"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $sql="INSERT into cliente values (0,'$clave','$nombre','$apellido','$telefono')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
        echo "0";
        }
    break;
    /* 
        Este codigo permite actualizar la informacion de un cliente
    */
    case 'editarCliente':
        $id = $_GET["id"];
        $clave=$_GET["clave"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $sql="UPDATE cliente set clave='$clave', nombre='$nombre',apellido='$apellido',
        telefono='$telefono' where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        } 
        else
        {
            echo "0";
        }
    break;
    /* 
        codigo que permite eliminar el cliente
    */
    case 'eliminarCliente';
        $id=$_GET["id"];
        $sql="DELETE from cliente where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;


        /* 
    Codigo que permite guardar el auto lavado a la base de datos
    */
    case 'agregarAutoLavado':
        $idcliente=$_GET["idcliente"];
        $idempleado=$_GET["idempleado"];
        $tamano=$_GET["tamano"];
        $precio=$_GET["precio"];
        $sql="INSERT into autolavado values (0,'$idcliente','$idempleado','$tamano','$precio')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;
    /* 
        Este codigo permite actualizar la informacion de un auto lavado a la base de datos un empleado
    */
    case 'editarAutoLavado':
        $id = $_GET["id"];
        $idcliente=$_GET["idcliente"];
        $idempleado=$_GET["idempleado"];
        $tamano=$_GET["tamano"];
        $precio=$_GET["precio"];
        $sql="UPDATE autolavado set idempleado='$idempleado', idcliente='$idcliente',precio='$precio',
        tamano='$tamano' where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        } 
        else
        {
            echo "0";
        }
    break;
    /* 
        codigo que permite eliminar el un auto lavado
    */
    case 'eliminarAutoLavado';
        $id=$_GET["id"];
        $sql="DELETE from autolavado where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;


    case 'buscarCliente';
        $clave=$_GET["clave"];
        $sql="SELECT * FROM cliente WHERE clave = '$clave'";
        $result = mysqli_query($conexion, $sql);
        $datosCliente =  mysqli_fetch_row($result);
        if($datosCliente != []){
            echo $datosCliente[0].'&'.$datosCliente[2].' '.$datosCliente[3].' ';
        }else{
            
        }
    break;

    case 'buscarEmpleado';
        $clave=$_GET["clave"];
        $sql="SELECT * FROM empleado WHERE clave = '$clave'";
        $result = mysqli_query($conexion, $sql);
        $datosCliente =  mysqli_fetch_row($result);
        if($datosCliente != []){
            echo $datosCliente[0].'&'.$datosCliente[2].' '.$datosCliente[3].' ';
        }else{
        }
    break;

    case 'verificarLavadoGratis';
        $id=$_GET["id"];
        $sql="SELECT * FROM autolavado WHERE idcliente = '$id'";
        $ejecutarConsulta=$conexion->query($sql);
        $numeroAutosLavados=0;
        while ($fila=$ejecutarConsulta->fetch_array()){
            $numeroAutosLavados++;
        }
        echo $numeroAutosLavados;
    break;

    case 'pagarEmpleado';
        $id=$_GET["id"];
        $result = mysqli_query($conexion,"SELECT COUNT(*) from autolavado where idempleado = '$id'");
        $row=mysqli_fetch_array($result);
        $numeroAutosLavados= $row['COUNT(*)'];
        $cantidadPagada = 600 + ((600 * 0.05)*$numeroAutosLavados);
        
        $sql="INSERT into pagoempleado values (0,'$id','$cantidadPagada')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;
    case 'eliminarPagoEmpleado';
        $id=$_GET["id"];
        $sql="DELETE from pagoempleado where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;

    case 'eliminarPagoEmpleado';
        $id=$_GET["id"];
        $sql="DELETE from pagoempleado where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;
    case 'agregarGasto':
        $descripcion=$_GET["descripcion"];
        $cantidad=$_GET["cantidad"];
        $sql="INSERT into gasto values (0,'$descripcion','$cantidad')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al empleado".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
        echo "0";
        } 
    break;

    case 'editarGasto':
        $id = $_GET["id"];
        $descripcion=$_GET["descripcion"];
        $cantidad=$_GET["cantidad"];
        $sql="UPDATE gasto set descripcion='$descripcion', cantidad='$cantidad' where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        } 
        else
        {
            echo "0";
        }
    break;

    case 'eliminarGasto';
        $id=$_GET["id"];
        $sql="DELETE from gasto where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        }
    break;

    case 'agregarInventario':
        $producto=$_GET["producto"];
        $cantidad=$_GET["cantidad"];
        $precio=$_GET["precio"];

        $sql="INSERT into producto values (0,'$producto','$cantidad','$precio')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al empleado".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
        echo "0";
        }
    break;

    case 'editarInventario':
        $id = $_GET["id"];
        $producto=$_GET["producto"];
        $cantidad=$_GET["cantidad"];
        $precio=$_GET["precio"];
        $sql="UPDATE producto set nombre='$producto', cantidad='$cantidad',  precio='$precio' where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        } 
        else
        {
            echo "0";
        }
    break;

    case 'eliminarInventario';
        $id=$_GET["id"];
        $sql="DELETE from producto where id='$id'";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar al cliente".
        $conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
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