<?php
/* 
    Este archivo consulta a la base de datos los productos, 
    Y los muestra en la tabla
*/
include "conexion.php";
session_start();
$idusuario=(int)$_SESSION['user'][0];
$consultaSQL="SELECT * from producto INNER JOIN usuarios 
ON producto.idusuario = usuarios.id
WHERE usuarios.id = $idusuario";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaInventario").DataTable();
        $("#btnNuevoInventario").click(function (e) {
            $("#divMostrarInventarios").hide("fast");
            $("#frmInventario").show("fast");
        })
    });
</script>
<div class="row justify-content-center">
    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-primary' id='btnNuevoInventario'> Nuevo </button>
    </div>
</div>
<br>
<table id='tablaInventario' class='display'>
    <thead>
        <th>Id</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
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
        <td><?php echo $fila[5]?></td>
        <td>
            <p class='btn btn-danger' onclick='eliminarInventario(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning' onclick='editarInventario(
                "<?php echo $fila[0]?>",
                "<?php echo $fila[2]?>",
                "<?php echo $fila[3]?>",
                "<?php echo $fila[4]?>"
                )'>
                Editar
            </p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>