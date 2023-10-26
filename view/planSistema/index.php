<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('planSistema');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Planes del Sistema</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal'
                                data-target='#modalRegistrarPlanSistema'> <i class="fa fa-edit"></i> Registrar Plan
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTablePlanSistema" name="dataTablePlanSistema"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del plan</th>
                                            <th>Descripcion</th>
                                            <th>Costo</th>
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
<div class="modal fade" id="modalRegistrarPlanSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalRegistrarPlanSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarPlanSistema" enctype="multipart/form-data"
                    name="formRegistrarPlanSistema" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Plan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" class="form-control" id="nombre_plan_sistema"
                                                name="nombre_plan_sistema" placeholder="Nombre del plan" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="costo" name="costo"
                                                    placeholder="Costo del plan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                </div>
                                                <textarea type="text" class="form-control" id="descripcion_plan_sistema"
                                                    name="descripcion_plan_sistema"
                                                    placeholder="Descripcion del plan"></textarea>
                                            </div>
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

                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarPlanSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarPlanSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formActualizarPlanSistema" enctype="multipart/form-data"
                    name="formActualizarPlanSistema" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Plan</h3>
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
                                                <input type="text" class="form-control" id="id_plan_sistemaActualizar"
                                                    name="id_plan_sistemaActualizar" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" class="form-control" id="nombre_plan_sistemaActualizar"
                                                name="nombre_plan_sistemaActualizar" placeholder="Nombre del plan" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="costoActualizar"
                                                    name="costoActualizar" placeholder="Costo del plan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                </div>
                                                <textarea type="text" class="form-control"
                                                    id="descripcion_plan_sistemaActualizar"
                                                    name="descripcion_plan_sistemaActualizar"
                                                    placeholder="Descripcion del plan"></textarea>
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

<!--------------------------------------------------------- Modal Detalle Plan Sistema----------------------------------------------->
<div class="modal fade" id="modalDetallePlanSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalDetallePlanSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formConsulta" enctype="multipart/form-data" name="formConsulta" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Plan</h3>
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
                                            <input type="text" disabled class="form-control"
                                                id="id_plan_sistemaConsultar" name="id_plan_sistemaConsultar"
                                                placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="nombre_plan_sistemaConsultar" name="nombre_plan_sistemaConsultar"
                                                placeholder="Nombre" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="costoConsultar"
                                                    name="costoConsultar" placeholder="Costo del plan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                </div>
                                                <textarea type="text" disabled class="form-control"
                                                    id="descripcion_plan_sistemaConsultar"
                                                    name="descripcion_plan_sistemaConsultar"
                                                    placeholder="Descripcion del plan"></textarea>
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

<!-- ****************************** Modal Eliminar Rol *************************************************-->
<div class="modal fade" id="modalEliminarPlanSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalEliminarPlanSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Plan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPlanSistema" name="formActualizarPlanSistema">
                <input type="text" hidden id="idEliminarplan_sistema" name="idEliminarplan_sistema">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Plan?</div>
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
    mostrarPlanSistema();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
});

var mostrarPlanSistema = function() {
    var tablePlanSistema = $('#dataTablePlanSistema').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>planSistema/readTable"
        },
        "columns": [{
                "data": "id_plan_sistema"
            },
            {
                "data": "nombre_plan_sistema"
            },
            {
                "data": "descripcion_plan_sistema"
            },
            {
                "data": "costo",
                "render": function(data, type, row) {
                    return "<i class='fa fa-dollar'></i> " + data;
                }
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePlanSistema' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPlanSistema' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPlanSistema' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tablePlanSistema);
}


var obtenerdatosDT = function(table) {
    $('#dataTablePlanSistema tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarplan_sistema').val(data.id_plan_sistema);

        var id_plan_sistemaActualizar = $("#id_plan_sistemaActualizar").val(data.id_plan_sistema);
        var nombre_plan_sistemaActualizar = $("#nombre_plan_sistemaActualizar").val(data
            .nombre_plan_sistema);
        var descripcion_plan_sistemaActualizar = $("#descripcion_plan_sistemaActualizar").val(data
            .descripcion_plan_sistema);
        var costoActualizar = $("#costoActualizar").val(data.costo);


        var id_plan_sistemaConsultar = $("#id_plan_sistemaConsultar").val(data.id_plan_sistema);
        var nombre_plan_sistemaConsultar = $("#nombre_plan_sistemaConsultar").val(data.nombre_plan_sistema);
        var descripcion_plan_sistemaConsultar = $("#descripcion_plan_sistemaConsultar").val(data
            .descripcion_plan_sistema);
        var costoConsultar = $("#costoConsultar").val(data.costo);

    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarPlanSistema').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>planSistema/insert",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>planSistema";
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
    $('#formRegistrarPlanSistema').validate({
        rules: {
            nombre_plan_sistema: {
                required: true
            },
            descripcion_plan_sistema: {
                required: true
            },
            costo: {
                required: true
            },
        },
        messages: {
            nombre_plan_sistema: {
                required: "Ingrese el nombre del plan"
            },
            descripcion_plan_sistema: {
                required: "Ingrese la descripcion"
            },
            costo: {
                required: "Ingrese el costo del plan"
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
            var datos = $('#formActualizarPlanSistema').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>planSistema/update",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>planSistema";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el plan. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarPlanSistema').validate({
        rules: {
            nombre_plan_sistemaActualizar: {
                required: true
            },
            descripcion_plan_sistemaActualizar: {
                required: true
            },
            costoActualizar: {
                required: true
            }
        },
        messages: {
            nombre_plan_sistemaActualizar: {
                required: "Ingrese el nombre del plan"
            },
            descripcion_plan_sistemaActualizar: {
                required: "Ingrese la descripcion del plan"
            },
            costoActualizar: {
                required: "Ingrese el costo del plan"
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
    $("#formEliminarPlanSistema").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarPlanSistema').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>planSistema/delete",
            data: datos,
            success: function(data) {
                if (data.trim() == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El plan ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>planSistema";
                    })
                } else {
                    Swal.fire(
                        "¡Error!",
                        "Ha ocurrido un error al eliminar el plan. " + data,
                        "error"
                    );
                }
            },
        });
    });
}
</script>

