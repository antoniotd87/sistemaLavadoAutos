<?php 
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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Barra Administrador</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <br>
    <div class="container">
        <h1>Acciones del Administrador</h1>
    </div>
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/alertify.js"></script>
    <script src="js/funciones.js"></script>
</body>

</html>