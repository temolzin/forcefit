<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
}

require 'view/menu.php';
$menu = new Menu();
$menu->header('perfil');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title bg-green">
                    <h2>Foto de Perfil</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content text-center">
                    <div class="rounded-circle mx-auto d-inline-block overflow-hidden photo-container" style="width: 150px; height: 150px;">
                        <img src="" alt="usuario" id="imageUser" class="img-fluid">
                    </div>
                    <h5 id="fullNameUser" name="fullNameUser"></h5>
                    <h4 id="nameRol" name="nameRol"></h4>
                    <h5 id="descriptionRol" name="descriptionRol"></h5>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-8">
            <div class="x_panel">
                <div class="x_title bg-green">
                    <h2>Editar Perfil</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h5>Datos Personales</h5>
                    <form role="form" id="formUpdatePerfil" enctype="multipart/form-data" name="formUpdatePerfil" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <label>Correo</label>
                                <div class="input-group-prepend">
                                    <input type="email" id="emailUser" name="emailUser" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <label>Imagen</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imageUserUpdate" name="imageUserUpdate" accept="image/*">
                                        <label class="custom-file-label" for="imageUserUpdate">Elegir Imagen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre del Usuario</label>
                                    <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Nombre Usuario" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input type="text" class="form-control" id="lastNameP" name="lastNameP" placeholder="Apellido Paterno" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input type="text" class="form-control" id="lastNameM" name="lastNameM" placeholder="Apellido Materno" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5>Dirección</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Calle</label>
                                    <input type="text" class="form-control" id="streetUser" name="streetUser" placeholder="Calle" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="stateUser" id="stateUser" class="form-control" placeholder="Estado">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <input type="text" id="municipalityUser" name="municipalityUser" class="form-control" placeholder="Municipio">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Colonia</label>
                                    <input type="text" id="colonyUser" name="colonyUser" class="form-control" placeholder="Colonia">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Codigo Postal</label>
                                    <input type="text" class="form-control" id="postalcodeUser" name="postalcodeUser" placeholder="Codigo Postal">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <input type="text" class="form-control" id="rolUser" name="rolUser" readonly>
                                </div>
                            </div>
                        </div>
                        <a href="" data-toggle="modal" data-target="#modalUpdatePassword" class="text-primary">¿Quieres cambiar tu contraseña? Haz clic aquí</a>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                        </div>
                        <!--  -->
                        <!--  -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--------------------------------------------------------- Modal Update Password ----------------------------------------------->
<div class="modal fade" id="modalUpdatePassword" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header bg-primary">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Actualizar Contraseña</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdatePassword" enctype="multipart/form-data" name="formUpdatePassword" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Contraseña Actual (*)</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Actual Contraseña" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nueva Contraseña (*)</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nueva Contraseña" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Confirmar nueva contraseña (*)</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirmar Nueva Contraseña" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$menu->footer();
?>

<script>
    $(document).ready(function() {
        getUserData();
        formUpdatePerfil();
        updatePassword();
    });

    var getUserData = function() {
        var id_usuario = "<?php echo $_SESSION['id_usuario']; ?>"

        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>perfil/getUserData",
            data: {
                id_usuario: id_usuario,
            },
            async: false,
            dataType: "json",
            success: function(data) {
                console.log(data);
                console.log(data[0].id_usuario);
                var nameUser = $("#nameUser").val(data[0].nombreUsuario);
                var lastNameP = $("#lastNameP").val(data[0].apellidoPaternoUsuario);
                var lastNameM = $("#lastNameM").val(data[0].apellidoMaternoUsuario);
                var emailUser = $("#emailUser").val(data[0].emailUsuario);
                var streetUser = $("#streetUser").val(data[0].calleUsuario);
                var stateUser = $("#stateUser").val(data[0].estadoUsuario);
                var municipalityUser = $("#municipalityUser").val(data[0].municipioUsuario);
                var colonyUser = $("#colonyUser").val(data[0].coloniaUsuario);
                var postalcodeUser = $("#postalcodeUser").val(data[0].codigoPostalUsuario);
                var nameRol = $("#nameRol").text(data[0].nombreRol);
                var descriptionRol = $("#descriptionRol").text(data[0].descripcion);
                var imageUser = $("#imageUser").attr("src", '<?php echo constant('URL'); ?>public/usuario/' + data[0].id_usuario + '_' + data[0].nombreUsuario + '_' + data[0].apellidoPaternoUsuario + '/' + data[0].imagen);
                var rolUser = $("#rolUser").val(data[0].nombreRol);
                var fullNameUser = $("#fullNameUser").text(data[0].nombreUsuario + ' ' + data[0].apellidoPaternoUsuario + ' ' + data[0].apellidoMaternoUsuario);
            },
            error: function(xhr, status, error) {
                console.error("Error " + error);
            }
        });
    }

    $(".custom-file-input").on("change", function updateNameFileInput() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $('#formUpdatePerfil').on('submit', function(e) {
        datosActualizar = new FormData(this);
        datosActualizar.append('id_usuario', "<?php echo $_SESSION['id_usuario']; ?>");
        datosActualizar.append('oldNameUser', "<?php echo $_SESSION['nombreUsuario']; ?>");
        datosActualizar.append('oldLastNameUser', "<?php echo $_SESSION['apellidoPaternoUsuario']; ?>");
        datosActualizar.append('imagen', "<?php echo $_SESSION['imagen']; ?>");
    });
    var formUpdatePerfil = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>perfil/formUpdatePerfil",
                    data: datosActualizar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submit').attr("disabled", "disabled");
                        $('#formUpdatePerfil').css("opacity", ".5");
                    },
                    success: function(data) {

                        console.log("data ", data)
                        var title = "¡Éxito!";
                        var message = "Su información ha sido Actualizada de manera correcta";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al Actualizar su información." + data;
                            var icon = "error";
                        }

                        Swal.fire(
                            title,
                            message,
                            icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>Perfil";
                        });
                    },
                });
            }
        });
        $('#formUpdatePerfil').validate({
            rules: {
                nameUser: {
                    required: true
                },
                lastNameP: {
                    required: true
                },
                lastNameM: {
                    required: true
                },
                emailUser: {
                    required: true
                },
                streetUser: {
                    required: true
                },
                stateUser: {
                    required: true
                },
                municipalityUser: {
                    required: true
                },
                colonyUser: {
                    required: true
                },
                postalcodeUser: {
                    required: true
                }
            },
            messages: {
                nameUser: {
                    required: "Ingrese su nombre"
                },
                lastNameP: {
                    required: "Ingrese su apellido paterno"
                },
                lastNameM: {
                    required: "Ingrese su apellido materno"
                },
                emailUser: {
                    required: "Ingrese su correo"
                },
                streetUser: {
                    required: "Ingrese su calle"
                },
                stateUser: {
                    required: "Ingrese su estado"
                },
                municipalityUser: {
                    required: "Ingrese su municipio"
                },
                colonyUser: {
                    required: "Ingrese su colonia"
                },
                postalcodeUser: {
                    required: "Ingrese su codigo postal"
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

    var id_usuario = "<?php echo $_SESSION['id_usuario']; ?>";
    var updatePassword = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formUpdatePassword').serialize();
                datos += '&id_usuario=' + id_usuario;
                console.log(datos);
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>perfil/updatePassword",
                    data: datos,
                    success: function(data) {
                        console.log(data);
                        var title = "¡Éxito!";
                        var message = "Su contraseña ha sido actualizada correctamente";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Contraseña actual incorrecta. Inténtalo de nuevo.. ";
                            var icon = "error";
                        }

                        Swal.fire({
                            title: title,
                            text: message,
                            icon: icon
                        }).then(function(result) {
                            if (data.trim() === 'ok') {
                                window.location = "<?php echo constant('URL'); ?>Perfil";
                            }
                        });
                    },
                });
            }
        });
        $('#formUpdatePassword').validate({
            rules: {
                oldPassword: {
                    required: true
                },
                newPassword: {
                    required: true
                },
                confirmNewPassword: {
                    required: true,
                    equalTo: "#newPassword"
                }
            },
            messages: {
                oldPassword: {
                    required: "Ingrese su contrseña actual"
                },
                newPassword: {
                    required: "Ingrese su nueva contraseña"
                },
                confirmNewPassword: {
                    required: "Confirme la nueva contraseña",
                    equalTo: "Las contraseñas no coinciden"
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
