<?php
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('sucursal');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarSucursal'> <i class="fas fa-plus-circle"></i> Registrar Sucursal </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Sucursal</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableSucursal" name="dataTableSucursal" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Numero sucursal</th>
                                    <th>Descripcion</th>
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
<div class="modal fade" id="modalRegistrarSucursal" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarSucursal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Sucursal <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarSucursal" name="formRegistrarSucursal" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreSucursal" name="nombreSucursal" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero sucursal (*)</label>
                                    <input type="text" class="form-control" id="numeroSucursal" name="numeroSucursal" placeholder="Numero de sucursal"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcionl (*)</label>
                                    <input type="text" class="form-control" id="descripcionSucursal" name="descripcionSucursal" placeholder="Descripcion"/>
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
<div class="modal fade" id="modalActualizarSucursal" tabindex="-1" role="dialog" aria-labelledby="modalActualizarSucursal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Sucursal <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarSucursal" name="formActualizarSucursal">
                    <div class="card-body">
                        <div style="display: none;" class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>ID (*)</label>
                                    <input type="text" class="form-control" id="idSucursalActualizar" name="idSucursalActualizar" placeholder="Matrícula"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombreSucursalActualizar" name="nombreSucursalActualizar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero sucursal (*)</label>
                                    <input type="text" class="form-control" id="numeroSucursalActualizar" name="numeroSucursalActualizar" placeholder="Numero de sucursales"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcion (*)</label>
                                    <input type="text" class="form-control" id="descripcionSucursalActualizar" name="descripcionSucursalActualizar" placeholder="Descripcion"/>
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

<!--------------------------------------------------------- Modal DetalleSucursal----------------------------------------------->
<div class="modal fade" id="modalDetalleSucursal" tabindex="-1" role="dialog" aria-labelledby="modalDetalleSucursal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Sucursal <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                    <label>ID (*)</label>
                                    <input disabled type="text" class="form-control" id="idSucursalConsultar" name="idSucursalConsultar" placeholder="ID"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" disabled class="form-control" id="nombreSucursalConsultar" name="nombreSucursalConsultar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Numero sucursal (*)</label>
                                    <input type="text" disabled class="form-control" id="numeroSucursalConsultar" name="numeroSucursalConsultar" placeholder="Numero de sucursales"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripcion (*)</label>
                                    <input type="text" disabled class="form-control" id="descripcionSucursalConsultar" name="descripcionSucursalConsultar" placeholder="Descripcion"/>
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

<!-- ****************************** Modal Eliminar Sucursal *************************************************-->
<div class="modal fade" id="modalEliminarSucursal" tabindex="-1" role="dialog" aria-labelledby="modalEliminarSucursal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarSucursal" name="formActualizarSucursal">
                <input type="text" hidden id="idEliminarSucursal" name="idEliminarSucursal">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Sucursal?</div>
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
        mostrarSucursal();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var mostrarSucursal = function() {
        var tableSucursal = $('#dataTableSucursal').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL');?>sucursal/read"
            },
            "columns": [
                { "data": "id_sucursal" },
                { "data": "nombre_sucursal" },
                { "data": "numero_sucursal" },
                { "data": "descripcion_sucursal" },
                {data:null,
                    "defaultContent":
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleSucursal' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarSucursal' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarSucursal' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableSucursal);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableSucursal tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarSucursal').val(data.id_sucursal);

            var idActualizar = $("#idSucursalActualizar").val(data.id_sucursal);
            var nombreSucursalActualizar = $("#nombreSucursalActualizar").val(data.nombre_sucursal);
            var numero = $("#numeroSucursalActualizar").val(data.numero_sucursal);
            var descripcion = $("#descripcionSucursalActualizar").val(data.descripcion_sucursal);

            var idConsulta = $("#idSucursalConsultar").val(data.id_sucursal);
            var nombreConsulta = $("#nombreSucursalConsultar").val(data.nombre_sucursal);
            var numeroConsulta = $("#numeroSucursalConsultar").val(data.numero_sucursal);
            var descripcionConsulta = $("#descripcionSucursalConsultar").val(data.descripcion_sucursal);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarSucursal').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>sucursal/insert",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Sucursal ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>sucursal";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el Sucursal. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarSucursal').validate({
            rules: {
                nombreSucursal: {
                    required: true
                },
                numeroSucursal: {
                    required: true
                },
                descripcionSucursal: {
                    required: true
                }
            },
            messages: {
                nombreSucursal: {
                    required: "Ingresa un nombre"
                },
                numeroSucursal: {
                    required: "Ingresa un numero"
                },
                descripcionSucursal: {
                    required: "Ingresa una descripcion"
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
                var datos = $('#formActualizarSucursal').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>sucursal/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Sucursal ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>sucursal";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el Sucursal. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarSucursal').validate({
            rules: {
                nombreSucursalActualizar: {
                    required: true
                },
                numeroSucursalActualizar: {
                    required: true
                },
                descripcionSucursalActualizar: {
                    required: true
                }
            },
            messages: {
                nombreActualizar: {
                    required: "Ingresa un nombre"
                },
                numeroSucursalActualizar: {
                    required: "Ingresa un numero"
                },
                descripcionSucursalActualizar: {
                    required: "Ingrese una descripcion"
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
        $( "#formEliminarSucursal" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarSucursal').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>sucursal/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Sucursal ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>sucursal";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el Sucursal. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    
</script>
