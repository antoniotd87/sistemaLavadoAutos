<?php
/* 
    Este archivo consulta a la base de datos los pagos e los empleados, 
    Y los muestra en la tabla
*/
include "conexion.php";
session_start();
$idusuario=(int)$_SESSION['user'][0];
$consultaSQL="SELECT 
                pagoempleado.id, 
                empleado.nombre,
                empleado.apellido,
                pagoempleado.cantidad,
                pagoempleado.fecha
            FROM pagoempleado 
                INNER JOIN empleado 
                ON pagoempleado.idempleado = empleado.id
                INNER JOIN usuarios 
                ON empleado.idusuario = usuarios.id
            WHERE usuarios.id = $idusuario";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaPagoEmpleado").DataTable();
    });
</script>
<br>
<table id='tablaPagoEmpleado' class='display'>
    <thead>
        <th>Id</th>
        <th>Empleado</th>
        <th>Cantidad pagada</th>
        <th>Registro</th>
        <th>Eliminar</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1].' '.$fila[2]?></td>
        <td>$ <?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td>
            <p class='btn btn-danger' onclick='eliminarPagoEmpleado(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>