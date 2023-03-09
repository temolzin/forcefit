<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('cliente');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Clientes</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarCliente'> <i
                                    class="fa fa-edit"></i> Registrar Cliente 
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableCliente" name="dataTableCliente" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del plan</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Municipio</th>
                                            <th>Colonia</th>
                                            <th>Calle</th>
                                            <th>Codigo Postal</th>
                                            <th>Numero del cliente</th>
                                            <th>Imagen</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarCliente" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCliente"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarCliente" name="formRegistrarCliente" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"
                                        placeholder="Nombre del cliente" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="apellido_paterno_cliente" name="apellido_paterno_cliente"
                                        placeholder="Apellido Paterno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="apellido_materno_cliente" name="apellido_materno_cliente"
                                        placeholder="Apellido Materno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Municipio (*)</label>
                                    <input type="text" class="form-control" id="municipio_cliente" name="municipio_cliente"
                                        placeholder="Municipio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Colonia (*)</label>
                                    <input type="text" class="form-control" id="colonia_cliente" name="colonia_cliente"
                                        placeholder="Colonia" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Calle (*)</label>
                                    <input type="text" class="form-control" id="calle_cliente" name="calle_cliente"
                                        placeholder="Calle" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Codigo Postal (*)</label>
                                    <input type="text" class="form-control" id="codigo_postal_cliente" name="codigo_postal_cliente"
                                        placeholder="Codigo Postal" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero (*)</label>
                                    <input type="text" class="form-control" id="numero_cliente" name="numero_cliente"
                                        placeholder="Numero telefonico" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <span><label>Imagen del Cliente (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input form-control"
                                            name="imagen_cliente" id="imagen_cliente" lang="es" />
                                        <label class="custom-file-label" for="imagen">Seleccione
                                            Imagen</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarCliente" tabindex="-1" role="dialog" aria-labelledby="modalActualizarCliente"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarCliente" name="formActualizarCliente">
                    <div class="card-body">
                        <div class="row">
                            <div style="display: none;" class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Id (*)</label>
                                        <input type="text" class="form-control" id="id_clienteActualizar"
                                            name="id_clienteActualizar" placeholder="Id" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre_clienteActualizar" name="nombre_clienteActualizar"
                                        placeholder="Nombre del cliente" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="apellido_paterno_clienteActualizar" name="apellido_paterno_clienteActualizar"
                                        placeholder="Apellido Paterno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="apellido_materno_clienteActualizar" name="apellido_materno_clienteActualizar"
                                        placeholder="Apellido Materno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Municipio (*)</label>
                                    <input type="text" class="form-control" id="municipio_clienteActualizar" name="municipio_clienteActualizar"
                                        placeholder="Municipio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Colonia (*)</label>
                                    <input type="text" class="form-control" id="colonia_clienteActualizar" name="colonia_clienteActualizar"
                                        placeholder="Colonia" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Calle (*)</label>
                                    <input type="text" class="form-control" id="calle_clienteActualizar" name="calle_clienteActualizar"
                                        placeholder="Calle" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Codigo Postal (*)</label>
                                    <input type="text" class="form-control" id="codigo_postal_clienteActualizar" name="codigo_postal_clienteActualizar"
                                        placeholder="Codigo Postal" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero (*)</label>
                                    <input type="text" class="form-control" id="numero_clienteActualizar" name="numero_clienteActualizar"
                                        placeholder="Numero telefonico" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <span><label>Imagen del Cliente (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input form-control"
                                            name="imagen_clienteActualizar" id="imagen_clienteActualizar" lang="es" />
                                        <label class="custom-file-label" for="imagen">Seleccione
                                            Imagen</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Detalle Cliente----------------------------------------------->
<div class="modal fade" id="modalDetalleCliente" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCliente"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Id (*)</label>
                                    <input type="text" disabled class="form-control" id="id_clienteConsultar"
                                        name="id_clienteConsultar" placeholder="id" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre_clienteConsultar" name="nombre_clienteConsultar"
                                        placeholder="Nombre del cliente" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="apellido_paterno_clienteConsultar" name="apellido_paterno_clienteConsultar"
                                        placeholder="Apellido Paterno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="apellido_materno_clienteConsultar" name="apellido_materno_clienteConsultar"
                                        placeholder="Apellido Materno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Municipio (*)</label>
                                    <input type="text" class="form-control" id="municipio_clienteConsultar" name="municipio_clienteConsultar"
                                        placeholder="Municipio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Colonia (*)</label>
                                    <input type="text" class="form-control" id="colonia_clienteConsultar" name="colonia_clienteConsultar"
                                        placeholder="Colonia" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Calle (*)</label>
                                    <input type="text" class="form-control" id="calle_clienteConsultar" name="calle_clienteConsultar"
                                        placeholder="Calle" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Codigo Postal (*)</label>
                                    <input type="text" class="form-control" id="codigo_postal_clienteConsultar" name="codigo_postal_clienteConsultar"
                                        placeholder="Codigo Postal" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero (*)</label>
                                    <input type="text" class="form-control" id="numero_clienteConsultar" name="numero_clienteConsultar"
                                        placeholder="Numero telefonico" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar Rol *************************************************-->
<div class="modal fade" id="modalEliminarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCliente"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarCliente" name="formActualizarCliente">
                <input type="text" hidden id="idEliminarcliente" name="idEliminarcliente">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Cliente?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$menu->footer();
?>

<script>
$(document).ready(function() {
    mostrarCliente();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
});

var mostrarCliente = function() {
    var tableCliente = $('#dataTableCliente').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>cliente/read"
        },
        "columns": [{
                "data": "id_cliente"
            },
            {
                "data": "nombre_cliente"
            },
            {
                "data": "apellido_paterno_cliente"
            },
            {
                "data": "apellido_materno_cliente"
            },
            {
                "data": "municipio_cliente"
            },
            {
                "data": "colonia_cliente"
            },
            {
                "data": "calle_cliente"
            },
            {
                "data": "codigo_postal_cliente"
            },
            {
                "data": "numero_cliente"
            },
            {
                "data": "imagen_cliente"
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCliente' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarCliente' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarCliente' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tableCliente);
}

var obtenerdatosDT = function(table) {
    $('#dataTableCliente tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarcliente').val(data.id_cliente);

        var id_clienteActualizar = $("#id_clienteActualizar").val(data.id_cliente);
        var nombre_clienteActualizar = $("#nombre_clienteActualizar").val(data.nombre_cliente);
        var apellido_paterno_clienteActualizar = $("#apellido_paterno_clienteActualizar").val(data.apellido_paterno_cliente);
        var apellido_materno_clienteActualizar = $("#apellido_materno_clienteActualizar").val(data.apellido_materno_cliente);
        var municipio_clienteActualizar = $("#municipio_clienteActualizar").val(data.municipio_cliente);
        var colonia_clienteActualizar = $("#colonia_clienteActualizar").val(data.colonia_cliente);
        var calle_clienteActualizar = $("#calle_clienteActualizar").val(data.calle_cliente);
        var codigo_postal_clienteActualizar = $("#codigo_postal_clienteActualizar").val(data.codigo_postal_cliente);
        var numero_clienteActualizar = $("#numero_clienteActualizar").val(data.numero_cliente);
        var imagen_clienteActualizar = $("#imagen_clienteActualizar").val(data.imagen_cliente);


        var id_clienteConsultar = $("#id_clienteConsultar").val(data.id_cliente);
        var nombre_clienteConsultar = $("#nombre_clienteConsultar").val(data.nombre_cliente);
        var apellido_paterno_clienteConsultar = $("#apellido_paterno_clienteConsultar").val(data.apellido_paterno_cliente);
        var apellido_materno_clienteConsultar = $("#apellido_materno_clienteConsultar").val(data.apellido_materno_cliente);
        var municipio_clienteConsultar = $("#municipio_clienteConsultar").val(data.municipio_cliente);
        var colonia_clienteConsultar = $("#colonia_clienteConsultar").val(data.colonia_cliente);
        var calle_clienteConsultar = $("#calle_clienteConsultar").val(data.calle_cliente);
        var codigo_postal_clienteConsultar = $("#codigo_postal_clienteConsultar").val(data.codigo_postal_cliente);
        var numero_clienteConsultar = $("#numero_clienteConsultar").val(data.numero_cliente);
        var imagen_clienteConsultar = $("#imagen_clienteConsultar").val(data.imagen_cliente);


    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarCliente').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>cliente/insert",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Cliente se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>cliente";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar el Cliente. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formRegistrarCliente').validate({
        rules: {
            nombre_cliente: {
                required: true
            },
            apellido_paterno_cliente: {
                required: true
            },
            apellido_materno_cliente: {
                required: true
            },
            municipio_cliente: {
                required: true
            },
            colonia_cliente: {
                required: true
            },
            calle_cliente: {
                required: true
            },
            codigo_postal_cliente: {
                required: true
            },
            numero_cliente: {
                required: true
            },
            imagen_cliente: {
                required: true
            },

        },
        messages: {
            nombre_cliente: {
                required: "Ingrese el nombre del cliente"
            },
            apellido_paterno_cliente: {
                required: "Ingresa el apellido paterno"
            },
            apellido_materno_cliente: {
                required: "Ingresa el apellido materno"
            },
            municipio_cliente: {
                required: "Ingresa el municipio"
            },
            colonia_cliente: {
                required: "Ingresa la colonia"
            },
            calle_cliente: {
                required: "Ingresa la calle"
            },
            codigo_postal_cliente: {
                required: "Ingresa el Codigo Postal"
            },
            numero_cliente: {
                required: "Ingresa el numero telefonico"
            },
            imagen_cliente: {
                required: "Ingresa la imagen del cliente"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}

var enviarFormularioActualizar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formActualizarCliente').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>cliente/update",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Cliente se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>cliente";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar al cliente. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarCliente').validate({
        rules: {
            nombre_clienteActualizar: {
                required: true
            },
            apellido_paterno_clienteActualizar: {
                required: true
            },
            apellido_materno_clienteActualizar: {
                required: true
            },
            municipio_clienteActualizar: {
                required: true
            },
            colonia_clienteActualizar: {
                required: true
            },
            calle_clienteActualizar: {
                required: true
            },
            codigo_postal_clienteActualizar: {
                required: true
            },
            numero_clienteActualizar: {
                required: true
            },
            imagen_clienteActualizar: {
                required: true
            }
        },
        messages: {
            nombre_clienteActualizar: {
                required: "Ingrese el nombre del cliente"
            },
            apellido_paterno_clienteActualizar: {
                required: "Ingresa el apellido paterno"
            },
            apellido_materno_clienteActualizar: {
                required: "Ingresa el apellido materno"
            },
            municipio_clienteActualizar: {
                required: "Ingresa el municipio"
            },
            colonia_clienteActualizar: {
                required: "Ingresa la colonia"
            },
            calle_clienteActualizar: {
                required: "Ingresa la calle"
            },
            codigo_postal_clienteActualizar: {
                required: "Ingresa el Codigo Postal"
            },
            numero_clienteActualizar: {
                required: "Ingresa el numero telefonico"
            },
            imagen_clienteActualizar: {
                required: "Ingresa la imagen del cliente"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}

var eliminarRegistro = function() {
    $("#formEliminarCliente").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarCliente').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>cliente/delete",
            data: datos,
            success: function(data) {
                if (data == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El Cliente ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>cliente";
                    })
                } else {
                    Swal.fire(
                        "¡Error!",
                        "Ha ocurrido un error al eliminar el cliente. " + data,
                        "error"
                    );
                }
            },
        });
    });
}
/*var dataTableFunction = function () {
                var table = $("#dataTableMaestro").DataTable({
                    responsive: true,
                    language: idiomaDataTable,
                    lengthChange: true,
                    buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
                    dom: 'Bfltip'
                });
            
                table.buttons().container().appendTo('#dataTableMaestro_wrapper .col-md-6:eq(0)');
            }*/
</script>