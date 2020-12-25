$(document).ready(function () {
    $("#divMostrarPagosEmpleados").load("php/tablaPagosEmpleados.php");
    $("#divMostrarEncargados").load("php/tablaEncargados.php");
    $("#divMostrarDineroIngresado").load("php/tablaDineroIngresado.php");
    $("#divMostrarGastos").load("php/tablaAdminGastos.php");
    $("#btnEnviarEncargado").click(function (event) {
        var nombre = $("#nombreEncargado").val();
        var apellido = $("#apellidoEncargado").val();
        var telefono = $("#telefonoEncargado").val();
        var email = $("#emailEncargado").val();
        var pass = $("#passwordEncargado").val();
        if (nombre === '' || apellido === '' || telefono === '' || email == '' || pass =='') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarEncargado").val() == "Guardar") {
            accion = "agregarEncargado";
        }
        if ($("#btnEnviarEncargado").val() == "Editar") {
            accion = "editarEncargado";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                nombre,
                apellido,
                telefono,
                email,
                pass
            },
            success: function (respuestaPHP) {
                console.log(respuestaPHP);
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarEncargados").load("php/tablaEncargados.php");
                    $("#divMostrarEncargados").show("fast");
                    $("#frmEncargado").hide("fast");
                    $("#frmEncargado")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })
    $("#btnCancelarEncargado").click(function (event) {
        $("#divMostrarEncargados").show("fast");
        $("#frmEncargado").hide("fast");
        $("#frmEncargado")[0].reset();
    })
});



//Funcion para editar el empleado
function editarEncargado(id, nombre, apellido, telefono,email,password) {
    $("#frmEncargado").show("slow");
    $("#divMostrarEncargados").hide("fast");
    $("#nombreEncargado").val(nombre);
    $("#apellidoEncargado").val(apellido);
    $("#telefonoEncargado").val(telefono);
    $("#emailEncargado").val(email);
    $("#passwordEncargado").val(password);
    $("#id").html(id)

    $("#btnEnviarEncargado").removeClass();
    $('#btnEnviarEncargado').addClass("btn btn-warning");
    $('#btnEnviarEncargado').val("Editar");
    $("#btnEnviarEncargado").html("<i class='fas fa-user-edit'></i> Actualizar");
}

//Funcion eliminar Encargado
function eliminarEncargado(id) {
    alertify.confirm("¿Deseas eliminar el encargado con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarEncargado";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Encargado eliminado exitosamente");
                        $("#divMostrarEncargados").load("php/tablaEncargados.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}

//Funcion para llamar la opcion de cerrar sesion en el servidor
function cerrarSesion() {
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

function mostrarSeccionEncargado() {
    $("#inicio").hide("fast");
    $("#sectionEncargado").show("fast");
    $("#sectionPagosEmpleados").hide("fast");
    $("#sectionDineroIngresado").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionPagos() {
    $("#inicio").hide("fast");
    $("#sectionEncargado").hide("fast");
    $("#sectionPagosEmpleados").show("fast");
    $("#sectionDineroIngresado").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionDinero() {
    $("#inicio").hide("fast");
    $("#sectionEncargado").hide("fast");
    $("#sectionPagosEmpleados").hide("fast");
    $("#sectionDineroIngresado").show("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionGastos() {
    $("#inicio").hide("fast");
    $("#sectionEncargado").hide("fast");
    $("#sectionPagosEmpleados").hide("fast");
    $("#sectionDineroIngresado").hide("fast");
    $("#sectionGastos").show("fast");
}