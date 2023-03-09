<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('dashboard');
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="public/img/user.png" height="200px"
                                        width="200px" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>

                            <br>
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalEditarPerfil'> <i
                                    class="fa fa-edit"></i> Editar Perfil
                            </button>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                        data-toggle="tab" aria-expanded="false">Información del Usuario</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <!-- start user projects -->
                                <table id="dataTablePerfil" name="dataTablePerfil"
                                    class="data table table-striped no-margin">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Correo Electrónico</th>
                                            <th>Estado</th>
                                            <th>Municipio</th>
                                            <th>CP</th>
                                            <th>Colonia</th>
                                            <th>Calle</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <!-- end user projects -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modalEditarPerfil" tabindex="-1" role="dialog" aria-labelledby="modalEditarPerfil"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Perfil <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formEditarPerfil" name="formEditarPerfil">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="NombreEditar"
                                        name="NombreEditar" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno (*)</label>
                                    <input type="text" class="form-control" id="ApellidoPatEditar"
                                        name="ApellidoPatEditar" placeholder="Apellido Paterno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno (*)</label>
                                    <input type="text" class="form-control" id="ApellidoMatEditar"
                                        name="ApellidoMatEditar" placeholder="Apellido Materno" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Correo Electrónico (*)</label>
                                    <input type="text" class="form-control" id="CorreoEditar"
                                        name="CorreoEditar" placeholder="Correo Electrónico"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Estado (*)</label>
                                    <input type="text" class="form-control" id="EstadoEditar"
                                        name="EstadoEditar" placeholder="Estado" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Municipio (*)</label>
                                    <input type="text" class="form-control" id="MunicipioEditar"
                                        name="MunicipioEditar" placeholder="Municipio" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>CP (*)</label>
                                    <input type="text" class="form-control" id="CodigoPostalEditar"
                                        name="CodigoPostalEditar" placeholder="Codigo Postal" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Colonia (*)</label>
                                    <input type="text" class="form-control" id="ColoniaEditar"
                                        name="ColoniaEditar" placeholder="Colonia" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Calle (*)</label>
                                    <input type="text" class="form-control" id="CalleEditar"
                                        name="CalleEditar" placeholder="Calle" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
$menu->footer();
?>
<script>
$(document).ready(function() {
    mostrarPerfil();
    enviarFormularioActualizar();
});

var mostrarPerfil = function() {
    var tablePerfil = $('#dataTablePerfil').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>perfil/read"
        },
        "columns": [{
                "data": "nombre"
            },
            {
                "data": "apellidoPat"
            },
            {
                "data": "apellidoMat"
            },
            {
                "data": "email"
            },
            {
                "data": "estado"
            },
            {
                "data": "municipio"
            },
            {
                "data": "codigoPostal"
            },
            {
                "data": "colonia"
            },
            {
                "data": "calle"
            },
            {
                "data": "rol"
            },
            
        ]
    });
    obtenerdatosDT(tablePerfil);
}
var obtenerdatosDT = function(table) {
    $('#dataTablePerfil tbody').on('click', 'tr', function() {
        var data = table.row(this).data();

        var NombreEditar = $("#NombreEditar").val(data.nombre);
        var ApellidoPatEditar = $("#ApellidoPatEditar").val(data.apellidoPat);
        var ApellidoMatEditar = $("#ApellidoMatEditar").val(data.apellidoMat);
        var CorreoEditar = $("#CorreoEditar").val(data.email);
        var EstadoEditar = $("#EstadoEditar").val(data.estado);
        var MunicipioEditar = $("#MunicipioEditar").val(data.municipio);
        var CodigoPostalEditar = $("#CodigoPostalEditar").val(data.codigoPostal);
        var ColoniaEditar = $("#ColoniaEditar").val(data.colonia);
        var CalleEditar = $("#CalleEditar").val(data.calle);
    });
}

var enviarFormularioActualizar = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formEditarPerfil').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>perfil/update",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El perfil se ha sido Actualizado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>perfil";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Actualizar el Perfil. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formEditarPerfil').validate({
        rules: {
            NombreEditar: {
                required: true
            },
            ApellidoPatEditar: {
                required: true
            },
            ApellidoPatEditar: {
                required: true
            },
            CorreoEditar: {
                required: true
            },
            EstadoEditar: {
                required: true
            },
            CodigoPostalEditar: {
                required: true
            },
            ColoniaEditar: {
                required: true
            },
            CalleEditar: {
                required: true
            }
        },
        messages: {
            NombreEditar: {
                required: "Ingrese el nombre"
            },
            ApellidoPatEditar: {
                required: "Ingrese el apellido paterno"
            }
            ,
            ApellidoMatEditar: {
                required: "Ingrese el apellido materno"
            }
            ,
            CorreoEditar: {
                required: "Ingrese el correo electronico"
            }
            ,
            EstadoEditar: {
                required: "Ingrese el estado"
            }
            ,
            MunicipioEditar: {
                required: "Ingrese el municipio"
            },
            CodigoPostalEditar: {
                required: "Ingrese el rol"
            },
            ColoniaEditar: {
                required: "Ingrese el rol"
            },
            descripcionActualizar: {
                required: "Ingrese el rol"
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
</script>
