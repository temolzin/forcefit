<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/login/style.css">

    <link href="public/css/login/sweetalert2.css" rel="stylesheet">

</head>

<body onload="cambiar()" class="img js-fullheight" id="ia" style="background-image: url(public/img/login/gym1.jpg);">
    <section class="ftco-section">
        <div id="alertNO" role="alert">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">ForceFit</h2>
                </div>
            </div>
            <form class="signin-form" id="formEnviarLogin" name="formEnviarLogin">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Inicia sesión</h3>
                            <div class="form-group">
                                <input placeholder="Nombre de usuario" type="text" id="username_usuario"
                                    name="username_usuario" class="form-control" placeholder="Username" required>
                                </input>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password_usuario" name="password_usuario"
                                    class="form-control" placeholder="Contraseña" required>
                                </input>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary submit px-3" type="submit"
                                    value="Iniciar sesión"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="public/js/login/jquery.min.js"></script>
        <script src="public/js/login/popper.js"></script>
        <script src="public/js/login/bootstrap.min.js"></script>
        <script src="public/js/login/main.js"></script>
        <script src="public/js/login/jquery.validate.js"></script>
        <script src="public/js/login/jquery-ui.min.js"></script>
        <script src="public/js/login/sweetalert2.js"></script>
        <script src="public/js/login/jquery.knob.min.js"></script>
        <script src="public/js/login/backgroundImage.js"></script>
        <script src="public/js/login/bootstrap.bundle.min.js"></script>

    </section>
</body>
<script>
    $(document).ready(function () {
        loginIngresar();
        $("#alertNO").hide();
    });
    $("#formEnviarLogin").submit(function (e) {
        e.preventDefault();
        username_usuario = $.trim($("#username_usuario").val());
        password_usuario = $.trim($("#password_usuario").val());
        if (username_usuario.length > 0 && password_usuario.length > 0) { } else {
            $("#alertNO").fadeTo(2000, 500).slideUp(500, function () {
                $("#alertNO").slideUp(500);
            });
        }
    });
    var loginIngresar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formEnviarLogin').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/login",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "Ha iniciado sesión de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL'); ?>dashboard";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al iniciar sesión ",
                                "error"
                            );
                        }
                    },
                });
            }
        });

        $('#formEnviarLogin').validate({
            rules: {
                username_usuario: {
                    required: true
                },
                password_usuario: {
                    required: true
                }
            },
            messages: {
                username_usuario: {
                    required: ""
                },
                password_usuario: {
                    required: ""
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
</script>

</html>
