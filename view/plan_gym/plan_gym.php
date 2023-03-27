<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('plan_gym');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Planes del Gimnasio</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarPlan_gym'>
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
                                <table id="dataTablePlan_gym" name="dataTablePlan_gym"
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
<div class="modal fade" id="modalRegistrarPlan_gym" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarPlan_gym"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarPlan_gym" enctype="multipart/form-data"
                    name="formRegistrarPlan_gym" method="post">
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
                                                <input type="text" class="form-control" id="costoPlanGym" name="costoPlanGym"
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
                                                <input type="text" class="form-control" id="descripcionPlanGym"
                                                    name="descripcionPlanGym"
                                                    placeholder="Descripcion del plan" />
                                            </div>
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
<div class="modal fade" id="modalActualizarPlan_gym" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarPlan_gym" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan del Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarPlan_gym" enctype="multipart/form-data"
                    name="formActualizarPlan_gym" method="post">
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
                                                <input type="text" class="form-control"
                                                    id="descripcionPlanGymActualizar"
                                                    name="descripcionPlanGymActualizar"
                                                    placeholder="Descripcion del plan" />
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
<div class="modal fade" id="modalDetallePlan_gym" tabindex="-1" role="dialog"
    aria-labelledby="modalDetallePlan_gym" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Plan Gimnasio <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                                id="id_planGymConsultar" name="id_planGymConsultar"
                                                placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="nombrePlanGymConsultar" name="nombrePlanGymConsultar"
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
                                                <input type="text" disabled class="form-control" id="costoPlanGymConsultar"
                                                    name="costoPlanGymConsultar" placeholder="Costo del plan" />
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
                                                    id="descripcionPlanGymConsultar"
                                                    name="descripcionPlanGymConsultar"
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
<div class="modal fade" id="modalEliminarPlan_gym" tabindex="-1" role="dialog"
    aria-labelledby="modalEliminarPlan_gym" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Plan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPlan_gym" name="formActualizarPlan_gym">
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
    mostrarPlan_gym();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
});

var mostrarPlan_gym = function() {
    var tablePlan_sistema = $('#dataTablePlan_gym').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>plan_gym/read"
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
                "data": "costoPlanGym"
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePlan_gym' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPlan_gym' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPlan_gym' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tablePlan_sistema);
}

var obtenerdatosDT = function(table) {
    $('#dataTablePlan_gym tbody').on('click', 'tr', function() {
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
            var datos = $('#formRegistrarPlan_gym').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>plan_gym/insert",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>plan_gym";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar el Plan. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formRegistrarPlan_gym').validate({
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
            var datos = $('#formActualizarPlan_gym').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>plan_gym/update",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El plan se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>plan_gym";
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
    $('#formActualizarPlan_gym').validate({
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
    $("#formEliminarPlan_gym").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarPlan_gym').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>plan_gym/delete",
            data: datos,
            success: function(data) {
                if (data == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El plan ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>plan_gym";
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
