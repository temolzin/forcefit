<?php
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('maestro');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarMaestro'> <i class="fas fa-plus-circle"></i> Registrar Maestro </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Maestro</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableMaestro" name="dataTableMaestro" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Edad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarMaestro" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarMaestro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Maestro <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarMaestro" name="formRegistrarMaestro" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreMaestro" name="nombreMaestro" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Edad (*)</label>
                                    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad"/>
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
<div class="modal fade" id="modalActualizarMaestro" tabindex="-1" role="dialog" aria-labelledby="modalActualizarMaestro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Maestro <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarMaestro" name="formActualizarMaestro">
                    <div class="card-body">
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Matrícula (*)</label>
                                    <input type="text" class="form-control" id="idMaestroActualizar" name="idMaestroActualizar" placeholder="Matrícula"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreMaestroActualizar" name="nombreMaestroActualizar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="apellidoPaternoActualizar" name="apellidoPaternoActualizar" placeholder="Apellido Paterno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="apellidoMaternoActualizar" name="apellidoMaternoActualizar" placeholder="Apellido Materno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Edad (*)</label>
                                    <input type="text" class="form-control" id="edadActualizar" name="edadActualizar" placeholder="Edad"/>
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

<!--------------------------------------------------------- Modal DetalleMaestro----------------------------------------------->
<div class="modal fade" id="modalDetalleMaestro" tabindex="-1" role="dialog" aria-labelledby="modalDetalleMaestro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Maestro <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Matrícula (*)</label>
                                    <input disabled type="text" class="form-control" id="idMaestroConsultar" name="idMaestroConsultar" placeholder="Matrícula"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" disabled class="form-control" id="nombreMaestroConsultar" name="nombreMaestroConsultar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" disabled class="form-control" id="apellidoPaternoConsultar" name="apellidoPaternoConsultar" placeholder="Apellido Materno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" disabled class="form-control" id="apellidoMaternoConsultar" name="apellidoMaternoConsultar" placeholder="Apellido Materno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Edad (*)</label>
                                    <input type="text" disabled class="form-control" id="edadConsultar" name="edadConsultar" placeholder="Edad"/>
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

<!-- ****************************** Modal Eliminar Maestro *************************************************-->
<div class="modal fade" id="modalEliminarMaestro" tabindex="-1" role="dialog" aria-labelledby="modalEliminarMaestro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarMaestro" name="formActualizarMaestro">
                <input type="text" hidden id="idEliminarMaestro" name="idEliminarMaestro">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Maestro?</div>
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

    $(document).ready(function (){
        mostrarMaestros();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var mostrarMaestros = function() {
        var tableMaestro = $('#dataTableMaestro').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL');?>maestro/read"
            },
            "columns": [
                { "data": "id_maestro" },
                { "data": "nombre_maestro" },
                { "data": "apppat_maestro" },
                { "data": "appmat_maestro" },
                { "data": "edad_maestro" },
                {data:null,
                    "defaultContent":
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMaestro' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarMaestro' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarMaestro' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableMaestro);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableMaestro tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarMaestro').val(data.id_maestro);

            var idActualizar = $("#idMaestroActualizar").val(data.id_maestro);
            var nombreActualizar = $("#nombreMaestroActualizar").val(data.nombre_maestro);
            var apellidoPatActualizar = $("#apellidoPaternoActualizar").val(data.apppat_maestro);
            var apellidoMatActualizar = $("#apellidoMaternoActualizar").val(data.appmat_maestro);
            var edadActualizar = $("#edadActualizar").val(data.edad_maestro);

            var idConsultar = $("#idMaestroConsultar").val(data.id_maestro);
            var nombreConsulta = $("#nombreMaestroConsultar").val(data.nombre_maestro);
            var apellidoPatConsulta = $("#apellidoPaternoConsultar").val(data.apppat_maestro);
            var apellidoMatConsulta = $("#apellidoMaternoConsultar").val(data.appmat_maestro);
            var edadConsulta = $("#edadConsultar").val(data.edad_maestro);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarMaestro').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>maestro/insert",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Maestro ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>maestro";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el Maestro. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarMaestro').validate({
            rules: {
                nombreMaestro: {
                    required: true
                },
                apellidoPaterno: {
                    required: true
                },
                apellidoMaterno: {
                    required: true
                },
                edad: {
                    required: true
                },
            },
            messages: {
                nombreMaestro: {
                    required: "Ingrese su nombre"
                },
                apellidoPaterno: {
                    required: "Ingrese su apellido paterno"
                },
                apellidoMaterno: {
                    required: "Ingrese su apellido materno"
                },
                edad: {
                    required: "Ingrese su edad"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formActualizarMaestro').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>maestro/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Maestro ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>maestro";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el Maestro. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarMaestro').validate({
            rules: {
                idMaestroActualizar: {
                    required: true,
                    number: true
                },
                nombreMaestroActualizar: {
                    required: true
                },
                apellidoPaternoActualizar: {
                    required: true
                },
                apellidoMaternoActualizar: {
                    required: true
                },
                edadActualizar: {
                    required: true
                }
            },
            messages: {
                idMaestroActualizar: {
                    required: "Ingrese usu matrícula",
                    number: "Sólo números"
                },
                nombreMaestroActualizar: {
                    required: "Ingrese su nombre"
                },
                apellidoPaternoActualizar: {
                    required: "Ingrese su apellido paterno"
                },
                apellidoMaternoActualizar: {
                    required: "Ingrese su apellido materno"
                },
                edadActualizar: {
                    required: "Ingrese su edad"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var eliminarRegistro = function () {
        $( "#formEliminarMaestro" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarMaestro').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>maestro/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La Maestro ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>maestro";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar al Maestro. " + data,
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
