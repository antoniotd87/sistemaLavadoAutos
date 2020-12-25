<?php
/* 
    Este archivo consulta a la base de datos los empleados, 
    Y los muestra en la tabla
*/
include "conexion.php";
$consultaSQL="SELECT * from usuarios where tipo = '2'";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaEncargado").DataTable();
        $("#btnNuevoEncargado").click(function (e) {
            $("#divMostrarEncargados").hide("fast");
            $("#frmEncargado").show("fast");
        })
    });
</script>
<div class="row">
    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-primary' id='btnNuevoEncargado'> Nuevo </button>
    </div>
</div>
<br>
<table id='tablaEncargado' class='display'>
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Telefono</th>
        <th>Correo</th>
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
        <td>
            <p class='btn btn-danger' onclick='eliminarEncargado(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning'
                onclick='editarEncargado("<?php echo $fila[0]?>","<?php echo $fila[1]?>","<?php echo $fila[2]?>",
                "<?php echo $fila[3]?>","<?php echo $fila[4]?>","<?php echo $fila[5]?>")'>Editar</p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>