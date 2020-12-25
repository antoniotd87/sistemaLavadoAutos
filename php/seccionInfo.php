<?php

/* 
    Este archivo muestra la informacion de los empleados y de los autos lavados
*/

include "conexion.php";
$empleados = 50;
$autos = 25;
$dinero = 2250;
session_start();
$idusuario=(int)$_SESSION['user'][0];
$result = mysqli_query($conexion,"SELECT COUNT(*) 
                                    FROM empleado 
                                        INNER JOIN usuarios 
                                            ON usuarios.id = empleado.idusuario 
                                        WHERE usuarios.id = $idusuario");
$row=mysqli_fetch_array($result);
$empleados= $row['COUNT(*)'];

$result = mysqli_query($conexion,"SELECT COUNT(*) 
                                    FROM autolavado 
                                        INNER JOIN empleado 
                                            ON empleado.id = autolavado.idempleado 
                                        INNER JOIN usuarios ON usuarios.id = empleado.idusuario 
                                    WHERE usuarios.id = $idusuario");
$row=mysqli_fetch_array($result);
$autos= $row['COUNT(*)'];

/* 
    Aqui se calcula el dinero disponible,
    se trae el dinero delos autos lavados
    y despues se le resta el dinero de los gastos,
    de los pagos a empleados y del inventario de producto
*/
$dinero = 0;
$result = mysqli_query($conexion,"SELECT sum(precio) from autolavado
                                    INNER JOIN empleado 
                                            ON empleado.id = autolavado.idempleado 
                                        INNER JOIN usuarios ON usuarios.id = empleado.idusuario 
                                    WHERE usuarios.id = $idusuario");
$row=mysqli_fetch_array($result);
$dinero= $row['sum(precio)'];

$result = mysqli_query($conexion,"SELECT sum(cantidad) from pagoempleado
                                    INNER JOIN empleado 
                                            ON empleado.id = pagoempleado.idempleado 
                                        INNER JOIN usuarios ON usuarios.id = empleado.idusuario 
                                    WHERE usuarios.id = $idusuario");
$row=mysqli_fetch_array($result);
$dinero= $dinero - $row['sum(cantidad)'];

$result = mysqli_query($conexion,"SELECT sum(cantidad) from gasto
                                        INNER JOIN usuarios ON usuarios.id = gasto.idusuario 
                                    WHERE usuarios.id = $idusuario");
$row=mysqli_fetch_array($result);
$dinero= $dinero - $row['sum(cantidad)'];

$consultaSQL="SELECT * from producto
                INNER JOIN usuarios ON usuarios.id = producto.idusuario 
                WHERE usuarios.id = $idusuario";
$ejecutarConsulta=$conexion->query($consultaSQL);
while ($fila=$ejecutarConsulta->fetch_array()){
    $total = $fila[4]*$fila[3];
    $dinero= $dinero - $total;
}

/* 
    Despues se crean las secciones para mostrar esa informcacion
*/
?>
<div class="card border-primary col-3  mx-1">
    <div class="card-body">
        <h5 class="card-title"><?php echo $empleados?></h5>
        <p class="card-text">Empleados</p>
    </div>
</div>
<div class="card border-info col-3 mx-1">
    <div class="card-body">
        <h5 class="card-title"><?php echo $autos?></h5>
        <p class="card-text">Autos Lavados</p>
    </div>
</div>
<div class="card border-success col-3 mx-1">
    <div class="card-body">
        <h5 class="card-title">$ <?php echo $dinero?></h5>
        <p class="card-text">Dinero disponible</p>
    </div>
</div>