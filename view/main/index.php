<head>
    <title>Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/login/style.css">
    <link rel="stylesheet" href="public/css/login/sweetalert2.css">

</head>

<body onload="cambiar()" class="img js-fullheight" id="ia" style="background-image: url(public/img/login/gym1.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">FORCE FIT</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Inicia sesión</h3>
                        <form id="loginUsuario" method="post" class="signin-form">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Nombre de usuario" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" id="password" name="password" type="password"
                                    class="form-control" placeholder="Contraseña" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="button" class="form-control btn btn-primary submit px-3"
                                    id="btnLogin">Inicia
                                    sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="public/js/login/jquery.min.js"></script>
    <script src="public/js/login/popper.js"></script>
    <script src="public/js/login/bootstrap.min.js"></script>
    <script src="public/js/login/main.js"></script>
    <script src="public/js/login/backgroundImage.js"></script>
    <script src="public/js/login/sweetalert2.js"></script>
</body>

<script>
    $(document).ready(function () {
        $('#btnLogin').on('click', function () {
            var datos = $('#loginUsuario').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>usuario/login",
                data: datos,
                success: function (data) {
                    console.log(data)
                    if (data == false) {
                        Swal.fire(
                            "¡Error!",
                            "Usuario y Contraseña incorrectos" + data,
                            "error"
                        );
                    } else if (data == true) {
                        window.location = "<?php echo constant('URL'); ?>dashboard";
                    }
                },
            });
        })
    })
</script>