<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
 }
 
require 'view/menu.php';
$menu = new Menu();
$menu->header('Pago');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Pagos</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarPago'> <i
                                    class="fa fa-edit"></i> Registrar Pago
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTablePago" name="dataTablePago"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cantidad</th>
                                            <th>Fecha y hora de pago</th>
                                            <th>Vencimiento</th>
                                            <th>Cliente</th>
                                            <th>plan Gimnasio</th>
                                            <th>Forma de pago</th>
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
<!--------------------------------------------------------- Modal Registrar pago----------------------------------------------->
<div class="modal fade" id="modalRegistrarPago" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarPago"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pagos <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarPago" enctype="multipart/form-data" name="formRegistrarPago"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Pago</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Cantidad (*)</label>
                                            <input type="text" class="form-control" id="cantidadPago"
                                                name="cantidadPago" placeholder="cantidad del Pago" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Fecha de vencimiento(*)</label>
                                            <input type="text" class="form-control" id="vencimientoPago"
                                                name="vencimientoPago" placeholder="Vencimiento de pago" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Cliente que realiza el pago (*)</label>
                                        <div><select class="pagoRegistrarCliente" style="width: 100%" name="idCliente">
                                        <option>Busque Cliente que realiza el pago</option>
                                    </select></div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Plan Gimnasio(*)</label>
                                        <div><select class="pagoRegistrarPlanGym" style="width: 100%" id="idPlanGym" name="idPlanGym">
                                        <option>Seleccione Plan Gimnasio</option>
                                    </select></div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo de pago (*)</label>
                                            <select name="tipoPago" id="tipoPago" class="form-control descripcion_pago">
                                                <option value="default">Seleccione la forma de pago</option>
                                                <option>Tarjeta</option>
                                                <option>Tranferencia</option>
                                                <option>Efectivo</option>
                                                <option>pay pal</option>
                                            </select>
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
<!--------------------------------------------------------- Modal Actualizar Pago----------------------------------------------->
<div class="modal fade" id="modalActualizarPago" tabindex="-1" role="dialog" aria-labelledby="modalActualizarPago"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarPago" enctype="multipart/form-data" name="formActualizarPago"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">

                                <h3 class="card-title">Datos del Pago</h3>
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
                                                <input type="text" class="form-control" id="id_PagoActualizar" name="id_PagoActualizar" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>$ Cantidad (*)</label>
                                            <input type="text" class="form-control" id="cantidadPagoActualizar" name="cantidadPagoActualizar" placeholder="Cantidad" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Fecha de Vencimineto</label>
                                            <input type="text" class="form-control" id="vencimientoPagoActualizar" name="vencimientoPagoActualizar" placeholder="2023-05-07" />
                                        </div>
                                    </div>
                                   <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Cliente que realiza el pago (*)</label>
                                        <div><select class="pagoActualizarCliente" style="width: 100%" id="idClientePagoActualizar" name="idClientePagoActualizar"></select></div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3">
                                         <div class="form-group">
                                        <label>plan Gimnasio (*)</label>
                                            <div><select class="pagoActualizarPlanGym" style="width: 100%" id="idplanPagoGymActualizar" name="idplanPagoGymActualizar"></select></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo de pago (*)</label>
                                            <select name="tipoPagoActualizar" id="tipoPagoActualizar" class="form-control descripcion_pago">
                                                <option value="default">Seleccione la forma de pago</option>
                                                <option>Tarjeta</option>
                                                <option>Tranferencia</option>
                                                <option>Efectivo</option>
                                                <option>pay pal</option>
                                            </select>
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


<!--------------------------------------------------------- Modal Detalle Pago----------------------------------------------->
<div class="modal fade" id="modalDetallePago" tabindex="-1" role="dialog" aria-labelledby="modalDetallePagos"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title"> Pago <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                <h3 class="card-title">Datos del Pago</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input type="text" disabled class="form-control" id="id_pagoConsultar" name="id_pagoConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="text" disabled class="form-control" id="cantidadPagoConsultar" name="cantidadPagoConsultar" placeholder="Cantidad" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Fecha y hora de pago</label>
                                            <input type="text" disabled class="form-control" id="fechaPagoConsultar" name="fechaPagoConsultar" placeholder="Fecha del pago" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Vencimiento</label>
                                            <input type="text" disabled class="form-control" id="vencimientoPagoConsultar" name="vencimientoPagoConsultar" placeholder="Vencimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Cliente</label>
                                            <input type="text" disabled class="form-control" id="idClientePagoConsultar" name="idClientePagoConsultar" placeholder="Cliente" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>plan Gimnasio</label>
                                            <input type="text" disabled class="form-control" id="idPlangymConsultar" name="idPlangymConsultar" placeholder="Plan Gym" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Forma de pago</label>
                                            <input type="text" disabled class="form-control" id="formaPagoConsultar" name="formaPagoConsultar" placeholder="Forma de pago" />
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

<!-- ****************************** Modal Eliminar Pago*************************************************-->
<div class="modal fade" id="modalEliminarPago" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPago"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Pago</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPago" name="formEliminarPago">
                <input type="text" hidden id="idEliminarPago" name="idEliminarPago">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Pago?</div>
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
    mostrarPago();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
});


function initializeSelect2($element, parentElement) {
  $element.select2({
    dropdownParent: parentElement,
    ajax: {
      url: "<?php echo constant('URL'); ?>pago/readClientes",
      dataType: 'json',
      data: function (params) {
        var queryParameters = {
          id_user: "<?php echo $_SESSION['id_usuario']; ?>",
          q: params.term
        }
        return queryParameters;
      },
    }
  });
}

initializeSelect2($('.pagoRegistrarCliente'), $('#modalRegistrarPago'));
initializeSelect2($('.pagoActualizarCliente'), $('#modalActualizarPago'));

function initializeSelects2($element, parentElement) {
  $element.select2({
    dropdownParent: parentElement,
    ajax: {
      url: "<?php echo constant('URL'); ?>pago/readPlanGym",
      dataType: 'json',
      data: function (params) {
        var queryParameters = {
          id_user: "<?php echo $_SESSION['id_usuario']; ?>",
          q: params.term
        }
        return queryParameters;
      },
    }
  });
}

initializeSelects2($('.pagoRegistrarPlanGym'), $('#modalRegistrarPago'));
initializeSelects2($('.pagoActualizarPlanGym'), $('#modalActualizarPago'));


var mostrarPago = function() {
    var tablePago = $('#dataTablePago').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>pago/read"
        },

        "columns": [{
                "data": "id_pago"
            },
            {
                "data": "cantidad_pago",
                "render": function(data, type, row) {
                    return "<i class='fa fa-dollar'></i> " + data;
                }
            },
            {
                "data": "fecha_hora_pago"
            },
            {
                "data": "vencimiento"
            },
            {
                "data": "nombre_cliente"
            },
            {
                "data": "nombrePlanGym"
            },
            {
                "data": "tipo_dePago"
            },
            {
                data: null,
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePago' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPago' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPago' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tablePago);
}

var obtenerdatosDT = function(table) {
    $('#dataTablePago tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarPago').val(data.id_pago);

        var id_pagoActualizar = $("#id_PagoActualizar").val(data.id_pago);
        var cantidadPagoActualizar = $("#cantidadPagoActualizar").val(data.cantidad_pago);
        var vencimientoPagoActualizar = $("#vencimientoPagoActualizar").val(data.vencimiento);
        var idClientePagoActualizar = $("#idClientePagoActualizar").val(data.nombre_cliente);
        var idplanPagoGymActualizar = $("#idplanPagoGymActualizar").val(data.nombrePlanGym);
        var tipoPagoActualizar = $("#tipoPagoActualizar").val(data.tipo_dePago);


        var id_pagoConsultar = $("#id_pagoConsultar").val(data.id_pago);
        var cantidadPagoConsultar = $("#cantidadPagoConsultar").val(data.cantidad_pago);
        var fechaPagoConsultar = $("#fechaPagoConsultar").val(data.fecha_hora_pago);
        var vencimientoPagoConsultar = $("#vencimientoPagoConsultar").val(data.vencimiento);
        var idClientePagoConsultar = $("#idClientePagoConsultar").val(data.nombre_cliente);
        var idPlangymConsultar = $("#idPlangymConsultar").val(data.nombrePlanGym);
        var formaPagoConsultar = $("#formaPagoConsultar").val(data.tipo_dePago);

    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarPago').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>pago/insert",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El pago se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>pago";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar el Pago." + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formRegistrarPago').validate({
        rules: {
            cantidadPago: {
                required: true
            },
            vencimientoPago: {
                required: true
            },
            idCliente: {
                required: true
            },
            idPlanGym: {
                required: true
            },
            tipoPago: {
                required: true
            },
        },
        messages: {
            cantidadPago: {
                required: "Ingrese la cantidad del pago"
            },
            vencimientoPago: {
                required: "Ingrese fecha de vencimiento"
            },
            idCliente: {
                required: "Ingrese el id del cliente"
            },
            idPlanGym: {
                required: "Ingrese el id del plan de gym"
            },
            tipoPago: {
                required: "Ingrese el tipo de pago"
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
            var datos = $('#formActualizarPago').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>pago/update",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Pago se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>pago";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el pago." + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarPago').validate({
        rules: {
            cantidadPagoActualizar: {
                required: true
            },
            vencimientoPagoActualizar: {
                required: true
            },
            idClientePagoActualizar: {
                required: true
            },
            idplanPagoGymActualizar: {
                required: true
            },
            tipoPagoActualizar: {
                required: true
            }
        },
        messages: {
            cantidadPagoActualizar: {
                required: "Ingrese la cantidad del pago"
            },
            vencimientoPagoActualizar: {
                required: "Ingrese fecha de vencimiento"
            },
            idClientePagoActualizar: {
                required: "Ingrese el cliente que realiza el pago"
            },
            idplanPagoGymActualizar: {
                required: "Ingrese el plan gym"
            },
            tipoPagoActualizar: {
                required: "Ingrese la forma del pago"
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
    $("#formEliminarPago").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarPago').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>pago/delete",
            data: datos,
            success: function(data) {
                if (data.trim() == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El pago ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>pago";
                    })
                } else {
                    Swal.fire(
                        "¡Error!",
                        "Ha ocurrido un error al eliminar el pago. " + data,
                        "error"
                    );
                }
            },
        });
    });
}
</script>

