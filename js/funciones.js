$(document).ready(function () {

    $('#barra').load("php/barra/barra.php");
    // Iniciar sesion con el usuario, contraseña y el tipo de usuario
    $('#ingresar').click(function (event) {
        let email = $('#email').val();
        let password = $('#password').val();
        let tipo = $('#tipo').val();
        if (email === '' || password === '' || tipo === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
        } else {
            $.ajax({
                url: "./php/servidor.php",
                type: "GET",
                data: {
                    accion: 'validarIngreso',
                    email: email,
                    password: password,
                    tipo: tipo,
                },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Administrador confirmado\nIniciando!!!");
                        $('#barra').load("php/barra/barra.php");
                        setTimeout(function () {
                            $(location).attr('href', 'sitioAdmin.php');
                        }, 2000);
                    }else if (respuestaPHP == "2") {
                        alertify.success("Encargado confirmado\nIniciando!!!");
                        $('#barra').load("php/barra/barra.php");
                        setTimeout(function () {
                            $(location).attr('href', 'sitioEncargado.php');
                        }, 2000);
                    }
                    else {
                        alertify.error("Datos incorrectos");
                    }
                }
            });
        }
    });
});

function cerrarSesion(){
    $.ajax({
        url: "./php/servidor.php",
        type: "GET",
        data: {
            accion: 'salir'
        },
        success: function (respuestaPHP) {
            if (respuestaPHP == "1") {
                alertify.success("Saliendo!!!");
                setTimeout(function () {
                    $(location).attr('href', 'index.php');
                }, 2000);
            }
        }
    });
}