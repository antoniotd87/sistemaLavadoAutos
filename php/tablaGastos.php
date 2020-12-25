<?php
/* 
    Este archivo consulta a la base de datos los gastos, 
    Y los muestra en la tabla
*/
include "conexion.php";
session_start();
$idusuario=(int)$_SESSION['user'][0];
$consultaSQL="SELECT * from gasto 
    INNER JOIN usuarios 
        ON gasto.idusuario = usuarios.id
        WHERE usuarios.id = $idusuario";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaGastos").DataTable();
        $("#btnNuevoGastos").click(function (e) {
            $("#divMostrarGastos").hide("fast");
            $("#frmGasto").show("fast");
        });
    });
</script>
<div class="row justify-content-center">
    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-primary' id='btnNuevoGastos'> Nuevo </button>
    </div>
</div>
<br>
<table id='tablaGastos' class='display'>
    <thead>
        <th>Id</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Registro</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[2]?></td>
        <td><?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td>
            <p class='btn btn-danger' onclick='eliminarGastos(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning' onclick='editarGasto(
                "<?php echo $fila[0]?>",
                "<?php echo $fila[2]?>",
                "<?php echo $fila[3]?>"
                )'>
                Editar
            </p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>