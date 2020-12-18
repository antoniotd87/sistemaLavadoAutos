<?php
include "conexion.php";
$consultaSQL="SELECT * from producto";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaInventario").DataTable();
        $("#btnImprimirInventario").click(function (e) {
            alert('Imprimiendo')
        })
        $("#btnNuevoInventario").click(function (e) {
            $("#divMostrarInventarios").hide("fast");
            $("#frmInventario").show("fast");
        })
    });
</script>
<div class="row justify-content-center">
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-info' id='btnNuevoInventario'> Nuevo </button>
    </div>
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-success' id='btnImprimirInventario'> Imprimir </button>
    </div>
</div>
<br>
<table id='tablaInventario' class='display'>
    <thead>
        <th>Id</th>
        <th>Empleado</th>
        <th>Cantidad</th>
        <th>Precio</th>
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
        <td>
            <p class='btn btn-danger' onclick='eliminarInventario(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning' onclick='editarInventario(
                "<?php echo $fila[0]?>",
                "<?php echo $fila[1]?>",
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