<?php
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('Computadora');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarComputadora'> <i class="fas fa-plus-circle"></i> Registrar Computadora </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Computadora</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableComputadora" name="dataTableComputadora" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
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
<div class="modal fade" id="modalRegistrarComputadora" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarComputadora" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Computadora <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarComputadora" name="formRegistrarComputadora" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="name_computer" name="name_computer" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Precio (*)</label>
                                    <input type="text" class="form-control" id="price_computer" name="price_computer" placeholder="Precio"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Modelo (*)</label>
                                    <input type="text" class="form-control" id="model_computer" name="model_computer" placeholder="Modelo"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Color (*)</label>
                                    <input type="text" class="form-control" id="color_computer" name="color_computer" placeholder="Color"/>
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
<div class="modal fade" id="modalActualizarComputadora" tabindex="-1" role="dialog" aria-labelledby="modalActualizarComputadora" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Computadora <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarComputadora" name="formActualizarComputadora">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="name_computer_update" name="name_computer_update" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellidos (*)</label>
                                    <input type="text" class="form-control" id="apellidoActualizar" name="apellidoActualizar" placeholder="Apellidos"/>
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

<!--------------------------------------------------------- Modal DetalleComputadora----------------------------------------------->
<div class="modal fade" id="modalDetalleComputadora" tabindex="-1" role="dialog" aria-labelledby="modalDetalleComputadora" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Computadora <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                    <input disabled type="text" class="form-control" id="matriculaConsultar" name="matriculaConsultar" placeholder="Matrícula"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" disabled class="form-control" id="name_computer_select" name="nombreConsultar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellidos (*)</label>
                                    <input type="text" disabled class="form-control" id="apellidoConsultar" name="apellidoConsultar" placeholder="Apellidos"/>
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

<!-- ****************************** Modal Eliminar Computadora *************************************************-->
<div class="modal fade" id="modalEliminarComputadora" tabindex="-1" role="dialog" aria-labelledby="modalEliminarComputadora" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarComputadora" name="formActualizarComputadora">
                <input type="text" hidden id="idEliminarComputadora" name="idEliminarComputadora">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Computadora?</div>
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
        mostrarComputadoras();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var mostrarComputadoras = function() {
        var tableComputadora = $('#dataTableComputadora').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL');?>computer/read"
            },
            "columns": [
                { "data": "id_computer" },
                { "data": "name_computer" },
                { "data": "price_computer" },
                { "data": "model_computer" },
                { "data": "color_computer" },
                {data:null,
                    "defaultContent":
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleComputadora' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarComputadora' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarComputadora' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableComputadora);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableComputadora tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarComputadora').val(data.idComputadora);

            // var idActualizar = $("#matriculaActualizar").val(data.idComputadora);
            var name_computer_update = $("#name_computer_update").val(data.name_computer_update);
            var apellido = $("#apellidoActualizar").val(data.apellido);

            var idConsulta = $("#matriculaConsultar").val(data.idComputadora);
            var nombreConsulta = $("#nombreConsultar").val(data.nombre);
            var apellidoConsulta = $("#apellidoConsultar").val(data.apellido);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarComputadora').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>computer/insert",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Computadora ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>computer";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el Computadora. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarComputadora').validate({
            rules: {
                name_computer: {
                    required: true
                },
                price_computer: {
                    required: true
                },
                price_computer: {
                    required: true
                },
                model_computer: {
                    required: true
                },
                color_computer: {
                    required: true
                }
            },
            messages: {
                name_computer: {
                    required: "Ingresa un nombre"
                },
                price_computer: {
                    required: "Ingresa un precio"
                },
                model_computer: {
                    required: "Ingresa un modelo"
                },
                color_computer: {
                    required: "Ingresa un color"
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
                var datos = $('#formActualizarComputadora').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>computer/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Computadora ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>computer";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el Computadora. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarComputadora').validate({
            rules: {
                matriculaActualizar: {
                    required: true,
                    number: true
                },
                nombreActualizar: {
                    required: true
                },
                apellidoActualizar: {
                    required: true
                }
            },
            messages: {
                matriculaActualizar: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombreActualizar: {
                    required: "Ingresa un nombre"
                },
                apellidoActualizar: {
                    required: "Ingresa un apellido"
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
        $( "#formEliminarComputadora" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarComputadora').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>computer/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La Computadora ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>Computadora";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar la Computadora. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    /*var dataTableFunction = function () {
        var table = $("#dataTableComputadora").DataTable({
            responsive: true,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });

        table.buttons().container().appendTo('#dataTableComputadora_wrapper .col-md-6:eq(0)');
    }*/
</script>
