$(document).ready(function () {
    $("#sectionEmpleado").show("fast");
    $("#sectionCliente").hide("fast");

    $("#seccionInfo").load("php/seccionInfo.php");
    $("#divMostrarEmpleados").load("php/tablaEmpleados.php");
    $("#divMostrarClientes").load("php/tablaClientes.php");
    $("#divMostrarAutoLavados").load("php/tablaAutosLavados.php");
    $("#divMostrarPagos").load("php/tablaPagos.php");
    $("#divMostrarInventarios").load("php/tablaInventarios.php");
    $("#divMostrarGastos").load("php/tablaGastos.php");


    //Esta funcion del boton se encarga de agregar o actualizar a un empleado
    //Dependiendo del lo que diga el boton
    $("#btnEnviarEmpleado").click(function (event) {
        var clave = $("#claveEmpleado").val();
        var nombre = $("#nombreEmpleado").val();
        var apellido = $("#apellidoEmpleado").val();
        var telefono = $("#telefonoEmpleado").val();
        if (nombre === '' || apellido === '' || telefono === '' || clave === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarEmpleado").val() == "Guardar") {
            accion = "agregarEmpleado";
        }
        if ($("#btnEnviarEmpleado").val() == "Editar") {
            accion = "editarEmpleado";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                clave,
                nombre,
                apellido,
                telefono
            },
            success: function (respuestaPHP) {
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarEmpleados").load("php/tablaEmpleados.php");
                    $("#seccionInfo").load("php/seccionInfo.php");
                    $("#divMostrarEmpleados").show("fast");
                    $("#frmEmpleado").hide("fast");
                    $("#frmEmpleado")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })
    $("#btnCancelarEmpleado").click(function (event) {
        $("#divMostrarEmpleados").show("fast");
        $("#frmEmpleado").hide("fast");
        $("#frmEmpleado")[0].reset();
    })

    //Esta funcion del boton se encarga de agregar o actualizar a un cliente
    //Dependiendo del lo que diga el boton
    $("#btnEnviarCliente").click(function (event) {
        var clave = $("#claveCliente").val();
        var nombre = $("#nombreCliente").val();
        var apellido = $("#apellidoCliente").val();
        var telefono = $("#telefonoCliente").val();
        if (nombre === '' || apellido === '' || telefono === '' || clave === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarCliente").val() == "Guardar") {
            accion = "agregarCliente";
        }
        if ($("#btnEnviarCliente").val() == "Editar") {
            accion = "editarCliente";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                clave,
                nombre,
                apellido,
                telefono
            },
            success: function (respuestaPHP) {
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarClientes").load("php/tablaClientes.php");
                    $("#divMostrarClientes").show("fast");
                    $("#frmCliente").hide("fast");
                    $("#frmCliente")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })

    $("#btnCancelarCliente").click(function (event) {
        $("#divMostrarClientes").show("fast");
        $("#frmCliente").hide("fast");
        $("#frmCliente")[0].reset();
    })

    //AutoLavado
    $("#btnEnviarAutoLavado").click(function (event) {
        var idcliente = $("#idcliente").html();
        var idempleado = $("#idempleado").html();
        var tamano = $('#tamanoAutoLavado').val();
        var precio = $("#precioAutoLavado").val();
        if (idempleado === '' || tamano === '' || precio === '' || idcliente === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarAutoLavado").val() == "Guardar") {
            accion = "agregarAutoLavado";
        }
        if ($("#btnEnviarAutoLavado").val() == "Editar") {
            accion = "editarAutoLavado";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                idcliente,
                idempleado,
                tamano,
                precio
            },
            success: function (respuestaPHP) {
                console.log(respuestaPHP);
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarAutoLavados").load("php/tablaAutosLavados.php");
                    $("#seccionInfo").load("php/seccionInfo.php");
                    $("#divMostrarAutoLavados").show("fast");
                    $("#frmAutoLavado").hide("fast");
                    $("#frmAutoLavado")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })

    $("#btnCancelarAutoLavado").click(function (event) {
        $("#divMostrarAutoLavados").show("fast");
        $("#frmAutoLavado").hide("fast");
        $("#frmAutoLavado")[0].reset();
    })

    $("#btnEnviarGasto").click(function (event) {
        var descripcion = $("#descripcionGasto").val();
        var cantidad = $("#cantidadGasto").val();
        if (descripcion === '' || cantidad === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarGasto").val() == "Guardar") {
            accion = "agregarGasto";
        }
        if ($("#btnEnviarGasto").val() == "Editar") {
            accion = "editarGasto";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                descripcion,
                cantidad
            },
            success: function (respuestaPHP) {
                console.log(respuestaPHP);
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarGastos").load("php/tablaGastos.php");
                    $("#divMostrarGastos").show("fast");
                    $("#seccionInfo").load("php/seccionInfo.php");
                    $("#frmGasto").hide("fast");
                    $("#frmGasto")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })

    $("#btnCancelarGasto").click(function (event) {
        $("#divMostrarGastos").show("fast");
        $("#frmGasto").hide("fast");
        $("#frmGasto")[0].reset();
    })

    $('#clienteAutoLavado').keyup(function (e) {
        var clave = $('#clienteAutoLavado').val();
        $.ajax({
            url: "./php/servidor.php",
            type: "GET",
            data: {
                accion: 'buscarCliente',
                clave
            },
            success: function (respuestaPHP) {
                if (respuestaPHP != '') {
                    datos = respuestaPHP.split('&')
                    $('#clienteAutoLavadoNombre').val(datos[1])
                    $('#idcliente').html(datos[0])
                    establecerPrecio();
                }
            }
        });
    });

    $('#empleadoAutoLavado').keyup(function () {
        var clave = $('#empleadoAutoLavado').val();
        $.ajax({
            url: "./php/servidor.php",
            type: "GET",
            data: {
                accion: 'buscarEmpleado',
                clave
            },
            success: function (respuestaPHP) {
                if (respuestaPHP != '') {
                    datos = respuestaPHP.split('&')
                    $('#empleadoAutoLavadoNombre').val(datos[1])
                    $('#idempleado').html(datos[0])
                }
            }
        });
    });

    $("#btnEnviarInventario").click(function (event) {
        var producto = $("#productoInventario").val();
        var cantidad = $("#cantidadInventario").val();
        var precio = $("#precioInventario").val();
        var telefono = $("#telefonoInventario").val();
        if (cantidad === '' || precio === '' || producto === '') {
            alertify
                .alert("Parece que faltan datos", function () {
                    alertify.message('OK');
                });
            return
        }
        var accion;
        var id;
        if ($("#btnEnviarInventario").val() == "Guardar") {
            accion = "agregarInventario";
        }
        if ($("#btnEnviarInventario").val() == "Editar") {
            accion = "editarInventario";
            id = $("#id").html()
        }
        $.ajax({
            url: "php/servidor.php",
            type: "GET",
            data: {
                accion,
                id,
                producto,
                cantidad,
                precio
            },
            success: function (respuestaPHP) {
                console.log(respuestaPHP);
                if (respuestaPHP == "1") {
                    alertify.success("Registro ejecutado correctamente");
                    $("#divMostrarInventarios").load("php/tablaInventarios.php");
                    $("#divMostrarInventarios").show("fast");
                    $("#seccionInfo").load("php/seccionInfo.php");
                    $("#frmInventario").hide("fast");
                    $("#frmInventario")[0].reset();
                }
                else {
                    alertify.error("No se registro correctamente");
                }
            }
        });
    })

    $("#btnCancelarInventario").click(function (event) {
        $("#divMostrarInventarios").show("fast");
        $("#frmInventario").hide("fast");
        $("#frmInventario")[0].reset();
    })
})
//Funcion para editar el empleado
function editarEmpleado(id, clave, nombre, apellido, telefono) {
    $("#frmEmpleado").show("slow");
    $("#divMostrarEmpleados").hide("fast");
    $("#nombreEmpleado").val(nombre);
    $("#apellidoEmpleado").val(apellido);
    $("#telefonoEmpleado").val(telefono);
    $("#claveEmpleado").val(clave);
    $("#id").html(id)

    $("#btnEnviarEmpleado").removeClass();
    $('#btnEnviarEmpleado').addClass("btn btn-warning");
    $('#btnEnviarEmpleado').val("Editar");
    $("#btnEnviarEmpleado").html("<i class='fas fa-user-edit'></i> Actualizar");
}

//Funcion eliminar empleado
function eliminarEmpleado(id) {
    alertify.confirm("¿Deseas eliminar el empleado con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarEmpleado";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Empleado eliminado exitosamente");
                        $("#divMostrarEmpleados").load("php/tablaEmpleados.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}


//Funcion para editar el cliente
function editarCliente(id, clave, nombre, apellido, telefono) {
    $("#frmCliente").show("slow");
    $("#divMostrarClientes").hide("fast");
    $("#nombreCliente").val(nombre);
    $("#apellidoCliente").val(apellido);
    $("#telefonoCliente").val(telefono);
    $("#claveCliente").val(clave);
    $("#id").html(id)

    $("#btnEnviarCliente").removeClass();
    $('#btnEnviarCliente').addClass("btn btn-warning");
    $('#btnEnviarCliente').val("Editar");
    $("#btnEnviarCliente").html("<i class='fas fa-user-edit'></i> Actualizar");
}

//Funcion eliminar cliente
function eliminarCliente(id) {
    alertify.confirm("¿Deseas eliminar el cliente con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarCliente";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Cliente eliminado exitosamente");
                        $("#divMostrarClientes").load("php/tablaClientes.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}

//Funcion para editar el empleado
function editarAutoLavado(id, nombreEmpleado, idEmpleado, claveEmpleado,nombreCliente, idCliente, claveCliente, tamano, precio ) {
    $("#frmAutoLavado").show("slow");
    $("#divMostrarAutoLavados").hide("fast");

    $("#id").html(id)
    $("#idcliente").html(idCliente);
    $("#idempleado").html(idEmpleado);
    $('#tamanoAutoLavado').val(tamano);
    $("#precioAutoLavado").val(precio);
    
    $('#clienteAutoLavadoNombre').val(nombreCliente)
    $('#clienteAutoLavado').val(claveCliente)
    $('#empleadoAutoLavadoNombre').val(nombreEmpleado)
    $('#empleadoAutoLavado').val(claveEmpleado)

    $("#btnEnviarAutoLavado").removeClass();
    $('#btnEnviarAutoLavado').addClass("btn btn-warning");
    $('#btnEnviarAutoLavado').val("Editar");
    $("#btnEnviarAutoLavado").html("<i class='fas fa-user-edit'></i> Actualizar");
}

//Funcion eliminar empleado
function eliminarAutoLavado(id) {
    alertify.confirm("¿Deseas eliminar el auto lavado con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarAutoLavado";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Auto Lavado eliminado exitosamente");
                        $("#divMostrarAutoLavados").load("php/tablaAutosLavados.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
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
function establecerPrecio() {
    var tipo = $('#tamanoAutoLavado').val()
    var precio;
    var gratis;
    $.ajax({
        url: "./php/servidor.php",
        type: "GET",
        data: {
            accion: 'verificarLavadoGratis',
            id: $('#idcliente').html()
        },
        success: function (respuestaPHP) {
            if (((parseInt(respuestaPHP) + 1) / 6) == 1) {
                console.log('gratis');
                precio = 0
            } else {
                switch (tipo) {
                    case 'S':
                        precio = 120
                        break;
                    case 'M':
                        precio = 200
                        break;
                    case 'L':
                        precio = 400
                        break;
                    default:
                        break;
                }
            }
            $('#precioAutoLavado').val(precio)
        }
    });
}
function pagarEmpleado(id) {

    alertify.confirm("¿Deseas pagar el sueldo del empleado con el " + id + "?", function (respuesta) {
        if (respuesta) {
            $.ajax({
                url: "./php/servidor.php",
                type: "GET",
                data: {
                    accion: 'pagarEmpleado',
                    id
                },
                success: function (respuestaPHP) {
                    console.log(respuestaPHP);
                    if (respuestaPHP == "1") {
                        $("#divMostrarPagos").load("php/tablaPagos.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
                    }
                }
            });
        }
    })

}
function eliminarPagoEmpleado(id) {
    alertify.confirm("¿Deseas eliminar el pago de ingles con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarPagoEmpleado";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Pago eliminado exitosamente");
                        $("#divMostrarPagos").load("php/tablaPagos.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}

function editarGasto(id, descripcion, cantidad) {
    $("#frmGasto").show("slow");
    $("#divMostrarGastos").hide("fast");

    $("#id").html(id)
    $('#descripcionGasto').val(descripcion);
    $("#cantidadGasto").val(cantidad);

    $("#btnEnviarGasto").removeClass();
    $('#btnEnviarGasto').addClass("btn btn-warning");
    $('#btnEnviarGasto').val("Editar");
    $("#btnEnviarGasto").html("<i class='fas fa-user-edit'></i> Actualizar");
}
//Funcion eliminar gastos
function eliminarGastos(id) {
    alertify.confirm("¿Deseas eliminar el auto lavado con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarGasto";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Auto Lavado eliminado exitosamente");
                        $("#divMostrarGastos").load("php/tablaGastos.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}

function editarInventario(id, producto, cantidad,precio) {
    $("#frmInventario").show("slow");
    $("#divMostrarInventarios").hide("fast");

    $("#id").html(id)
    $('#productoInventario').val(producto);
    $("#cantidadInventario").val(cantidad);
    $("#precioInventario").val(precio);

    $("#btnEnviarInventario").removeClass();
    $('#btnEnviarInventario').addClass("btn btn-warning");
    $('#btnEnviarInventario').val("Editar");
    $("#btnEnviarInventario").html("<i class='fas fa-user-edit'></i> Actualizar");
}
//Funcion eliminar gastos
function eliminarInventario(id) {
    alertify.confirm("¿Deseas eliminar el  producto con el id " + id + "?", function (respuesta) {
        if (respuesta) {
            accion = "eliminarInventario";
            $.ajax({
                url: "php/servidor.php",
                type: "GET",
                data: { accion: accion, id: id },
                success: function (respuestaPHP) {
                    if (respuestaPHP == "1") {
                        alertify.success("Auto Lavado eliminado exitosamente");
                        $("#divMostrarInventarios").load("php/tablaInventarios.php");
                        $("#seccionInfo").load("php/seccionInfo.php");
                    }
                    else {
                        alertify.error("No se elimino correctamente");
                    }
                }
            });
        }
    });
}

function mostrarSeccionEmpleados() {
    $("#sectionEmpleado").show("fast");
    $("#sectionCliente").hide("fast");
    $("#sectionAutoLavado").hide("fast");
    $("#sectionPagos").hide("fast");
    $("#sectionInventario").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionClientes() {
    $("#sectionEmpleado").hide("fast");
    $("#sectionCliente").show("fast");
    $("#sectionAutoLavado").hide("fast");
    $("#sectionPagos").hide("fast");
    $("#sectionInventario").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionAutos() {
    $("#sectionEmpleado").hide("fast");
    $("#sectionCliente").hide("fast");
    $("#sectionAutoLavado").show("fast");
    $("#sectionPagos").hide("fast");
    $("#sectionInventario").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionPagos() {
    $("#sectionEmpleado").hide("fast");
    $("#sectionCliente").hide("fast");
    $("#sectionAutoLavado").hide("fast");
    $("#sectionPagos").show("fast");
    $("#sectionInventario").hide("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionInventario() {
    $("#sectionEmpleado").hide("fast");
    $("#sectionCliente").hide("fast");
    $("#sectionAutoLavado").hide("fast");
    $("#sectionPagos").hide("fast");
    $("#sectionInventario").show("fast");
    $("#sectionGastos").hide("fast");
}
function mostrarSeccionGastos() {
    $("#sectionEmpleado").hide("fast");
    $("#sectionCliente").hide("fast");
    $("#sectionAutoLavado").hide("fast");
    $("#sectionPagos").hide("fast");
    $("#sectionInventario").hide("fast");
    $("#sectionGastos").show("fast");
}