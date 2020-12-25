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
                usuarios.nombre,
                usuarios.apellido,
                autolavado.fecha
            FROM autolavado 
                INNER JOIN cliente ON autolavado.idcliente = cliente.id 
                INNER JOIN empleado ON autolavado.idempleado = empleado.id
                INNER JOIN usuarios ON empleado.idusuario = usuarios.id";
$ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tablaAutoLavado").DataTable();
        $("#btnImprimirAutoLavado").click(function (e) {
            window.open("php/imprimir/dineroIngresado.php","","fullscreen");
        })
    });
</script>
<div class="row">
    <div class='col-12' style='text-align: center; '>
        <button type='button' class='btn btn-success' id='btnImprimirAutoLavado'> Imprimir </button>
    </div>
</div>
<br>
<table id='tablaAutoLavado' class='display'>
    <thead>
        <th>Id</th>
        <th>Empleado</th>
        <th>Cliente</th>
        <th>Encargado responsable</th>
        <th>Tamaño</th>
        <th>Precio</th>
        <th>Fecha</th>
    </thead>
    <?php
    while ($fila=$ejecutarConsulta->fetch_array()){
        $nombreEmpleado= $fila[1].' '.$fila[2];
        $nombreCliente=$fila[3].' '.$fila[4];
        $nombreEncargado=$fila[7].' '.$fila[8];
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
        <td><?php echo $nombreEncargado?></td>
        <td><?php echo $tamano?></td>
        <td><?php echo $fila[6]?></td>
        <td><?php echo $fila[9]?></td>
    </tr>
    <?php
    }
    ?>
</table>
<br>