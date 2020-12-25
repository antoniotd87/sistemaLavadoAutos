<?php
/* 
    Este archivo consulta a la base de datos los gastos, 
    Y los muestra en la tabla
*/
include "conexion.php";
$consultaSQL="SELECT * from gasto 
    INNER JOIN usuarios 
        ON gasto.idusuario = usuarios.id";
$ejecutarConsulta=$conexion->query($consultaSQL);

$consultaSQL1="SELECT * from producto 
    INNER JOIN usuarios 
        ON producto.idusuario = usuarios.id";
$ejecutarConsulta1=$conexion->query($consultaSQL1);
?>

    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-info mb-3' id='btnGasto'> Gastos </button>
        <button type='button' class='btn btn-info mb-3' id='btnProducto'> Productos </button>
        <button type='button' class='btn btn-success mb-3' id='btnImprimirGastos'> Imprimir </button>
    </div>
    <div class="w-100 mb-5"></div>
    <div class="col-10 mb-5" id="gasto">
        <h4>Gastos del encargado</h4>
        <br>
        <table id='tablaGastos' class='display'>
            <thead>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Registro</th>
                <th>Encargado</th>
            </thead>
            <?php
            while ($fila=$ejecutarConsulta->fetch_array()){
            ?>
            <tr>
                <td><?php echo $fila[0]?></td>
                <td><?php echo $fila[2]?></td>
                <td><?php echo $fila[3]?></td>
                <td><?php echo $fila[4]?></td>
                <td><?php echo $fila[6].' '.$fila[7]?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="col-10" id="producto" style="display:none;">
        <h4>Gastos en productos</h4>
        <br>
        <table id='tablaProducto' class='display'>
            <thead>
                <th>Id</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Registro</th>
                <th>Encargado</th>
            </thead>
            <?php
            while ($fila=$ejecutarConsulta1->fetch_array()){
            ?>
            <tr>
                <td><?php echo $fila[0]?></td>
                <td><?php echo $fila[2]?></td>
                <td><?php echo $fila[3]*$fila[4]?></td>
                <td><?php echo $fila[5]?></td>
                <td><?php echo $fila[7].' '.$fila[8]?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaGastos").DataTable();
        $("#tablaProducto").DataTable();
        $("#btnImprimirGastos").click(function (e) {
            window.open("php/imprimir/gastos.php","","fullscreen");
        });
        $("#btnGasto").click(function (e) {
            $("#gasto").show("fast");
            $("#producto").hide("fast");
        });
        $("#btnProducto").click(function (e) {
            $("#gasto").hide("fast");
            $("#producto").show("fast");
        });
    });
</script>