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
                                            <th>Imagen</th>
                                            <th>Nombre del Gimnasio</th>
                                            <th>Teléfono</th>
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
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Gimnasio</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span><label>Imagen del gimnasio (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="imagen" id="imagen" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span><label>Fondo para credenciales de los clientes (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="fondoCredencial" id="fondoCredencial" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre del gimnasio (*)</label>
                                            <input type="text" class="form-control" id="nombreGimnasio"
                                                name="nombreGimnasio" placeholder="Nombre del gimnasio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Teléfono (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="telefono" name="telefono"
                                                    placeholder="Número de teléfono" />
                                            </div>
                                        </div>
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
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Gimnasio</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div style="display: none;" class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Id (*)</label>
                                                <input type="text" class="form-control" id="idGimnasioActualizar"
                                                    name="idGimnasioActualizar" placeholder="Nombre del rol" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre del gimnasio (*)</label>
                                            <input type="text" class="form-control" id="nombreGimnasioActualizar"
                                                name="nombreGimnasioActualizar" placeholder="Nombre del gimnasio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Teléfono (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="telefonoActualizar"
                                                    name="telefonoActualizar" placeholder="Número de teléfono" />
                                            </div>
                                        </div>
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

<!--------------------------------------------------------- Modal Detalle Gimnasio----------------------------------------------->
<div class="modal fade" id="modalDetalleGimnasio" tabindex="-1" role="dialog" aria-labelledby="modalDetalleGimnasio"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
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
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Gimnasio</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Id (*)</label>
                                            <input type="text" disabled class="form-control" id="idGimnasioConsultar"
                                                name="idGimnasioConsultar" placeholder="Id del gimnasio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Teléfono (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="telefonoConsultar"
                                                    name="telefonoConsultar" placeholder="Número de teléfono" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nombre del gimnasio (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="nombreGimnasioConsultar" name="nombreGimnasioConsultar"
                                                placeholder="Nombre del gimnasio" />
                                        </div>
                                    </div>

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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Gimnasio</h5>
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

<!--------------------------------------------------------- Modal Update Image ----------------------------------------------->
<div class="modal fade" id="modalUpdateImage" tabindex="-1" role="dialog" aria-labelledby="modalUpdateImage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card-info">
                <div class="card-header bg-info">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Actualizar Imagen</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdateImage" enctype="multipart/form-data" name="formUpdateImage" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="rounded-circle mx-auto d-inline-block overflow-hidden photo-container" style="width: 150px; height: 150px;">
                                <img src="" alt="gimnasio" id="imgPreview" class="img-fluid" onerror="handleErrorImage(this);">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" hidden class="form-control" id="idGymUpdateImage" name="idGymUpdateImage" placeholder="Id" />
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" onchange="previewImage(event, '#imgPreview')" name="imageInput" id="imageInput" lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione
                                            Fotografía</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-info">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Update Fondo Credencial ----------------------------------------------->
<div class="modal fade" id="modalUpdateBackgroundCredential" tabindex="-1" role="dialog" aria-labelledby="modalUpdateBackgroundCredential" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card-info">
                <div class="card-header bg-secondary">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Actualizar Fondo</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdateBackgroundCredential" enctype="multipart/form-data" name="formUpdateBackgroundCredential" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="mx-auto d-inline-block photo-container" style="width: 150px; height: 150px; margin-bottom: 10px; overflow: hidden;">
                                <img src="" alt="gimnasio" id="imgPreviewBackground" class="img-fluid" onerror="handleErrorImage(this);" style="max-height: 100%;">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" hidden class="form-control" id="idGymUpdateBackground" name="idGymUpdateBackground" placeholder="Id" />
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group input-group" style="margin-bottom: 10px;">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" onchange="previewImage(event, '#imgPreviewBackground')" name="imageBackgroundInput" id="imageBackgroundInput" lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione
                                            Fondo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-secondary">Actualizar</button>
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
    $(document).ready(function () {
        mostrarGimnasios();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        rutaImagen();
        sendFormUpdateImage();
        sendFormUpdateBackgroundCredential()
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
            success: function (data) {
                $.each(data, function (key, registro) {
                    var id = registro.id_gimnasio;
                    var nombre = registro.nombreGimnasio;
                    var telefono = registro.telefono;
                    var imagen = registro.imagen;
                    var fullnameImagen = nombre + '' + telefono + '/' + imagen;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/gimnasio/' +
                        fullnameImagen;
                    $(".id_gimnasio").append('<option value=' + id + '>' + fotoConsulta +
                        '</option>');
                    $('#foto_gimnasioConsultar').attr(fotoConsulta);
                });
            },
            error: function (data) {
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
                'render': function (data, type, JsonResultRow, meta) {
                    var fullnameImagen = JsonResultRow.id_gimnasio + '/' + JsonResultRow.imagen;
                    var urlImg = '<?php echo constant('URL'); ?>public/gimnasio/' + fullnameImagen;
                    return '<center><img src="' + urlImg +
                        '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;" onerror="handleErrorImage(this);"/></center>';
                }
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
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleGimnasio' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarGimnasio' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarGimnasio' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>
                        <button class='eliminar btn btn-info' data-toggle='modal' data-target='#modalUpdateImage' title="Actualizar Imagen"><i class="fa fa-picture-o"></i></button>
                        <button class='btn btn-secondary' data-toggle='modal' data-target='#modalUpdateBackgroundCredential' title="Actualizar Fondo Credencial del Cliente"><i class="fa fa-file-image-o"></i></button>`
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

    function handleErrorImage(image) {
        image.src = '<?php echo constant('URL'); ?>public/img/forcefit.png';
    }

    function previewImage(event, querySelector) {
        const input = event.target;
        $imgPreview = document.querySelector(querySelector);
        if (!input.files.length) return
        file = input.files[0];
        objectURL = URL.createObjectURL(file);
        $imgPreview.src = objectURL;
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableGimnasio tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var routeImageGym = $("#imgPreview").attr("src", '<?php echo constant('URL'); ?>public/gimnasio/' + data.id_gimnasio + '/' + data.imagen);
            var routeImageBackgroundCredential = $("#imgPreviewBackground").attr("src", '<?php echo constant('URL'); ?>public/gimnasio/fondo/' + data.id_gimnasio + '/' + data.fondoCredencial);
            var idGymUpdateImage = $("#idGymUpdateImage").val(data.id_gimnasio);
            var idGymUpdateBackground = $("#idGymUpdateBackground").val(data.id_gimnasio);

            var idEliminar = $('#idEliminarGimnasio').val(data.id_gimnasio);

            var idGimnasioActualizar = $("#idGimnasioActualizar").val(data.id_gimnasio);
            var nombreGimnasioActualizar = $("#nombreGimnasioActualizar").val(data.nombre_gimnasio);
            var telefonoActualizar = $("#telefonoActualizar").val(data.telefono);

            var idGimnasioConsultar = $("#idGimnasioConsultar").val(data.id_gimnasio);
            var nombreGimnasioConsultar = $("#nombreGimnasioConsultar").val(data.nombre_gimnasio);
            var telefonoConsultar = $("#telefonoConsultar").val(data.telefono);
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
                        form_data.append('fondoCredencial', $('#fondoCredencial').prop('files')[0]);
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

                                if (data.trim() == 'ok') {
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
                id_gimnasio: {
                    required: true,
                    number: true
                },
                nombreGimnasio: {
                    required: true
                },
                telefono: {
                    required: true
                },
                imagen: {
                    required: true
                },
                fondoCredencial: {
                    required: true
                },
            },
            messages: {
                id_gimnasio: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombreGimnasio: {
                    required: "Ingresa el nombre del gimnasio"
                },
                telefono: {
                    required: "Ingresa el número de telefono del gimnasio"
                },
                imagen: {
                    required: "Selecciona el logo del gimnasio"
                },
                fondoCredencial: {
                    required: "Selecciona el logo del gimnasio"
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

    var datosActualizar = null;
    $('#formActualizarGimnasio').on('submit', function (e) {
        datosActualizar = new FormData(this);
    });
    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function (e) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>gimnasio/update",
                    data: datosActualizar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submit').attr("disabled", "disabled");
                        $('#formActualizarGimnasio').css("opacity", ".5");
                    },
                    success: function (data) {
                        console.log("data ", data)
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El gimnasio ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location =
                                    "<?php echo constant('URL'); ?>gimnasio";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el gimnasio." + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarGimnasio').validate({
            rules: {
                idGimnasioActualizar: {
                    required: true,
                    number: true
                },
                nombreGimnasioActualizar: {
                    required: true
                },
                telefonoActualizar: {
                    required: true
                }
            },
            messages: {
                idGimnasioActualizar: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombreGimnasioActualizar: {
                    required: "Ingresa un nombre"
                },
                telefonoActualizar: {
                    required: "Ingresa un número de teléfono"
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

    var imageUpdate = null;
    $('#formUpdateImage').on('submit', function(e) {
        imageUpdate = new FormData(this);
    });
    var sendFormUpdateImage = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>gimnasio/UpdateImage",
                    data: imageUpdate,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submit').attr("disabled", "disabled");
                        $('#formUpdateImage').css("opacity", ".5");
                    },
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La imagen ha sido actualizada de manera correcta";
                        var icon = "success";
                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al actualizar la imagen." + data;
                            var icon = "error";
                        }
                        
                        Swal.fire(
                                title,
                                message,
                                icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>gimnasio";
                        });
                    },
                });
            }
        });
        $('#formUpdateImage').validate({
            rules: {
                idGymUpdateImage: {
                    required: true
                },
                imageInput: {
                    required: true
                }
            },
            messages: {
                idGymUpdateImage: {
                    required: "Seleccione el gimnasio"
                },
                imageInput: {
                    required: "Ingrese la fecha"
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

    var imageBackground = null;
    $('#formUpdateBackgroundCredential').on('submit', function(e) {
        imageBackground = new FormData(this);
    });
    var sendFormUpdateBackgroundCredential = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>gimnasio/UpdateBackgroundCredential",
                    data: imageBackground,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submit').attr("disabled", "disabled");
                        $('#formUpdateBackgroundCredential').css("opacity", ".5");
                    },
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La imagen ha sido actualizada de manera correcta";
                        var icon = "success";
                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al actualizar la imagen." + data;
                            var icon = "error";
                        }
                        
                        Swal.fire(
                                title,
                                message,
                                icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>gimnasio";
                        });
                    },
                });
            }
        });
        $('#formUpdateBackgroundCredential').validate({
            rules: {
                idGymUpdateBackground: {
                    required: true
                },
                imageBackgroundInput: {
                    required: true
                }
            },
            messages: {
                idGymUpdateBackground: {
                    required: "Seleccione el gimnasio"
                },
                imageBackgroundInput: {
                    required: "Ingrese la fecha"
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
        $("#formEliminarGimnasio").submit(function (event) {
            event.preventDefault();
            var datos = $('#formEliminarGimnasio').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>gimnasio/delete",
                data: datos,
                success: function (data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El gimnasio ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL'); ?>gimnasio";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el gimnasio. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>

