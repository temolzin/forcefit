<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('gimnasio');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Gimnasios</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarGimnasio'>
                                <i class="fa fa-edit"></i> Registrar Gimnasio
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableGimnasio" name="dataTableGimnasio"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del Gimnasio</th>
                                            <th>Teléfono</th>
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
<div class="modal fade" id="modalRegistrarGimnasio" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarGimnasio"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarGimnasio" name="formRegistrarGimnasio" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Gimnasio (*)</label>
                                    <input type="text" class="form-control" id="nombreGimnasio" name="nombreGimnasio"
                                        placeholder="Nombre del gimnasio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Teléfono (*)</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        placeholder="Número de teléfono" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <span><label>Imagen (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input"
                                            name="imagen" id="imagen" lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione Fotografía</label>
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
<div class="modal fade" id="modalActualizarGimnasio" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarGimnasio" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarGimnasio" name="formActualizarGimnasio">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Gimnasio (*)</label>
                                    <input type="text" class="form-control" id="nombreGimnasioActualizar"
                                        name="nombreGimnasioActualizar" placeholder="Nombre del gimnasio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Teléfono (*)</label>
                                    <input type="text" class="form-control" id="telefonoActualizar"
                                        name="telefonoActualizar" placeholder="Número de teléfono" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <span><label>Imagen (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input"
                                            name="imagenGimnasioActualizar" id="imagenGimnasioActualizar" lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione Fotografía</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Detalle Rol----------------------------------------------->
<div class="modal fade" id="modalDetalleGimnasio" tabindex="-1" role="dialog" aria-labelledby="modalDetalleGimnasio"
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
                                    <label>Gimnasio (*)</label>
                                    <input type="text" class="form-control" id="nombreGimnasioActualizar"
                                        name="nombreGimnasioActualizar" placeholder="Nombre del gimnasio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Teléfono (*)</label>
                                    <input type="text" class="form-control" id="telefonoActualizar"
                                        name="telefonoActualizar" placeholder="Número de teléfono" />
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
<div class="modal fade" id="modalEliminarGimnasio" tabindex="-1" role="dialog" aria-labelledby="modalEliminarGimnasio"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarGimnasio" name="formEliminarGimnasio">
                <input type="text" hidden id="idEliminarGimnasio" name="idEliminarGimnasio">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Gimnasio?</div>
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
    $(document).ready(function () {
        mostrarGimnasios();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        rutaImagen();
    });

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>gimnasio/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_gimnasio;
                    var nombre = registro.nombreGimnasio;
                    var telefono = registro.telefono;
                    var imagen = registro.imagen;
                    var fullnameImagen = nombre + '' + telefono + '/' + imagen;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/gimnasio/' + fullnameImagen;
                    $(".id_gimnasio").append('<option value=' + id + '>' + fotoConsulta + '</option>');
                    $('#foto_gimnasioConsultar').attr(fotoConsulta);
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarGimnasios = function () {
        var tableGimnasio = $('#dataTableGimnasio').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>gimnasio/readTable"
            },
            "columns": [{
                "data": "id_gimnasio"
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['nombre_gimnasio'];
                }
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['telefono'];
                }
            },
            {
                defaultContent: "",
                'render': function (data, type, JsonResultRow, meta) {
                    var fullnameImagen = JsonResultRow.nombre_gimnasio + '_' + JsonResultRow.telefono + '/' + JsonResultRow.imagen;
                    var urlImg = '<?php echo constant('URL'); ?>public/gimnasio/' + fullnameImagen;
                    if (JsonResultRow.imagen == null || JsonResultRow.imagen == '') {
                        var urlImg = '<?php echo constant('URL'); ?>public/img/forcefit.png';
                    } else {
                        var urlImg = '<?php echo constant('URL'); ?>public/gimnasio/' + fullnameImagen;
                    }
                    return '<center><img src="' + urlImg + '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;"/></center>';
                }
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleGimnasio' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarGimnasio' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarGimnasio' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableGimnasio);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableGimnasio tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarGimnasio').val(data.id_gimnasio);

            var idRolActualizar = $("#idRolActualizar").val(data.id_rol);
            var nombreRolActualizar = $("#nombreRolActualizar").val(data.nombreRol);
            var descripcionRolActualizar = $("#descripcionRolActualizar").val(data.descripcion);

            var idRolConsultar = $("#idRolConsultar").val(data.id_rol);
            var nombreRolConsultar = $("#nombreRolConsultar").val(data.nombreRol);
            var descripcionRolConsulta = $("#descripcionRolConsultar").val(data.descripcion);
        });
    }

    $.validator.addMethod("selectRequired", function (value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");
    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarGimnasio').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>gimnasio/insert",
                    async: false,
                    data: datos,
                    success: function (data) {
                        console.log("data", data)
                        var id_gimnasio = data;
                        var idGimnasio = id_gimnasio;
                        var form_data = new FormData();
                        imagen = $('#imagen').prop('files')[
                            0]; // Aqui obtienes la imagen del usuario de BBDD
                        $urlImagenBasica =
                            '<?php echo constant('URL'); ?>public/img/forcefit.png';
                        if ($('#imagen').val() == null) {
                            imagen =
                                $urlImagenBasica // Esta la tienes que obtener anteriormente y guardarla en la variable $urlImagenBasica
                        }
                        var imagen = '<?php echo constant('URL'); ?>public/img/forcefit.png';
                        if ($('#imagen').val() != null) {
                            imagen = $('#imagen').prop('files')[0];
                        } else {
                            imagen = "images/default-profile.jpg";
                        }
                        form_data.append('imagen', imagen);
                        form_data.append('nombreGimnasio', document.getElementById(
                            'nombreGimnasio').value);
                        form_data.append('telefono', document.getElementById(
                            'telefono').value);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo constant('URL'); ?>gimnasio/insert",
                            async: false,
                            dataType: 'text', // what to expect back from the PHP script, if anything
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            // data: datos +"&id_usuario="+id_usuario,

                            success: function (data) {

                                if (data == 'ok') {
                                    Swal.fire(
                                        "¡Éxito!",
                                        "El gimnasio ha sido registrado de manera correcta",
                                        "success"
                                    ).then(function () {
                                        window.location =
                                            "<?php echo constant('URL'); ?>gimnasio";
                                    })
                                } else {
                                    Swal.fire(
                                        "¡Error!",
                                        "Ha ocurrido un error al registrar el gimnasio." +
                                        data,
                                        "error"
                                    );
                                }
                            },
                        });

                    },
                });
            }
        });
        $('#formRegistrarGimnasio').validate({
            rules: {
                id_escuela: {
                    required: true,
                    number: true
                },
                foto_escuela: {
                    required: true
                },
                nombre_escuela: {
                    required: true
                },
                cct_escuela: {
                    required: true
                },
                calle_escuela: {
                    required: true
                },
                numxterior_escuela: {
                    required: true
                },
                codigoPostal: {
                    required: true,
                    number: true
                },
                selectEstado: {
                    selectRequired: "default"
                },
                selectMunicipio: {
                    selectRequired: "default"
                },
                selectColonia: {
                    selectRequired: "default"
                },
                telefono_escuela: {

                    required: true,
                    number: true
                },
                email_escuela: {
                    required: true
                },
            },
            messages: {
                id_escuela: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                foto_escuela: {
                    required: "Ingresa Fotografía"
                },
                nombre_escuela: {
                    required: "Ingresa un nombre"
                },
                cct_escuela: {
                    required: "Ingresa un apellido materno"
                },
                numxterior_escuela: {
                    required: "Ingresa el numero Exterior"
                },
                codigoPostal: {
                    required: "Ingrese su código postal",
                    number: "Sólo números"
                },
                selectEstado: {
                    selectRequired: "Ingrese su estado"
                },
                selectMunicipio: {
                    selectRequired: "Ingrese su municipio"
                },
                selectColonia: {
                    selectRequired: "Ingrese su colonia"
                },
                telefono_escuela: {
                    required: "Ingresa el numero Telefono"
                },
                email_escuela: {
                    required: "Ingresa un email"
                },
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
                var datos = $('#formActualizarRol').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>rol/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El rol se ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
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
        $("#formEliminarRol").submit(function (event) {
            event.preventDefault();
            var datos = $('#formEliminarRol').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>rol/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El rol ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
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