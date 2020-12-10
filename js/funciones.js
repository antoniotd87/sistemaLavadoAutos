$(document).ready(function () {

    // Iniciar sesion con el usuario, contraseña y el tipo de usuario
    $('#ingresar').click(function (event) {
        // Se leen los datos para iniciar sesion
        let email = $('#email').val();
        let password = $('#password').val();
        let tipo = $('#tipo').val();
        //Si falñtan datos, se envia un mensaje
        if (email === '' || password === '' || tipo === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
        } else {
            //Si los datos estan correctos se envia al servidor para validar el usuario
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
                    // Si la respuesta es 1, es un administrador
                    // y si es un 2, es un encargado
                    //Para ambos se espar 2 segundo para ser direccionados a sus paginas
                    if (respuestaPHP == "1") {
                        alertify.success("Administrador confirmado\nIniciando!!!");
                        $('#barra').load("php/barra/barra.php");
                        setTimeout(function () {
                            $(location).attr('href', 'sitioAdmin.php');
                        }, 2000);
                    }else if (respuestaPHP == "2") {
                        alertify.success("Encargado confirmado\nIniciando!!!");
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
//Funcion para llamar la opcion de cerrar sesion en el servidor
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
                //Espera 2 segundos para regirigir
                setTimeout(function () {
                    $(location).attr('href', 'index.php');
                }, 2000);
            }
        }
    });
}
