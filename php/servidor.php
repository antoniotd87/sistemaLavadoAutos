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

    //Operaciones del Encargado

    /* 
    Codigo que permite guardar el empleado en la base de datos
    */
    case 'agregarEmpleado':
        $clave=$_GET["clave"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $fecha = date("Y-m-d");
        $idusuario=(int)$_SESSION['user'][0];
        $sql="INSERT into empleado values (0,$idusuario,'$clave','$nombre','$apellido','$telefono','$fecha')";
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
        $fecha = date("Y-m-d");
        $sql="INSERT into cliente values (0,'$clave','$nombre','$apellido','$telefono','$fecha')";
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
        $fecha = date("Y-m-d");
        $sql="INSERT into autolavado values (0,'$idcliente','$idempleado','$tamano','$precio','$fecha')";
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

    /* 
        Este codigo de encarga de devolver la informacion del cliente que fue a lavar su auto
    */
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

    /* 
        Este codigo de encarga de devolver la informacion del empleado que va a lavar el auto
    */
    case 'buscarEmpleado';
        $clave=$_GET["clave"];
        $idusuario=(int)$_SESSION['user'][0];
        $sql="SELECT * FROM empleado 
                INNER JOIN usuarios ON usuarios.id = empleado.idusuario 
                WHERE empleado.clave = '$clave' AND usuarios.id = $idusuario";
        $result = mysqli_query($conexion, $sql);
        $datosCliente =  mysqli_fetch_row($result);
        if($datosCliente != []){
            echo $datosCliente[0].'&'.$datosCliente[3].' '.$datosCliente[4].' ';
        }else{
        }
    break;

    /* 
        Codifo que ferifica si un usuario a lavado suato 5 veces
    */
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



    /* 
        Codigo que permite pagarle a un empleado con su respectiva
        comision de 5% de su salario por cada auto lavado
    */
    case 'pagarEmpleado';
        $id=$_GET["id"];
        $result = mysqli_query($conexion,"SELECT COUNT(*) from autolavado where idempleado = '$id'");
        $row=mysqli_fetch_array($result);
        $numeroAutosLavados= $row['COUNT(*)'];
        $cantidadPagada = 600 + ((600 * 0.05)*$numeroAutosLavados);
        $fecha = date("Y-m-d");
        $sql="INSERT into pagoempleado values (0,'$id','$cantidadPagada','$fecha')";
        $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar el pago".$conexion->error);
        if ($ejecutarSQL) {
            echo "1";
        }
        else
        {
            echo "0";
        } 
    break;
    
    /* 
        Codigo para eliminar pago al empleado
    */
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



    /* 
        Codigo para agregar un gasto de el local
    */
    case 'agregarGasto':
        $descripcion=$_GET["descripcion"];
        $cantidad=$_GET["cantidad"];
        $fecha = date("Y-m-d");
        $idusuario=(int)$_SESSION['user'][0];
        $sql="INSERT into gasto values (0,$idusuario,'$descripcion','$cantidad','$fecha')";
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
        Codigo para editar un gasto de el local
    */
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

    /* 
        Codigo para eliminar un gasto de el local
    */
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



    /* 
        Codigo para agregar un producto al inventario
    */
    case 'agregarInventario':
        $producto=$_GET["producto"];
        $cantidad=$_GET["cantidad"];
        $precio=$_GET["precio"];
        $fecha = date("Y-m-d");
        $idusuario=(int)$_SESSION['user'][0];
        $sql="INSERT into producto values (0,$idusuario,'$producto','$cantidad','$precio','$fecha')";
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
        Codigo para ditar un producto del inventario
    */
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

    /* 
        Codigo para eliminar un producto al inventario
    */
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


    //Operaciones del administrador
    
    /* 
    Codigo que permite guardar el empleado en la base de datos
    */
    case 'agregarEncargado':
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $email=$_GET["email"];
        $pass=$_GET["pass"];
        $fecha = date("Y-m-d");
        $sql="INSERT into usuarios values (0,'$nombre','$apellido','$telefono', '$email', '$pass',2,'$fecha')";
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
    case 'editarEncargado':
        $id = $_GET["id"];
        $nombre=$_GET["nombre"];
        $apellido=$_GET["apellido"];
        $telefono=$_GET["telefono"];
        $email=$_GET["email"];
        $pass=$_GET["telefono"];
        $sql="UPDATE usuarios set nombre='$nombre',apellido='$apellido',
        telefono='$telefono', email='$email', pass='$pass' where id='$id'";
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
    case 'eliminarEncargado';
        $id=$_GET["id"];
        $sql="DELETE from usuarios where id='$id'";
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
        AQUI SE DESTRYE LA SESION PARA QUE EL USUARIO, AL SALIR, YA NO PUEDA VOLVER
        A ENTRAR HASTA QUE INGRESE SUS DATOS
    */
    case 'salir':
        session_destroy();
        echo '1';
    break;
    }
?>