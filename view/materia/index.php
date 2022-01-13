<?php
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('Materia');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarMateria'> <i class="fas fa-plus-circle"></i> Registrar Materia </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Materia</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableMateria" name="dataTableMateria" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Alumnos</th>
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
<div class="modal fade" id="modalRegistrarMateria" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Materia <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarMateria" name="formRegistrarMateria" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Grupo (*)</label>
                                    <input type="text" class="form-control" id="grupoMateria" name="grupoMateria" placeholder="Grupo"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumnos (*)</label>
                                    <input type="text" class="form-control" id="alumnosMateria" name="alumnosMateria" placeholder="Alumnos"/>
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
<div class="modal fade" id="modalActualizarMateria" tabindex="-1" role="dialog" aria-labelledby="modalActualizarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Materia <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarMateria" name="formActualizarMateria">
                <div class="card-body">
                        <div style="display: none;" class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Id (*)</label>
                                    <input type="text" class="form-control" id="idMateriaActualizar" name="idMateriaActualizar" placeholder="Id"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreMateriaActualizar" name="nombreMateriaActualizar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Grupo (*)</label>
                                    <input type="text" class="form-control" id="grupoMateriaActualizar" name="grupoMateriaActualizar" placeholder="Grupo"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Alumnos (*)</label>
                                    <input type="text" class="form-control" id="alumnosMateriaActualizar" name="alumnosMateriaActualizar" placeholder="Alumnos"/>
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

<!--------------------------------------------------------- Modal DetalleMateria----------------------------------------------->
<div class="modal fade" id="modalDetalleMateria" tabindex="-1" role="dialog" aria-labelledby="modalDetalleMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Materia <small> &nbsp;(*) Campos requeridos</small></h4>
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreMateriaConsultar" name="nombreMateriaConsultar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Grupo (*)</label>
                                    <input type="text" class="form-control" id="grupoMateriaConsultar" name="grupoMateriaConsultar" placeholder="Grupo"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Alumnos (*)</label>
                                    <input type="text" class="form-control" id="alumnosMateriaConsultar" name="alumnosMateriaConsultar" placeholder="Alumnos"/>
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

<!-- ****************************** Modal Eliminar Materia *************************************************-->
<div class="modal fade" id="modalEliminarMateria" tabindex="-1" role="dialog" aria-labelledby="modalEliminarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarMateria" name="formActualizarMateria">
                <input type="text" hidden id="idEliminarMateria" name="idEliminarMateria">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Materia?</div>
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
        mostrarMaterias();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var mostrarMaterias = function() {
        var tableMateria = $('#dataTableMateria').DataTable({
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
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMateria' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarMateria' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarMateria' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableMateria);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableMateria tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarMateria').val(data.idMateria);

            // var idActualizar = $("#matriculaActualizar").val(data.idMateria);
            var name_computer_update = $("#name_computer_update").val(data.name_computer_update);
            var apellido = $("#apellidoActualizar").val(data.apellido);

            var idConsulta = $("#matriculaConsultar").val(data.idMateria);
            var nombreConsulta = $("#nombreConsultar").val(data.nombre);
            var apellidoConsulta = $("#apellidoConsultar").val(data.apellido);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarMateria').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>computer/insert",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Materia ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>computer";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el Materia. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarMateria').validate({
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
                var datos = $('#formActualizarMateria').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>computer/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Materia ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>computer";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el Materia. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarMateria').validate({
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
        $( "#formEliminarMateria" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarMateria').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>computer/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La Materia ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>Materia";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar la Materia. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    /*var dataTableFunction = function () {
        var table = $("#dataTableMateria").DataTable({
            responsive: true,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });

        table.buttons().container().appendTo('#dataTableMateria_wrapper .col-md-6:eq(0)');
    }*/
</script>
