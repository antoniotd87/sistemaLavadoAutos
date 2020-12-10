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
</head>

<body>
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
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Barra Inicio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header bg-info ">
                        <h3 class="card-title text-white">Inicio de sesion</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="assets/usuario.png" class="w-50 p-3" alt="...">
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frmLogin">
                            <div class="form-group">
                                <label for="tipo">Seleccione el tipo de usuario</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Encargado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Ingrese su correo">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Ingrese su contraseña">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Ingresar" id="ingresar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/alertify.js"></script>
    <script src="js/funciones.js"></script>
</body>

</html>