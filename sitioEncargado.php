<?php 
/* 
    AQUI VERIFICACMOS SI SE HA INICIADO SESION
    EN CASO DE QUE SI, VERIFICAMOS QUE SEA UN USUARIO DE TIPO 2 QUE ES EL ENCARGADO
    EN CASO DE QUE NO HAYA INICIADO SESION O NO SEA UN ENCARGADO
    SE LE REDIRIGE A LA PANTALLA DE LOGIN
*/
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['user'][6]!='2'){
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
    <script src="js/funcionesEncargado.js"></script>
</head>

<body>
    <!-- Barra de navegacion -->
    <header id="barra">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
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
                            <a class="nav-link" href="#" onclick='mostrarSeccionEmpleados()'>Empleados</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionClientes()'>Clientes</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionAutos()'>Servicio de Lavado</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionPagos()'>Pagos a empleados</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionInventario()'>Inventario de
                                Productos</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick='mostrarSeccionGastos()'>Otros Gastos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="Encargado" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- sE IMPRIME EL USUARIO LOGUEADO -->
                                <?php echo $_SESSION['user'][1].' '.$_SESSION['user'][2]?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="Encargado">
                                <a class="dropdown-item" href="#" onclick='cerrarSesion()'>Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Seccion de Inicio -->
    <main role="main" id="inicio">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Sistema El Carrito Feliz!</h1>
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
    <br>

    <!-- Seccion de informacion -->
    <div class="container">
        <div class="row justify-content-center" id="seccionInfo" style="display: none;">
        </div>
    </div>
    <hr>
    <br>

    <!-- Cada una de las secciones del sistema -->
    <div class="container">
        <div id="sectionEmpleado" style="display: none;">
            <h2 class="text-center">Empleados</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                    <form action="" method="post" id="frmEmpleado" style="display: none;">
                        <div id="id" class="d-none"></div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" name="clave" id="claveEmpleado" class="form-control"
                                placeholder="Ingrese la clave del empleado">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreEmpleado" class="form-control"
                                placeholder="Ingrese el nombre del empleado">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" name="apellido" id="apellidoEmpleado" class="form-control"
                                placeholder="Ingrese los apellidos del empleado">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="telefonoEmpleado" class="form-control"
                                placeholder="Ingrese el telefono del empleado">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarEmpleado" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarEmpleado" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <br>
                <div id="divMostrarEmpleados" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionCliente" style="display: none;">
            <h2 class="text-center">Clientes</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                    <form action="" method="post" id="frmCliente" style="display: none;">
                        <div id="id" class="d-none"></div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" name="clave" id="claveCliente" class="form-control"
                                placeholder="Ingrese la clave del Cliente">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreCliente" class="form-control"
                                placeholder="Ingrese el nombre del Cliente">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" name="apellido" id="apellidoCliente" class="form-control"
                                placeholder="Ingrese los apellidos del Cliente">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="telefonoCliente" class="form-control"
                                placeholder="Ingrese el telefono del Cliente">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarCliente" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarCliente" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <br>
                <div id="divMostrarClientes" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionAutoLavado" style="display: none;">
            <h2 class="text-center">Autos Lavados</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                    <form action="" method="post" id="frmAutoLavado" style="display: none;">
                        <div id="id" class="d-none"></div>
                        <div id="idcliente" class="d-none"></div>
                        <div id="idempleado" class="d-none"></div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="clave">Clave de Cliente</label>
                                <input type="text" name="clave" id="clienteAutoLavado" class="form-control"
                                    placeholder="Ingrese la clave del cliente">
                            </div>
                            <div class="form-group col-6">
                                <label for="clave">Cliente</label>
                                <input type="text" name="clave" disabled id="clienteAutoLavadoNombre"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="nombre">Clave de Empleado</label>
                                <input type="text" name="nombre" id="empleadoAutoLavado" class="form-control"
                                    placeholder="Ingrese la clave del empleado">
                            </div>
                            <div class="form-group col-6">
                                <label for="nombre">Empleado</label>
                                <input type="text" name="nombre" disabled id="empleadoAutoLavadoNombre"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="apellido">Tamaño</label>
                                <select name="tamano" onchange='establecerPrecio()' id="tamanoAutoLavado"
                                    class="form-control">
                                    <option value="">Seleccione el tamaño...</option>
                                    <option value="S">Coche</option>
                                    <option value="M">Camioneta</option>
                                    <option value="L">Camion</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="telefono">Precio</label>
                                <input type="number" disabled name="telefono" id="precioAutoLavado" class="form-control"
                                    placeholder="Precio total">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarAutoLavado" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarAutoLavado" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <br>
                <div id="divMostrarAutoLavados" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionPagos" style="display: none;">
            <h2 class="text-center">Pagos a empleados</h2>
            <div class="row justify-content-center">

                <div id="divMostrarPagos" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionInventario" style="display: none;">
            <h2 class="text-center">Inventario de Productos</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                    <form action="" method="post" id="frmInventario" style="display: none;">
                        <div id="id" class="d-none"></div>
                        <div class="form-group">
                            <label for="nombre">Producto</label>
                            <input type="text" name="nombre" id="productoInventario" class="form-control"
                                placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Cantidad</label>
                            <input type="text" name="nombre" id="cantidadInventario" class="form-control"
                                placeholder="Ingrese la cantidad de producto">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Precio</label>
                            <input type="text" name="nombre" id="precioInventario" class="form-control"
                                placeholder="Ingrese el precio del producto">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarInventario" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarInventario" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <div id="divMostrarInventarios" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
        <div id="sectionGastos" style="display: none;">
            <h2 class="text-center">Otros Gastos</h2>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                    <form action="" method="post" id="frmGasto" style="display: none;">
                        <div id="id" class="d-none"></div>
                        <div class="form-group">
                            <label for="clave">Descripcion</label>
                            <textarea name="" id="descripcionGasto" cols="10" rows="10" class="form-control"
                                style="max-height: 5rem;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Cantidad</label>
                            <input type="text" name="nombre" id="cantidadGasto" class="form-control"
                                placeholder="Ingrese la cantidad utilizada">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Guardar" id="btnEnviarGasto" class="btn btn-primary">
                            <input type="button" value="Cancelar" id="btnCancelarGasto" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <div id="divMostrarGastos" class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8"></div>
            </div>
        </div>
    </div>
</body>

</html>