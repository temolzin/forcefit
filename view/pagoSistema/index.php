<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
 }
 
require 'view/menu.php';
$menu = new Menu();
$menu->header('pagoSistema');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Pagos</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal'
                                data-target='#modalRegistrarPagoSistema'> <i class="fa fa-edit"></i> Registrar Pago
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTablePagoSistema" name="dataTablePagoSistema"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Plan del sistema</th>
                                            <th>Usuario</th>
                                            <th>Cantidad</th>
                                            <th>Fecha y hora de pago</th>
                                            <th>Fecha de vencimiento</th>
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
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarPagoSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalRegistrarPagoSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pagos <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarPagoSistema" enctype="multipart/form-data"
                    name="formRegistrarPagoSistema" method="post">
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
                                <div class="card-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="idUsuario">Usuario (*)</label>
                                        <select name="idUsuario" id="idUsuario" class="form-control pagoRegistrarUsuario" style="width: 100%;">
                                          <option value="default">Seleccione el usuario</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                      <label for="idPlanSistema">Plan del sistema (*)</label>
                                        <select name="idPlanSistema" id="idPlanSistema" class="form-control pagoRegistrarPlanSistema" style="width: 100%;">
                                          <option value="default">Seleccione plan del sistema</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Cantidad (*)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad del Pago">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label>Fecha de vencimiento(*)</label>
                                            <input type="date" class="form-control" id="vencimientoPago"name="vencimientoPago" placeholder="Vencimiento de pago" />
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
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarPagoSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarPagoSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago del Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formActualizarPagoSistema" enctype="multipart/form-data"
                    name="formActualizarPagoSistema" method="post">
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
                                                <input type="text" class="form-control" id="id_PagoActualizar"
                                                    name="id_PagoActualizar" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Cantidad (*)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="cantidadPagoActualizar" name="cantidadPagoActualizar" placeholder="cantidad del Pago">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha de Vencimineto</label>
                                            <input type="date" class="form-control" id="vencimientoPagoActualizar" name="vencimientoPagoActualizar" placeholder="2023-05-07" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                    <label>Usuario(*)</label>
                                    <select name="idUsuarioPagoActualizar" id="idUsuarioPagoActualizar" class="form-control pagoActualizarUsuario" style="width:100%;">
                                            <option value="default">Seleccione el usuario</option>
                                     </select>
                                    </div>
                                    </div>

                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Plan del Sistema(*)</label>
                                    <select name="idPlanSistemaActualizar" id="idPlanSistemaActualizar" class="form-control pagoRegistrarPlanSistema" style="width:100%;">
                                            <option value="default">Seleccione plan gimnasio</option>
                                     </select>
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
                                            </select>
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
<div class="modal fade" id="modalDetallePagoSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalDetallePagoSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago del Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formConsulta" enctype="multipart/form-data" name="formConsulta" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del pago</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input type="text" disabled class="form-control" id="id_pagoConsultar" name="id_pagoConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="text" disabled class="form-control" id="cantidadPagoConsultar" name="cantidadPagoConsultar" placeholder="Cantidad" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Fecha y hora de pago</label>
                                            <input type="text" disabled class="form-control" id="fechaPagoConsultar" name="fechaPagoConsultar" placeholder="Fecha del pago" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Vencimiento</label>
                                            <input type="text" disabled class="form-control" id="vencimientoPagoConsultar" name="vencimientoPagoConsultar" placeholder="Vencimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" disabled class="form-control" id="idUsuarioPagoConsultar" name="idUsuarioPagoConsultar" placeholder="Usuario" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Plan del sistema</label>
                                            <input type="text" disabled class="form-control" id="idPlanSistemaConsultar" name="idPlanSistemaConsultar" placeholder="Plan del sistema" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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

<!-- ****************************** Modal Eliminar Rol *************************************************-->
<div class="modal fade" id="modalEliminarPagoSistema" tabindex="-1" role="dialog"
    aria-labelledby="modalEliminarPagoSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Pago</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPagoSistema" name="formEliminarPagoSistema">
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
    mostrarPagoSistema();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
    llenarUsuario();
    llenarplanSistema();
});

const llenarUsuario = (selector, modal) => {
    $.ajax({
        url: "<?php echo constant('URL'); ?>pagoSistema/readUserManagersGym",
        async: false,
        dataType: "json",
        success: function(data) {
            const $selector = $(selector);
            data.forEach(registro => {
                const id = registro.id_usuario;
                const nombre = registro.nombreUsuario;
                const apellidoPaterno=registro.apellidoPaternoUsuario;
                const apellidoMaterno=registro.apellidoMaternoUsuario;
                $selector.append(`<option value='${id}'>${nombre} ${apellidoPaterno} ${apellidoMaterno}</option>`);
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
};

$(document).ready(() => {
    $('.pagoRegistrarUsuario').select2({
        dropdownParent: $('#modalRegistrarPagoSistema')
    });

    $('.pagoActualizarUsuario').select2({
        dropdownParent: $('#modalActualizarPagoSistema')
    });

    llenarUsuario(".pagoRegistrarUsuario", "#modalRegistrarPagoSistema");
    llenarUsuario(".pagoActualizarUsuario", "#modalActualizarPagoSistema");
});

const llenarplanSistema = () => {
    $.ajax({
        url: "<?php echo constant('URL'); ?>pagoSistema/readSystemPlan",
        async: false,
        dataType: "json",
        success: function(data) {
            $.each(data, function(key, registro) {
                var id = registro.id_plan_sistema;
                var nombre = registro.nombre_plan_sistema;
                $(".pagoRegistrarPlanSistema").append('<option value=' + id + '>' + nombre + '</option>');
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}

$("#idUsuario").on("change", function() {
  var userId = $(this).val();

  $.ajax({
    url: "<?php echo constant('URL'); ?>pagoSistema/readUserPlanDetails",
    type: "POST",
    data: { idUsuario: userId },
    dataType: "json",
    success: function(data) {
      var id = data.id_plan_sistema;
      var nombre = data.nombre_plan_sistema;
      $("#cantidad").val(data[0].costo);
      var planId = data[0].id_plan_sistema;
      var planName = data[0].nombre_plan_sistema;
      $("#idPlanSistema option[value='" + planId + "']").text(planName);
      $("#idPlanSistema").val(planId);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error("AJAX error:", textStatus, errorThrown);
    }
  });
});

var mostrarPagoSistema = function() {
    var tablePagoSistema = $('#dataTablePagoSistema').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>pagoSistema/readTable",
            dataSrc: function (json) {
            let customData = [];
            json.data.forEach(element => {
                customData = [...customData, {
                    ...element, option: `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePagoSistema' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPagoSistema' title="Editar Datos"><i class="fa fa-edit"></i></button>
                                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPagoSistema' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>
                                         <button class='generar-recibo btn btn-secondary' data-id-pago="${element.id_pago}" title="Generar Recibo"><i class="fa fa-file-text-o"></i></button>`}]
    })
    return customData;
}
        },
        "columns": [{
                "data": "id_pago"
            },
            {
                "data": "nombre_plan_sistema"
            },
            {
                "data": "nombreUsuario"
            },
            {
                "data": "cantidadPago"
            },
            {
                "data": "fecha_hora_pago"
            },
            {
                "data": "vencimiento"
            },
            {
                "data": "tipo_Pago"
            },
            {
                data: "option",         
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tablePagoSistema);
}


var obtenerdatosDT = function(table) {
    $('#dataTablePagoSistema tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarPago').val(data.id_pago);

        var id_pagoActualizar = $("#id_PagoActualizar").val(data.id_pago);
        var vencimientoPagoActualizar = $("#vencimientoPagoActualizar").val(data.vencimiento);
        var idUsuarioPagoActualizar = $("#idUsuarioPagoActualizar").val(data.id_usuario).trigger("change");
        var idPlanSistemaActualizar = $("#idPlanSistemaActualizar").val(data.id_plan_sistema);
        var cantidadPagoActualizar = $("#cantidadPagoActualizar").val(data.cantidadPago);
        var tipoPagoActualizar = $("#tipoPagoActualizar").val(data.tipo_Pago);


        var id_pagoConsultar = $("#id_pagoConsultar").val(data.id_pago);
        var fechaPagoConsultar = $("#fechaPagoConsultar").val(data.fecha_hora_pago);
        var vencimientoPagoConsultar = $("#vencimientoPagoConsultar").val(data.vencimiento);
        var idUsuarioPagoConsultar = $("#idUsuarioPagoConsultar").val(data.nombreUsuario);
        var cantidadPagoConsultar = $("#cantidadPagoConsultar").val(data.cantidadPago);
        var idPlanSistemaConsultar = $("#idPlanSistemaConsultar").val(data.nombre_plan_sistema);
        var formaPagoConsultar = $("#formaPagoConsultar").val(data.tipo_Pago);

    });
}

var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formRegistrarPagoSistema').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>pagoSistema/insert",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El pago se ha sido registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>pagoSistema";
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
    $('#formRegistrarPagoSistema').validate({
        rules: {
            vencimientoPago: {
                required: true
            },
            idUsuario: {
                required: true
            },
            cantidad: {
                required: true
            },
            idPlanSistema: {
                required: true
            },
            tipoPago: {
                required: true
            },
        },
        messages: {
            vencimientoPago: {
                required: "Ingrese fecha de vencimiento"
            },
            idUsuario: {
                required: "Ingrese el id del usuario"
            },
            cantidad: {
                required: "Ingrese la cantidad del pago"
            },
            idPlanSistema: {
                required: "Ingrese el id del plan de sistema"
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
            var datos = $('#formActualizarPagoSistema').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>pagoSistema/update",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El pago se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>pagoSistema";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el pago. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formActualizarPagoSistema').validate({
        rules: {
            vencimientoPagoActualizar: {
                required: true
            },
            idusuarioPagoActualizar: {
                required: true
            },
            cantidadPagoActualizar: {
                required: true
            },
            idPlanSistemaActualizar: {
                required: true
            },
            tipoPagoActualizar: {
                required: true
            }
        },
        messages: {
            vencimientoPagoActualizar: {
                required: "Ingrese fecha de vencimiento"
            },
            idusuarioPagoActualizar: {
                required: "Ingrese el usuario que realiza el pago"
            },
            cantidadPagoActualizar: {
                required: "Ingrese la cantidad del pago"
            },
            idPlanSistemaActualizar: {
                required: "Ingrese el plan del sistema"
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
    $("#formEliminarPagoSistema").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarPagoSistema').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>pagoSistema/delete",
            data: datos,
            success: function(data) {
                if (data.trim() == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "El pago ha sido eliminado correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>pagoSistema";
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
    
$(document).on('click', '.generar-recibo', function (event) {
event.preventDefault();
var id_pago = $(this).data('id-pago');
var url = "<?php echo constant('URL'); ?>PagoSistema/generateReceipt";

$.ajax({
    type: "POST",
    url: url,
    xhrFields: {
        responseType: 'blob'
    },
    data: {
        id_pago: id_pago
    },
    success: function (json) {
        var a = document.createElement('a');
        var url = window.URL.createObjectURL(json);
        a.href = url;
        a.download = 'Recibo del pago.pdf';
        a.click();
        window.URL.revokeObjectURL(url);
    },
    error: function () {
        console.error("Error al generar el recibo");
    }
    });
});

}
</script>
