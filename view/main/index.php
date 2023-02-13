<head>
    <title>Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/login/style.css">

</head>

<body onload="cambiar()" class="img js-fullheight" id="ia" style="background-image: url(public/img/login/gym1.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">FitEnergy</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div id="divLoading" class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Inicia sesión</h3>
                        <form id="formlogin" name="formlogin" class="signin-form">
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
                                <button type="submit" class="form-control btn btn-primary submit px-3">Inicia
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

</body>
<script>
const base_url = "<?= base_url(); ?>";
$('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
});
var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector("#formlogin")) {
        let formlogin = document.querySelector("#formlogin");
        formlogin.onsubmit = function(e) {
            e.preventDefault();

            let strEmail = document.querySelector('#email');
            let strPassword = document.querySelector('#password');

            if (strEmail == "" || strPassword == "") {
                swal("Por favor", "Escribe usuario y contraseñaa.", "error");
                return false;
            } else {
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject(
                    'Microsoft.XMLHTTP');
                var ajaxUrl = <?php echo constant('URL');?>dashboard/index";
                var formData = new FormData(formlogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            //window.location = base_url+'/dashboard';
                            window.location.reload(false);
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#password').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso", "error");
                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }
    }
})
</script>