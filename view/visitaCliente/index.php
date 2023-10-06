<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
}

require 'view/menu.php';
$menu = new Menu();
$menu->header('visita');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Visitas al Gym</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegisterEntry'>
                                <i class="fa fa-edit"></i> Registrar Entrada
                            </button>
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegisterExit'>
                                <i class="fa fa-edit"></i> Registrar Salida
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableVisit" name="dataTableVisit" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Cliente</th>
                                            <th>Fecha</th>
                                            <th>Hora Entrada</th>
                                            <th>Hora Salida</th>
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
<!--------------------------------------------------------- Modal Registrar Entrada----------------------------------------------->
<div class="modal fade" id="modalRegisterEntry" tabindex="-1" role="dialog" aria-labelledby="modalRegisterEntry" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Visita <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegisterEntry" enctype="multipart/form-data" name="formRegisterEntry" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la visita</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Cliente(*)</label>
                                        <select name="cliente_id" id="cliente_id" class="form-control" style="width:100%;">
                                            <option value="">Selecciona un cliente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="sendFormRegisterEntry(event)">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Registrar Salida----------------------------------------------->
<div class="modal fade" id="modalRegisterExit" tabindex="-1" role="dialog" aria-labelledby="modalRegisterExit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Visita <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegisterExit" enctype="multipart/form-data" name="formRegisterExit" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la visita</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Cliente(*)</label>
                                        <select name="id_cliente" id="id_cliente" class="form-control" style="width:100%;">
                                            <option value="">Selecciona un cliente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="sendFormRegisterExit(event)">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalUpdateVisit" tabindex="-1" role="dialog" aria-labelledby="modalUpdateVisit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Visita<small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdateVisit" enctype="multipart/form-data" name="formUpdateVisit" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la visita</h3>
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
                                                <input type="text" class="form-control" id="id_visitUpdate" name="id_visitUpdate" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre del cliente (*)</label>
                                            <select name="cliente_id_Update" id="cliente_id_Update" class="form-control" style="width:100%;">
                                                <option value="">Selecciona un cliente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="dateVisitUpdate" name="dateVisitUpdate" placeholder="Fecha" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora Entrada (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="hourEntryVisitUpdate" name="hourEntryVisitUpdate" placeholder="Hora de Entrada"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora Salida (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="hourExitVisitUpdate" name="hourExitVisitUpdate" placeholder="Hora de Salida"></input>
                                            </div>
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

<!--------------------------------------------------------- Modal Detalle Visita----------------------------------------------->
<div class="modal fade" id="modalDetailVisit" tabindex="-1" role="dialog" aria-labelledby="modalDetailVisit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Visita <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formConsult" enctype="multipart/form-data" name="formConsult" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la visita</h3>
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
                                            <input type="text" disabled class="form-control" id="id_visitConsult" name="id_visitConsult" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nombre del cliente (*)</label>
                                            <input type="text" disabled class="form-control" id="nameClienteConsult" name="nameClienteConsult" placeholder="Nombre del Cliente" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="dateVisitConsult" name="dateVisitConsult" placeholder="Fecha" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora Entrada (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="hourEntryVisitConsult" name="hourEntryVisitConsult" placeholder="Hora de Entrada" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora Salida (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="hourExitVisitConsult" name="hourExitVisitConsult" placeholder="Hora de Salida" />
                                            </div>
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

<!-- ****************************** Modal Eliminar Visita *************************************************-->
<div class="modal fade" id="modalDeleteVisit" tabindex="-1" role="dialog" aria-labelledby="modalDeleteVisit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Visita</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formDeleteVisit" name="formDeleteVisit">
                <input type="text" hidden id="idDeleteVisit" name="idDeleteVisit">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar esta visita?</div>
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
        dataTableVisit();
        sendFormRegisterEntry();
        sendFormRegisterExit();
        sendFormUpdateVisit();
        deleteVisit();
    });

    var dataTableVisit = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        var tableVisit = $('#dataTableVisit').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>VisitaCliente/readTableVisit?id_gimnasio=" + id_gimnasio
            },
            "columns": [{
                    "data": "id_visit"
                },
                {
                    defaultContent: "",
                    'render': function(data, type, JsonResultRow, meta) {
                        var fullnameImagen = JsonResultRow.image_client;
                        var urlImg = '<?php echo constant('URL'); ?>public/cliente/' + fullnameImagen;
                        if (JsonResultRow.image_client == null || JsonResultRow.image_client ==
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
                    "data": "name_client"
                },
                {
                    "data": "date"
                },
                {
                    "data": "hour_entry"
                },
                {
                    "data": "hour_exit"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetailVisit' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalUpdateVisit' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalDeleteVisit' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf'],
            dom: 'Bfltip'
        });
        getDatasDT(tableVisit);
    }

    var getDatasDT = function(table) {
        $('#dataTableVisit tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idDeleteVisit').val(data.id_visit);

            var id_visitUpdate = $("#id_visitUpdate").val(data.id_visit);
            var cliente_id_Update = $("#cliente_id_Update").val(data.id_client);
            var cliente_id_Update = $("#cliente_id_Update").val(data.id_client);
            var hourEntryVisitUpdate = $("#hourEntryVisitUpdate").val(data.hour_entry);
            var hourExitVisitUpdate = $("#hourExitVisitUpdate").val(data.hour_exit);
            var dateVisitUpdate = $("#dateVisitUpdate").val(data.date);

            var id_visitConsult = $("#id_visitConsult").val(data.id_visit);
            var nameClienteConsult = $("#nameClienteConsult").val(data.name_client);
            var dateVisitConsult = $("#dateVisitConsult").val(data.date);
            var hourEntryVisitConsult = $("#hourEntryVisitConsult").val(data.hour_entry);
            var hourExitVisitConsult = $("#hourExitVisitConsult").val(data.hour_exit);
        });
    }

    var getClientsByGym = $(document).ready(function() {
        $.ajax({
            url: 'VisitaCliente/getClientsByGym?id_gimnasio=<?php echo $_SESSION['id_gimnasio']; ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                data.forEach(function(cliente) {
                    $('#cliente_id').append('<option value="' + cliente.id_cliente + '">' + cliente.nombre_cliente + ' ' + cliente.apellido_paterno_cliente + ' ' + cliente.apellido_materno_cliente + '</option>');

                    $('#cliente_id_Update').append('<option value="' + cliente.id_cliente + '">' + cliente.nombre_cliente + ' ' + cliente.apellido_paterno_cliente + ' ' + cliente.apellido_materno_cliente + '</option>');
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    var getClientsInGym = $(document).ready(function() {
        $.ajax({
            url: 'VisitaCliente/getClientsInGym?id_gimnasio=<?php echo $_SESSION['id_gimnasio']; ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                data.forEach(function(cliente) {
                    $('#id_cliente').append('<option value="' + cliente.id_cliente + '">' + cliente.nombre_cliente + ' ' + cliente.apellido_paterno_cliente + ' ' + cliente.apellido_materno_cliente + '</option>');
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    var sendFormRegisterEntry = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegisterEntry').serialize();
                datos += '&id_gimnasio=' + encodeURIComponent(id_gimnasio);
                console.log(datos)
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>VisitaCliente/insertEntry",
                    data: datos,
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La entrada ha sido registrado de manera correcta";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al registrar la visita." + data;
                            var icon = "error";
                        }

                        Swal.fire(
                            title,
                            message,
                            icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>VisitaCliente";
                        });
                    },
                });
            }
        });
        $('#formRegisterEntry').validate({
            rules: {
                cliente_id: {
                    required: true
                },
            },
            messages: {
                cliente_id: {
                    required: "Selecciona un cliente"
                },
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

    var sendFormRegisterExit = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegisterExit').serialize();
                datos += '&id_gimnasio=' + encodeURIComponent(id_gimnasio);
                console.log(datos)
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>VisitaCliente/insertExit",
                    data: datos,
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La salida ha sido registrado de manera correcta";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al registrar la salida." + data;
                            var icon = "error";
                        }

                        Swal.fire(
                            title,
                            message,
                            icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>VisitaCliente";
                        });
                    },
                });
            }
        });
        $('#formRegisterExit').validate({
            rules: {
                id_cliente: {
                    required: true
                },
            },
            messages: {
                id_cliente: {
                    required: "Selecciona un cliente"
                },
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

    var sendFormUpdateVisit = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formUpdateVisit').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>VisitaCliente/update",
                    data: datos,
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La visita ha sido Actualizada de manera correcta";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al Actualizar la visita." + data;
                            var icon = "error";
                        }

                        Swal.fire(
                            title,
                            message,
                            icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>VisitaCliente";
                        });
                    },
                });
            }
        });
        $('#formUpdateVisit').validate({
            rules: {
                cliente_id_Update: {
                    required: true
                },
                hourEntryVisitUpdate: {
                    required: true
                },
                hourExitVisitUpdate: {
                    required: true
                },
                dateVisitUpdate: {
                    required: true
                }
            },
            messages: {
                cliente_id_Update: {
                    required: "Seleccione el cliente"
                },
                hourEntryVisitUpdate: {
                    required: "Ingrese la la hora de entrada"
                },
                hourExitVisitUpdate: {
                    required: "Ingrese la hora de salida"
                },
                dateVisitUpdate: {
                    required: "Ingrese la fecha"
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

    var deleteVisit = function() {
        $("#formDeleteVisit").submit(function(event) {
            event.preventDefault();
            var datos = $('#formDeleteVisit').serialize();
            console.log(datos);
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>VisitaCliente/delete",
                data: datos,
                success: function(data) {
                    var title = "¡Éxito!";
                    var message = "La visita ha sido eliminada correctamente";
                    var icon = "success";

                    if (data.trim() !== 'ok') {
                        var title = "¡Error!";
                        var message = "Ha ocurrido un error al eliminar la visita. " + data;
                        var icon = "error";
                    }

                    Swal.fire(
                        title,
                        message,
                        icon
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>VisitaCliente";
                    });
                },
            });
        });
    }
</script>
