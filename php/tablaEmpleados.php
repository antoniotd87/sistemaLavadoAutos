<?php
/* 
    Este archivo consulta a la base de datos los empleados, 
    Y los muestra en la tabla
*/
include "conexion.php";
session_start();
$idusuario=(int)$_SESSION['user'][0];
$consultaSQL="SELECT
empleado.id, 
            empleado.clave,empleado.nombre,
            empleado.apellido,empleado.telefono,
            empleado.fecha 
            from empleado 
            INNER JOIN usuarios 
            ON empleado.idusuario = usuarios.id 
            WHERE usuarios.id = $idusuario";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaEmpleado").DataTable();
        $("#btnNuevoEmpleado").click(function (e) {
            $("#divMostrarEmpleados").hide("fast");
            $("#frmEmpleado").show("fast");
        })
    });
</script>
<div class="row">
    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-primary' id='btnNuevoEmpleado'> Nuevo </button>
    </div>
</div>
<br>
<table id='tablaEmpleado' class='display'>
    <thead>
        <th>Id</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Telefono</th>
        <th>Registro</th>
        <th>Pagar</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1]?></td>
        <td><?php echo $fila[2]?></td>
        <td><?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td><?php echo $fila[5]?></td>
        <td>
            <p class='btn btn-info' onclick='pagarEmpleado(<?php echo $fila[0]?>)'>Pagar</p>
        </td>
        <td>
            <p class='btn btn-danger' onclick='eliminarEmpleado(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning'
                onclick='editarEmpleado("<?php echo $fila[0]?>","<?php echo $fila[1]?>",
                "<?php echo $fila[2]?>","<?php echo $fila[3]?>","<?php echo $fila[4]?>")'>Editar</p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>