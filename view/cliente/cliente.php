<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
 }
 
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
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarCliente'> <i
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
                                <table id="dataTableCliente" name="dataTableCliente"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Nombre del cliente</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
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
<div class="modal fade" id="modalRegistrarCliente" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCliente"
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
                </div>
                <form role="form" id="formRegistrarCliente" enctype="multipart/form-data" name="formRegistrarCliente"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Cliente</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span><label>Imagen del usuario (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="imagen" id="imagen" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Fotografía</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Nombre del Cliente (*)</label>
                                            <input type="text" class="form-control" id="nombreCliente"
                                                name="nombreCliente" placeholder="Nombre Cliente" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidoPaternoCliente"
                                                name="apellidoPaternoCliente" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidoMaternoCliente"
                                                name="apellidoMaternoCliente" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Teléfono (*)</label>
                                        <div class="input-group-prepend">
                                            <input type="text" id="numeroCliente" name="numeroCliente"
                                                class="form-control" placeholder="Telefono">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Calle(*)</label>
                                            <input class="form-control" id="calleCliente" name="calleCliente"
                                                placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input name="coloniaCliente" id="coloniaCliente" class="form-control"
                                                placeholder="Colonia">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input id="municipioCliente" name="municipioCliente" class="form-control"
                                                placeholder="Municipio">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input type="text" class="form-control" id="codigoPostalCliente"
                                                name="codigoPostalCliente" placeholder="Codigo Postal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
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
                <form role="form" id="formActualizarCliente" enctype="multipart/form-data" name="formActualizarCliente"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Cliente</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
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
                                    <div class="col-lg-12">
                                        <span><label>Imagen del usuario (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="imagenClienteActualizar" id="imagenClienteActualizar"
                                                    lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Fotografía</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Nombre del Cliente (*)</label>
                                            <input type="text" class="form-control" id="nombreClienteActualizar"
                                                name="nombreClienteActualizar" placeholder="Nombre Cliente" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control"
                                                id="apellidoPaternoClienteActualizar"
                                                name="apellidoPaternoClienteActualizar"
                                                placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control"
                                                id="apellidoMaternoClienteActualizar"
                                                name="apellidoMaternoClienteActualizar"
                                                placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Teléfono (*)</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input type="text" id="numeroClienteActualizar"
                                                name="numeroClienteActualizar" class="form-control"
                                                data-inputmask='"mask": "(999) 999-9999"' placeholder="Telefono">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Calle(*)</label>
                                            <input class="form-control" id="calleClienteActualizar"
                                                name="calleClienteActualizar" placeholder="Calle">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input name="coloniaClienteActualizar" id="coloniaClienteActualizar"
                                                class="form-control" placeholder="Colonia">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input id="municipioClienteActualizar" name="municipioClienteActualizar"
                                                class="form-control" placeholder="Municipio">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input type="text" class="form-control" id="codigoPostalClienteActualizar"
                                                name="codigoPostalClienteActualizar" placeholder="Codigo Postal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
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
                <form role="form" id="formConsulta" enctype="multipart/form-data" name="formConsulta" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Cliente</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Id (*)</label>
                                            <input type="text" disabled class="form-control" id="id_clienteConsultar"
                                                name="id_clienteConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nombre del Cliente (*)</label>
                                            <input type="text" disabled class="form-control" id="nombreClienteConsultar"
                                                name="nombreClienteConsultar" placeholder="Nombre del cliente" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" disabled class="form-control"
                                                id="apellidoPaternoClienteConsultar"
                                                name="apellidoPaternoClienteConsultar" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" disabled class="form-control"
                                                id="apellidoMaternoClienteConsultar"
                                                name="apellidoMaternoClienteConsultar" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Teléfono (*)</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input type="text" disabled class="form-control" id="numeroClienteConsultar"
                                                name="numeroClienteConsultar" data-inputmask='"mask": "(999) 999-9999"'
                                                placeholder="Número telefonico" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Calle(*)</label>
                                            <input type="text" disabled class="form-control" id="calleClienteConsultar"
                                                name="calleClienteConsultar" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="coloniaClienteConsultar" name="coloniaClienteConsultar"
                                                placeholder="Colonia" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="municipioClienteConsultar" name="municipioClienteConsultar"
                                                placeholder="Municipio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="codigoPostalClienteConsultar" name="codigoPostalClienteConsultar"
                                                placeholder="Codigo Postal" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
    $(document).ready(function () {
        mostrarCliente();
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
            url: "<?php echo constant('URL'); ?>cliente/read",
            async: false,
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    var id = registro.id_cliente;
                    var nombre = registro.nombre_cliente;
                    var apellido = registro.apellido_paterno_cliente;
                    var imagen = registro.imagen;
                    var fullnameImagen = nombre + '' + apellido + '/' + imagen;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/cliente/' +
                        fullnameImagen;
                    $(".id_cliente").append('<option value=' + id + '>' + fotoConsulta +
                        '</option>');
                    $('#foto_clienteConsultar').attr(fotoConsulta);
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    var mostrarCliente = function () {
        var tableCliente = $('#dataTableCliente').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>cliente/readTable"
            },
            "columns": [{
                "data": "id_cliente"
            },
            {
                defaultContent: "",
                'render': function (data, type, JsonResultRow, meta) {
                    var fullnameImagen = JsonResultRow.nombre_cliente + '_' + JsonResultRow
                        .apellido_paterno_cliente + '/' + JsonResultRow.imagen_cliente;
                    var urlImg = '<?php echo constant('URL'); ?>public/cliente/' + fullnameImagen;
                    if (JsonResultRow.imagen_cliente == null || JsonResultRow.imagen_cliente ==
                        '') {
                        var urlImg = '<?php echo constant('URL'); ?>public/img/avatar.png';
                    } else {
                        var urlImg = '<?php echo constant('URL'); ?>public/cliente/' +
                            fullnameImagen;
                    }
                    return '<center><img src="' + urlImg +
                        '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;"/></center>';
                }
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['nombre_cliente'];
                }
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['apellido_paterno_cliente'];
                }
            },
            {
                "data": "apellido_materno_cliente"
            },
            {
                "data": "numero_cliente"
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCliente' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarCliente' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarCliente' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>
                        <button class='eliminar btn btn-secondary' title="Generar Credencial"> <i class="fa fa-credit-card"> </i> </button>`
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

    var obtenerdatosDT = function (table) {
        $('#dataTableCliente tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarcliente').val(data.id_cliente);

            var id_clienteActualizar = $("#id_clienteActualizar").val(data.id_cliente);
            var nombreClienteActualizar = $("#nombreClienteActualizar").val(data.nombre_cliente);
            var apellidoPaternoClienteActualizar = $("#apellidoPaternoClienteActualizar").val(data
                .apellido_paterno_cliente);
            var apellidoMaternoClienteActualizar = $("#apellidoMaternoClienteActualizar").val(data
                .apellido_materno_cliente);
            var municipioClienteActualizar = $("#municipioClienteActualizar").val(data.municipio_cliente);
            var coloniaClienteActualizar = $("#coloniaClienteActualizar").val(data.colonia_cliente);
            var calleClienteActualizar = $("#calleClienteActualizar").val(data.calle_cliente);
            var codigoPostalClienteActualizar = $("#codigoPostalClienteActualizar").val(data
                .codigo_postal_cliente);
            var numeroClienteActualizar = $("#numeroClienteActualizar").val(data.numero_cliente);
            var imagenClienteActualizar = $("#imagenClienteActualizar").val(data.imagen_cliente);


            var id_clienteConsultar = $("#id_clienteConsultar").val(data.id_cliente);
            var nombreClienteConsultar = $("#nombreClienteConsultar").val(data.nombre_cliente);
            var apellidoPaternoClienteConsultar = $("#apellidoPaternoClienteConsultar").val(data
                .apellido_paterno_cliente);
            var apellidoMaternoClienteConsultar = $("#apellidoMaternoClienteConsultar").val(data
                .apellido_materno_cliente);
            var municipioClienteConsultar = $("#municipioClienteConsultar").val(data.municipio_cliente);
            var coloniaClienteConsultar = $("#coloniaClienteConsultar").val(data.colonia_cliente);
            var calleClienteConsultar = $("#calleClienteConsultar").val(data.calle_cliente);
            var codigoPostalClienteConsultar = $("#codigoPostalClienteConsultar").val(data
                .codigo_postal_cliente);
            var numeroClienteConsultar = $("#numeroClienteConsultar").val(data.numero_cliente);
        });
    }

    $.validator.addMethod("selectRequired", function (value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");
    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarCliente').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>cliente/insert",
                    async: false,
                    data: datos,
                    success: function (data) {
                        console.log("data", data)
                        var id_cliente = data;
                        var idCliente = id_cliente;
                        var form_data = new FormData();
                        imagen = $('#imagen').prop('files')[
                            0]; // Aqui obtienes la imagen del usuario de BBDD
                        $urlImagenBasica =
                            '<?php echo constant('URL'); ?>public/img/avatar.png';
                        if ($('#imagen').val() == null) {
                            imagen =
                                $urlImagenBasica // Esta la tienes que obtener anteriormente y guardarla en la variable $urlImagenBasica
                        }
                        var imagen = '<?php echo constant('URL'); ?>public/img/avatar.png';
                        if ($('#imagen').val() != null) {
                            imagen = $('#imagen').prop('files')[0];
                        } else {
                            imagen = "images/default-profile.jpg";
                        }
                        form_data.append('imagen', imagen);
                        form_data.append('nombreCliente', document.getElementById(
                            'nombreCliente').value);
                        form_data.append('apellidoPaternoCliente', document.getElementById(
                            'apellidoPaternoCliente').value);
                        form_data.append('apellidoMaternoCliente', document.getElementById(
                            'apellidoMaternoCliente').value);
                        form_data.append('municipioCliente', document.getElementById(
                            'municipioCliente').value);
                        form_data.append('coloniaCliente', document.getElementById(
                            'coloniaCliente').value);
                        form_data.append('calleCliente', document.getElementById('calleCliente')
                            .value);
                        form_data.append('codigoPostalCliente', document.getElementById(
                            'codigoPostalCliente').value);
                        form_data.append('numeroCliente', document.getElementById(
                            'numeroCliente').value);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo constant('URL'); ?>cliente/insert",
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
                                        "El cliente ha sido registrado de manera correcta",
                                        "success"
                                    ).then(function () {
                                        window.location =
                                            "<?php echo constant('URL'); ?>cliente";
                                    })
                                } else {
                                    Swal.fire(
                                        "¡Error!",
                                        "Ha ocurrido un error al registrar el cliente." +
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
        $('#formRegistrarCliente').validate({
            rules: {
                nombreCliente: {
                    required: true
                },
                apellidoPaternoCliente: {
                    required: true
                },
                apellidoMaternoCliente: {
                    required: true
                },
                municipioCliente: {
                    required: true
                },
                coloniaCliente: {
                    required: true
                },
                calleCliente: {
                    required: true
                },
                codigoPostalCliente: {
                    required: true
                },
                imagen: {
                    required: true
                },
                numeroCliente: {
                    required: true
                },
            },
            messages: {
                nombreCliente: {
                    required: "Ingrese el nombre del cliente"
                },
                apellidoPaternoCliente: {
                    required: "Ingresa el apellido paterno"
                },
                apellidoMaternoCliente: {
                    required: "Ingresa el apellido materno"
                },
                municipioCliente: {
                    required: "Ingresa el municipio"
                },
                coloniaCliente: {
                    required: "Ingresa la colonia"
                },
                calleCliente: {
                    required: "Ingresa la calle"
                },
                codigoPostalCliente: {
                    required: "Ingresa el Codigo Postal"
                },
                imagen: {
                    required: "Ingresa la imagen del cliente"
                },
                numeroCliente: {
                    required: "Ingresa el numero telefonico"
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
    $('#formActualizarCliente').on('submit', function (e) {
        datosActualizar = new FormData(this);
    });
    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function (e) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>cliente/update",
                    data: datosActualizar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submit').attr("disabled", "disabled");
                        $('#formActualizarCliente').css("opacity", ".5");
                    },
                    success: function (data) {
                        console.log("data ", data)
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El cliente ha sido actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location =
                                    "<?php echo constant('URL'); ?>cliente";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al actualizar el cliente." + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarCliente').validate({
            rules: {
                nombreClienteActualizar: {
                    required: true
                },
                apellidoPaternoClienteActualizar: {
                    required: true
                },
                apellidoMaternoClienteActualizar: {
                    required: true
                },
                municipioClienteActualizar: {
                    required: true
                },
                coloniaClienteActualizar: {
                    required: true
                },
                calleClienteActualizar: {
                    required: true
                },
                codigoPostalClienteActualizar: {
                    required: true
                },
                numeroClienteActualizar: {
                    required: true
                },
                imagenClienteActualizar: {
                    required: true
                }
            },
            messages: {
                nombreClienteActualizar: {
                    required: "Ingrese el nombre del cliente"
                },
                apellidoPaternoClienteActualizar: {
                    required: "Ingresa el apellido paterno"
                },
                apellidoMaternoClienteActualizar: {
                    required: "Ingresa el apellido materno"
                },
                municipioClienteActualizar: {
                    required: "Ingresa el municipio"
                },
                coloniaClienteActualizar: {
                    required: "Ingresa la colonia"
                },
                calleClienteActualizar: {
                    required: "Ingresa la calle"
                },
                codigoPostalClienteActualizar: {
                    required: "Ingresa el Codigo Postal"
                },
                numeroClienteActualizar: {
                    required: "Ingresa el numero telefonico"
                },
                imagenClienteActualizar: {
                    required: "Ingresa la imagen del cliente"
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
        $("#formEliminarCliente").submit(function (event) {
            event.preventDefault();
            var datos = $('#formEliminarCliente').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>cliente/delete",
                data: datos,
                success: function (data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Cliente ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
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
</script>

