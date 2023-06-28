<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
 }
 
require 'view/menu.php';
$menu = new Menu();
$menu->header('planGym');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Planes del Gimnasio</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarPlanGym'>
                                <i class="fa fa-edit"></i> Registrar Plan
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTablePlanGym" name="dataTablePlanGym"
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
<div class="modal fade" id="modalRegistrarPlanGym" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarPlanGym"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarPlanGym" enctype="multipart/form-data" name="formRegistrarPlanGym"
                    method="post">
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
                                            <input type="text" class="form-control" id="nombrePlanGym"
                                                name="nombrePlanGym" placeholder="Nombre del plan" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="costoPlanGym"
                                                    name="costoPlanGym" placeholder="Costo del plan" />
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
                                                <textarea type="text" class="form-control" id="descripcionPlanGym"
                                                    name="descripcionPlanGym"
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
<div class="modal fade" id="modalActualizarPlanGym" tabindex="-1" role="dialog" aria-labelledby="modalActualizarPlanGym"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formActualizarPlanGym" enctype="multipart/form-data" name="formActualizarPlanGym"
                    method="post">
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
                                                <input type="text" class="form-control" id="id_planGymActualizar"
                                                    name="id_planGymActualizar" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" class="form-control" id="nombrePlanGymActualizar"
                                                name="nombrePlanGymActualizar" placeholder="Nombre del plan" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="costoPlanGymActualizar"
                                                    name="costoPlanGymActualizar" placeholder="Costo del plan" />
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
                                                    id="descripcionPlanGymActualizar"
                                                    name="descripcionPlanGymActualizar"
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
<div class="modal fade" id="modalDetallePlanGym" tabindex="-1" role="dialog" aria-labelledby="modalDetallePlanGym"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                            <input type="text" disabled class="form-control" id="id_planGymConsultar"
                                                name="id_planGymConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" disabled class="form-control" id="nombrePlanGymConsultar"
                                                name="nombrePlanGymConsultar" placeholder="Nombre" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Costo (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                                </div>
                                                <input type="text" disabled class="form-control"
                                                    id="costoPlanGymConsultar" name="costoPlanGymConsultar"
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
                                                <input type="text" disabled class="form-control"
                                                    id="descripcionPlanGymConsultar" name="descripcionPlanGymConsultar"
                                                    placeholder="Descripcion del plan" />
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
<div class="modal fade" id="modalEliminarPlanGym" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPlanGym"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Plan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPlanGym" name="formActualizarPlanGym">
                <input type="text" hidden id="idEliminarplan_gym" name="idEliminarplan_gym">
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
    mostrarPlanGym();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
});

var mostrarPlanGym = function() {
    var tablePlanGym = $('#dataTablePlanGym').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>planGym/read"
        },
        "columns": [{
                "data": "id_planGym"
            },
            {
                "data": "nombrePlanGym"
            },
            {
                "data": "descripcionPlanGym"
            },
            {
                "data": "costoPlanGym",
                "render": function(data, type, row) {
                    return "<i class='fa fa-dollar'></i> " + data;
                }
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePlanGym' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPlanGym' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPlanGym' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tablePlanGym);
}

var obtenerdatosDT = function(table) {
    $('#dataTablePlanGym tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarplan_gym').val(data.id_planGym);

        var id_planGymActualizar = $("#id_planGymActualizar").val(data.id_planGym);
        var nombrePlanGymActualizar = $("#nombrePlanGymActualizar").val(data.nombrePlanGym);
        var descripcionPlanGymActualizar = $("#descripcionPlanGymActualizar").val(data.descripcionPlanGym);
        var costoPlanGymActualizar = $("#costoPlanGymActualizar").val(data.costoPlanGym);

        var id_planGymConsultar = $("#id_planGymConsultar").val(data.id_planGym);
        var nombrePlanGymConsultar = $("#nombrePlanGymConsultar").val(data.nombrePlanGym);
        var descripcionPlanGymConsultar = $("#descripcionPlanGymConsultar").val(data.descripcionPlanGym);
        var costoPlanGymConsultar = $("#costoPlanGymConsultar").val(data.costoPlanGym);

    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarPlanGym').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>planGym/insert",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>planGym";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar el Plan." + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formRegistrarPlanGym').validate({
        rules: {
            nombrePlanGym: {
                required: true
            },
            descripcionPlanGym: {
                required: true
            },
            costoPlanGym: {
                required: true
            },
        },
        messages: {
            nombrePlanGym: {
                required: "Ingrese el nombre del plan"
            },
            descripcionPlanGym: {
                required: "Ingrese la descripcion"
            },
            costoPlanGym: {
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
            var datos = $('#formActualizarPlanGym').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>planGym/update",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>planGym";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el plan." + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarPlanGym').validate({
        rules: {
            nombrePlanGymActualizar: {
                required: true
            },
            descripcionPlanGymActualizar: {
                required: true
            },
            costoPlanGymActualizar: {
                required: true
            }
        },
        messages: {
            nombrePlanGymActualizar: {
                required: "Ingrese el nombre del plan"
            },
            descripcionPlanGymActualizar: {
                required: "Ingrese la descripcion del plan"
            },
            costoPlanGymActualizar: {
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
    $("#formEliminarPlanGym").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarPlanGym').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>planGym/delete",
            data: datos,
            success: function(data) {
                if (data.trim() == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El plan ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>planGym";
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

