<?php
include "conexion.php";
$consultaSQL="SELECT * from cliente";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaCliente").DataTable();
        $("#btnImprimirCliente").click(function (e) {
            alert('Imprimiendo')
        })
        $("#btnNuevoCliente").click(function (e) {
            $("#divMostrarClientes").hide("fast");
            $("#frmCliente").show("fast");
        })
    });
</script>
<div class="row">
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-info' id='btnNuevoCliente'> Nuevo </button>
    </div>
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-success' id='btnImprimirCliente'> Imprimir </button>
    </div>
</div>
<br>
<table id='tablaCliente' class='display'>
    <thead>
        <th>Id</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Telefono</th>
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
            <p class='btn btn-danger' onclick='eliminarCliente(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning'
                onclick='editarCliente("<?php echo $fila[0]?>","<?php echo $fila[1]?>","<?php echo $fila[2]?>",
                "<?php echo $fila[3]?>","<?php echo $fila[4]?>")'>Editar</p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<br>