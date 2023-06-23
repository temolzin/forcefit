<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('rol');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla Roles</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarRol'> <i
                                    class="fa fa-edit"></i> Registrar Rol
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableRol" name="dataTableRol" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre de rol</th>
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
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarRol" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
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
                <form role="form" id="formRegistrarRol" name="formRegistrarRol" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Rol</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" class="form-control" id="nombreRol" name="nombreRol"
                                                placeholder="Nombre del rol" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="descripcion"
                                                    name="descripcion" placeholder="Descripcion del rol" />
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
<div class="modal fade" id="modalActualizarRol" tabindex="-1" role="dialog" aria-labelledby="modalActualizarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
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
                <form role="form" id="formActualizarRol" name="formActualizarRol">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Rol</h3>
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
                                                <input type="text" class="form-control" id="idRolActualizar"
                                                    name="idRolActualizar" placeholder="Nombre del rol" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" class="form-control" id="nombreRolActualizar"
                                                name="nombreRolActualizar" placeholder="Nombre del rol" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="descripcionRolActualizar"
                                                    name="descripcionRolActualizar" placeholder="Descripcion del rol" />
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Detalle Rol----------------------------------------------->
<div class="modal fade" id="modalDetalleRol" tabindex="-1" role="dialog" aria-labelledby="modalDetalleRol"
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
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Rol</h3>
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
                                            <input type="text" disabled class="form-control" id="idRolConsultar"
                                                name="idRolConsultar" placeholder="Nombre del rol" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <input type="text" disabled class="form-control" id="nombreRolConsultar"
                                                name="nombreRolConsultar" placeholder="Nombre del rol" />
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
                                                    id="descripcionRolConsultar" name="descripcionRolConsultar"
                                                    placeholder="Descripcion del rol" />
                                            </div>
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
<div class="modal fade" id="modalEliminarRol" tabindex="-1" role="dialog" aria-labelledby="modalEliminarRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarRol" name="formActualizarRol">
                <input type="text" hidden id="idEliminarRol" name="idEliminarRol">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Rol?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--***************************************Modal permisos Rol******************************************-->
<div class="modal fade " id="modalPermisoRol" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Permisos Roles de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="" id="formPermisos" name="formPermisos">
                            <input type="hidden" id="idrol" name="idrol" required="">
                            <div class="table-responsive">
                                <table class="table" id="dataTablePermiso">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Módulo</th>
                                            <th>Crear</th>
                                            <th>Ver</th>
                                            <th>Actualizar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success"
                                    onclick="enviarFormularioRegistrarPermiso">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$menu->footer();
?>

<script>
    $(document).ready(function () {
        mostrarRoles();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        mostrarModulos();
        enviarFormularioRegistrarPermiso();
    });

    var mostrarRoles = function () {
        var tableRol = $('#dataTableRol').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>rol/read",
                dataSrc: function (json) {
                    let customData = [];
                    json.data.forEach(element => {
                        customData = [...customData, {
                            ...element, option: `
                              <button class='permiso btn btn-secondary' data-rolId="${element.id_rol}" title="Permisos"><i class="fa fa-key"></i></i></button>
                              <button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleRol' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                              <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarRol' title="Editar Datos"><i class="fa fa-edit"></i></button>
                              <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarRol' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>`}]
                    })
                    return customData;
                }
            },
            "columns": [{
                "data": "id_rol"
            },
            {
                "data": "nombreRol"
            },
            {
                "data": "descripcion"
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
        obtenerdatosDT(tableRol);
    }

    var mostrarModulos = function () {
        $.ajax({
            url: "<?php echo constant('URL'); ?>permisosRol/readModulo",
            type: 'GET',
            DataType: 'json',
            success: function (data) {
                const { data: ModuleArray } = JSON.parse(data);
                $(".permiso").on("click", function (e) {
                    $.ajax({
                        url: "<?php echo constant('URL'); ?>permisosRol/readPermiso",
                        type: 'POST',
                        data: "rolId=" + ($(this).attr("data-rolId")),
                        success: function (data) {
                            const { data: permisoArray } = JSON.parse(data);
                            let txt = "";
                            ModuleArray.forEach((element, index) => {
                                const permisoFind = permisoArray.find(item => item.id_modulo === element.id_modulo);
                                let checkboxC = "";
                                let checkboxR = "";
                                let checkboxU = "";
                                let checkboxD = "";
                                if (permisoFind) {
                                    checkboxC = permisoFind.c == '1' ? 'ON' : 'OFF';
                                    checkboxR = permisoFind.r == '1' ? 'ON' : 'OFF';
                                    checkboxU = permisoFind.u == '1' ? 'ON' : 'OFF';
                                    checkboxD = permisoFind.d == '1' ? 'ON' : 'OFF';
                                }
                                txt += `<tr>
                                    <td>${element.id_modulo}
                                    <input type="hidden" name="idmodulo" value="${element.id_modulo}" required >
                                    </td>
                                    <td>${element.nombre_modulo}</td>
                                    <td>
                                        <div class="toggle-flip">
                                        <label>
                                            <input type="checkbox" data-moduloId="C${element.id_modulo}"  name="c" class="checkPermiso" data-permiso="C" ${checkboxC == 'ON' ? 'checked' : ''}>
                                            <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                        </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                        <label>
                                            <input type="checkbox" data-moduloId="R${element.id_modulo}"   name="r" class="checkPermiso" data-permiso="R" ${checkboxR == 'ON' ? 'checked' : ''}>
                                            <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                        </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                        <label>
                                            <input type="checkbox" data-moduloId="U${element.id_modulo}"  name="u" class="checkPermiso" data-permiso="U" ${checkboxU == 'ON' ? 'checked' : ''}>
                                            <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                        </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                        <label>
                                            <input type="checkbox" data-moduloId="D${element.id_modulo}"s name="d" class="checkPermiso" data-permiso="D" ${checkboxD == 'ON' ? 'checked' : ''}>
                                            <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                        </label>
                                        </div>
                                    </td>
                                    </tr>`;
                            });
                            $("#dataTablePermiso tbody").html(txt);
                        }
                    });
                    $('#modalPermisoRol').modal('show');
                });
                $(".checkPermiso").on("click", function () {
                });
            }
        });
    }

    var enviarFormularioRegistrarPermiso = function () {
        $('#formPermisos').submit(function (e) {
            e.preventDefault();
            var datos = $('#formPermisos').serializeArray();
            const [rolObject, ...data] = datos;
            const objToSend = { idrol: rolObject.value, modules: [] };
            let auxIdModulo = '';
            data.forEach(({ name, value }) => {
                if (name === 'idmodulo') {
                    objToSend['modules'] = [...objToSend['modules'], { idModule: value }];
                    auxIdModulo = value;
                } else {
                    objToSend['modules'] = objToSend['modules'].map((item) =>
                        item.idModule === auxIdModulo ? { ...item, [name]: value } : item
                    );
                }
            });
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>permisosRol/setPermisos",
                data: JSON.stringify(objToSend),
                success: function (data) {
                    if (data.includes('ok')) {
                        Swal.fire(
                            "¡Éxito!",
                            "Los permisos se asignaron correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL'); ?>rol";
                        });
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al registrar los permisos. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableRol tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarRol').val(data.id_rol);

            var idRolActualizar = $("#idRolActualizar").val(data.id_rol);
            var nombreRolActualizar = $("#nombreRolActualizar").val(data.nombreRol);
            var descripcionRolActualizar = $("#descripcionRolActualizar").val(data.descripcion);

            var idRolConsultar = $("#idRolConsultar").val(data.id_rol);
            var nombreRolConsultar = $("#nombreRolConsultar").val(data.nombreRol);
            var descripcionRolConsulta = $("#descripcionRolConsultar").val(data.descripcion);

            var idpermiso = $('#idrol').val(data.id_rol);
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarRol').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>rol/insert",
                    data: datos,
                    success: function (data) {
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El rol se ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location =
                                    "<?php echo constant('URL'); ?>rol";
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
        $('#formRegistrarRol').validate({
            rules: {
                nombreRol: {
                    required: true
                },
                descripcion: {
                    required: true
                },
            },
            messages: {
                nombreRol: {
                    required: "Ingrese el nombre del rol"
                },
                descripcion: {
                    required: "Ingrese la descripcion"
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
                var datos = $('#formActualizarRol').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>rol/update",
                    data: datos,
                    success: function (data) {
                        if (data.trim() == 'ok') {
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
                    if (data.trim() == 'ok') {
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
</script>
