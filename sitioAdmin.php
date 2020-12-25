<?php 
/* 
    AQUI VERIFICACMOS SI SE HA INICIADO SESION
    EN CASO DE QUE SI, VERIFICAMOS QUE SEA UN USUARIO DE TIPO 1 QUE ES EL ADMINISTRADOR
    EN CASO DE QUE NO HAYA INICIADO SESION O NO SE A UN ADMINISTRADOR
    SE LE REDIRIGE A LA PANTALLA DE LOGIN
*/
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['user'][6]!='1'){
            session_destroy();
            header("Location: index.php");
        }
    }else{
        session_destroy();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Lavado</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/alertify.core.css">
    <link rel="stylesheet" href="lib/css/alertify.default.css">
    <link rel="stylesheet" href="lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="lib/css/iconos.css">
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/alertify.js"></script>
    <script src="lib/js/jquery.dataTables.min.js"></script>
    <script src="js/funcionesAdministrador.js"></script>
</head>

<body  class = "bg-light">
    <header id="barra">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/iconoCarro.png" width="30" height="30" class="d-inline-block align-top" alt=""
                        loading="lazy">
                    <p class="d-inline">El Carrito Feliz</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionEncargado()'>Encargados</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionPagos()'>Pagos a empleados</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionDinero()'>Dinero ingresado</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionGastos()'>Gastos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- sE COLCA EL NOMBRE DE EL USUARIO QUE INGRESO -->
                                <?php echo $_SESSION['user'][1].' '.$_SESSION['user'][2]?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" onclick='cerrarSesion()'>
                                <a class="dropdown-item" href="#">Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br>
<!-- Seccion de Inicio -->
<main role="main" id="inicio">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Sistema El Carrito Feliz!</h1>
        <h3>Administrador</h3>
        <p>Este sistema permite la automatizacion de el proceso de gestion de autolavado, administracion de empleados, clientes y el seguimiento de los 
            gastos y pagos a empleados
        </p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="assets/Coche.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Autos pequeños</h5>
                    <p class="card-text">El lavado de autos pequeños, regularmente los coches, tienen un precio de $ 120 pesos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="assets/Camioneta.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Autos medianos</h5>
                    <p class="card-text">El lavado de autos medianos, de tipo camioneta, tienen un precio de $ 200 pesos</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="assets/Camion.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Camiones</h5>
                    <p class="card-text">El lavado de vehiculos grandes, de tipo camion, tienen un precio de $ 400 pesos</p>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->

</main>
    <div class="container">
        <div id="sectionEncargado" style="display:none;">
            <h2 class="text-center">Encargados</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                    <form action="" method="post" id="frmEncargado" style="display:none">
                        <div id="id" class="d-none"></div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreEncargado" class="form-control"
                                placeholder="Ingrese el nombre del Encargado">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" name="apellido" id="apellidoEncargado" class="form-control"
                                placeholder="Ingrese los apellidos del Encargado">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="telefonoEncargado" class="form-control"
                                placeholder="Ingrese el telefono del Encargado">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Correo</label>
                            <input type="email" name="apellido" id="emailEncargado" class="form-control"
                                placeholder="Ingrese el correo del Encargado">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Contraseña</label>
                            <input type="text" name="apellido" id="passwordEncargado" class="form-control"
                                placeholder="Ingrese la contraseña del Encargado">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarEncargado" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarEncargado" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <br>
                <div id="divMostrarEncargados" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionPagosEmpleados" style="display:none;">
            <h2 class="text-center">Pagos a empleados</h2>
            <div class="row justify-content-center">
                <div id="divMostrarPagosEmpleados" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionDineroIngresado" style="display:none;">
            <h2 class="text-center">Dinero Ingresado</h2>
            <div class="row justify-content-center">
                <div id="divMostrarDineroIngresado" class="col-10"></div>
            </div>
        </div>
        <div id="sectionGastos" style="display:none;">
            <h2 class="text-center">Gastos</h2>
            <br>
            <div class="row justify-content-center" id="divMostrarGastos">
            </div>
        </div>
    </div>
</body>
</html>