<?php
/* 
    Este archivo consulta a la base de datos los pagos e los empleados, 
    Y los muestra en la tabla
*/
include "conexion.php";
$consultaSQL="SELECT 
                    pagoempleado.id, 
                    empleado.nombre,
                    empleado.apellido,
                    pagoempleado.cantidad,
                    usuarios.nombre,
                    usuarios.apellido,
                    pagoempleado.fecha 
            FROM pagoempleado 
                INNER JOIN empleado 
                ON pagoempleado.idempleado = empleado.id
                INNER JOIN usuarios 
                ON empleado.idusuario = usuarios.id";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaPagoEmpleado").DataTable();
        $("#btnImprimirPagoEmpleado").click(function (e) {
            window.open("php/imprimir/pagosEmpleados.php","","fullscreen");
        })
    });
</script>
<div class="row justify-content-center">
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-success' id='btnImprimirPagoEmpleado'> Imprimir </button>
    </div>
</div>
<br>
<table id='tablaPagoEmpleado' class='display'>
    <thead>
        <th>Id</th>
        <th>Empleado</th>
        <th>Cantidad pagada</th>
        <th>Responsable</th>
        <th>Fecha</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1].' '.$fila[2]?></td>
        <td>$ <?php echo $fila[3]?></td>
        <td><?php echo $fila[4].' '.$fila[5]?></td>
        <td><?php echo $fila[6]?></td>
    </tr>
    <?php
    }
    ?>
</table>