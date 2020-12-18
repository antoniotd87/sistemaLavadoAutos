<?php
/* 
    Este archivo consulta a la base de datos los pagos e los empleados, 
    Y los muestra en la tabla
*/
include "conexion.php";
$consultaSQL="SELECT * from pagoempleado";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaPagoEmpleado").DataTable();
        $("#btnImprimirPagoEmpleado").click(function (e) {
            alert('Imprimiendo')
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
        <th>Eliminar</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1]?></td>
        <td><?php echo $fila[2]?></td>
        <td>
            <p class='btn btn-danger' onclick='eliminarPagoEmpleado(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>