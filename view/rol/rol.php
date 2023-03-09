<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('rol');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Roles</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarRol'> <i
                                    class="fa fa-edit"></i> Registrar Rol
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableRol" name="dataTableRol" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre de rol</th>
                                            <th>Descripcion</th>
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
<div class="modal fade" id="modalRegistrarRol" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Rol <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarRol" name="formRegistrarRol" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreRol" name="nombreRol"
                                        placeholder="Nombre del rol" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcion (*)</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        placeholder="Descripcion del rol" />
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
<div class="modal fade" id="modalActualizarRol" tabindex="-1" role="dialog" aria-labelledby="modalActualizarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Rol <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarRol" name="formActualizarRol">
                    <div class="card-body">
                        <div class="row">
                            <div style="display: none;" class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Id (*)</label>
                                        <input type="text" class="form-control" id="idRolActualizar"
                                            name="idRolActualizar" placeholder="Id" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreRolActualizar"
                                        name="nombreRolActualizar" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcion (*)</label>
                                    <input type="text" class="form-control" id="descripcionRolActualizar"
                                        name="descripcionRolActualizar" placeholder="Descripcion del rol" />
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

<!--------------------------------------------------------- Modal Detalle Rol----------------------------------------------->
<div class="modal fade" id="modalDetalleRol" tabindex="-1" role="dialog" aria-labelledby="modalDetalleRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Rol <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                    <input type="text" disabled class="form-control" id="idRolConsultar"
                                        name="idRolConsultar" placeholder="id" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" disabled class="form-control" id="nombreRolConsultar"
                                        name="nombreRolConsultar" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcion (*)</label>
                                    <input type="text" disabled class="form-control" id="descripcionRolConsultar"
                                        name="descripcionRolConsultar" placeholder="Descripcion del rol" />
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
<div class="modal fade" id="modalEliminarRol" tabindex="-1" role="dialog" aria-labelledby="modalEliminarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarRol" name="formActualizarRol">
                <input type="text" hidden id="idEliminarRol" name="idEliminarRol">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Rol?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--***************************************Modal permisos Rol******************************************-->
<div class="modal fade" id="modalPermisoRol" tabindex="-1" role="dialog" aria-labelledby="modalPermisoRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Permisos Rol</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formPermisoRol" name="formPermisoRol" method="post">
                    <div class="card-body">
                        <table id="dataTablePermiso" name="dataTablePermiso" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Módulo</th>
                                    <th>Ver</th>
                                    <th>Crear</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$menu->footer();
?>

<script>
$(document).ready(function() {
    mostrarRoles();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
    editarPermiso();
    mostrarPermiso();
});

var mostrarRoles = function() {
    var tableRol = $('#dataTableRol').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>rol/read"
        },
        "columns": [{
                "data": "id_rol"
            },
            {
                "data": "nombreRol"
            },
            {
                "data": "descripcion"
            },
            {
                data: null,
                "defaultContent": `<button class='eliminar btn btn-secondary' data-toggle='modal' data-target='#modalPermisoRol' title="Editar Permisos"><i class="fa fa-key"></i></button>
                <button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleRol' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarRol' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarRol' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tableRol);
}

var obtenerdatosDT = function(table) {
    $('#dataTableRol tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarRol').val(data.id_rol);

        var idRolActualizar = $("#idRolActualizar").val(data.id_rol);
        var nombreRolActualizar = $("#nombreRolActualizar").val(data.nombreRol);
        var descripcionRolActualizar = $("#descripcionRolActualizar").val(data.descripcion);

        var idRolConsultar = $("#idRolConsultar").val(data.id_rol);
        var nombreRolConsultar = $("#nombreRolConsultar").val(data.nombreRol);
        var descripcionRolConsulta = $("#descripcionRolConsultar").val(data.descripcion);
    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarRol').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>rol/insert",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El rol se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>rol";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar el Rol. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formRegistrarRol').validate({
        rules: {
            nombreRol: {
                required: true
            },
            descripcion: {
                required: true
            },
        },
        messages: {
            nombreRol: {
                required: "Ingrese el nombre del rol"
            },
            descripcion: {
                required: "Ingrese la descripcion"
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
            var datos = $('#formActualizarRol').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>rol/update",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El rol se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>rol";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el Rol. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarRol').validate({
        rules: {
            nombreRolActualizar: {
                required: true
            },
            descripcionActualizar: {
                required: true
            }
        },
        messages: {
            nombreRolActualizar: {
                required: "Ingrese el nombre del rol"
            },
            descripcionActualizar: {
                required: "Ingrese el rol"
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
    $("#formEliminarRol").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarRol').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>rol/delete",
            data: datos,
            success: function(data) {
                if (data == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El rol ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>rol";
                    })
                } else {
                    Swal.fire(
                        "¡Error!",
                        "Ha ocurrido un error al eliminar el rol. " + data,
                        "error"
                    );
                }
            },
        });
    });
}

var editarPermiso = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formPermisoRol').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>permiso/editar",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "Los permisos se actualizaron correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>rol";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al cambiar los permisos. " + data,
                            "error"
                        );
                    }
                }
            });
        }
    });
}
var mostrarPermiso = function() {
    var tablePermiso = $('#dataTablePermiso').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>permiso/read"
        },
        "columns": [{
                "data": "id_modulo"
            },
            {
                "data": "nombre_modulo"
            },
            {
                data: null,
                "render": function(data, type, full) {
                    var check = full["c"] == 1 ? 'CHECKED' : '';
                    return '<input type="checkbox" ' + check + '>';
                }
            },
            {
                data: null,
                "render": function(data, type, full) {
                    var check = full["r"] == 1 ? 'CHECKED' : '';
                    return '<input type="checkbox" ' + check + '>';
                }
            },
            {
                data: null,
                "render": function(data, type, full) {
                    var check = full["u"] == 1 ? 'CHECKED' : '';
                    return '<input type="checkbox" ' + check + '>';
                }
            },
            {
                data: null,
                "render": function(data, type, full) {
                    var check = full["d"] == 1 ? 'CHECKED' : '';
                    return '<input type="checkbox" ' + check + '>';
                }
            }
        ]
    });
    obtenerdatosDTP(tablePermiso);
}
var obtenerdatosDTP = function(table) {
    $('#dataTablePermiso tbody').on('click', 'tr', function() {
        var data = table.row(this).data();

        var idRolConsultar = $("")
        var idModuloConsultar = $("#idRolConsultar").val(data.id_modulo);
        var nombreModuloConsultar = $("#nombreRolConsultar").val(data.nombreRol);
        var descripcionRolConsulta = $("#descripcionRolConsultar").val(data.descripcion);
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
