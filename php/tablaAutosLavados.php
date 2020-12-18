<?php
/* 
    Este archivo consulta a la base de datos los autos lavados, 
    ademas de traer el empleado y el cliente correspondiente
    Y los muestra en la tabla
*/
include "conexion.php";
$consultaSQL="SELECT 
                autolavado.id, 
                empleado.nombre,
                empleado.apellido,
                cliente.nombre,
                cliente.apellido, 
                autolavado.tamano, 
                autolavado.precio,
                empleado.id,
                empleado.clave,
                cliente.id,
                cliente.clave
            FROM autolavado 
                INNER JOIN cliente ON autolavado.idcliente = cliente.id 
                INNER JOIN empleado ON autolavado.idempleado = empleado.id";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaAutoLavado").DataTable();
        $("#btnImprimirAutoLavado").click(function (e) {
            alert('Imprimiendo')
        })
        $("#btnNuevoAutoLavado").click(function (e) {
            $("#divMostrarAutoLavados").hide("fast");
            $("#frmAutoLavado").show("fast");
        })
    });
</script>
<div class="row">
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-info' id='btnNuevoAutoLavado'> Nuevo </button>
    </div>
    <div class='col-6' style='text-align: center; '>
        <button type='button' class='btn btn-success' id='btnImprimirAutoLavado'> Imprimir </button>
    </div>
</div>
<br>
<table id='tablaAutoLavado' class='display'>
    <thead>
        <th>Id</th>
        <th>Empleado</th>
        <th>Cliente</th>
        <th>Tamaño</th>
        <th>Precio</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
        $nombreEmpleado= $fila[1].' '.$fila[2];
        $nombreCliente=$fila[3].' '.$fila[4];
        $tamano='';
        switch($fila[5]){
            case 'S':
                $tamano = 'Coche';
                break;
            case 'M':
                $tamano = 'Camioneta';
                break;
            case 'L':
                $tamano = 'Camion';
                break;
        }
    ?>
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $nombreEmpleado?></td>
        <td><?php echo $nombreCliente?></td>
        <td><?php echo $tamano?></td>
        <td><?php echo $fila[6]?></td>
        <td>
            <p class='btn btn-danger' onclick='eliminarAutoLavado(<?php echo $fila[0]?>)'>Eliminar</p>
        </td>
        <td>
            <p class='btn btn-warning' onclick='editarAutoLavado(
                "<?php echo $fila[0]?>",
                "<?php echo $nombreEmpleado?>",
                "<?php echo $fila[7]?>",
                "<?php echo $fila[8]?>",
                "<?php echo $nombreCliente?>",
                "<?php echo $fila[9]?>",
                "<?php echo $fila[10]?>",
                "<?php echo $fila[5]?>",
                "<?php echo $fila[6]?>"
                )'>
                Editar
            </p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<br>