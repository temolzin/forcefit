<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
}

require 'view/menu.php';
$menu = new Menu();
$menu->header('dashboard');
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Graficas-->
    <div class="row">
        <!-- Grafica de Ganancia semanal -->
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Ganancia semanal</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <p id="tituloSemanal"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Etiqueta para mostrar la grafica -->
                    <canvas id="semanal" width="auto" height="auto"></canvas>
                </div>
            </div>
        </div>
        <!-- grafica de Ganancia mensual -->
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Ganancia mensual</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <p id="tituloMensual"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Etiqueta para mostrar la grafica -->
                    <canvas id="mensual" width="auto" height="auto"></canvas>
                </div>
            </div>
        </div>
    </div>
                    <!-- Tabla de Membresías por expirar en 5 días -->
    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Membresías por expirar</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo constant("URL"); ?>cliente" class="btn btn-primary">
                                <i class="fa fa-user"></i>Ver Clientes
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-box table-responsive">
                    <table id="dataTableCliente" name="dataTableCliente" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre del Cliente</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Teléfono</th>
                                <th>Plan Gimnasio</th>
                                <th>Fecha de Vencimiento</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- JavaScript para configurar y mostrar la gráfica -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // var mes;
    // var semana;
    // var dia;
    // var meses;
    $(document).ready(function() {
        traerDatos();
        mostrarCliente();
    });

    var traerDatos = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>dashboard/readPaymentByIdgimnasio",
            data: {
                id_gimnasio: id_gimnasio,
            },
            async: false,
            dataType: "json",
            success: function(data) {
                console.log(data.mes);
                console.log(data.semana);
                console.log(data.dia);
                console.log(data.meses);
                console.log(data.semanaPasada);
                console.log(data.anioPasado);
                console.log(data.fechaActual);
                // mes = data.mes;
                // semana = data.semana;
                // dia = data.dia;
                // meses = data.meses;

                // Mostrar las fechas en el título de las gráficas
                $("#tituloSemanal").text("Ganancia semanal del día " + data.semanaPasada + " al día" + data.fechaActual + "");
                $("#tituloMensual").text("Ganancia mensual del día(" + data.anioPasado + " al día " + data.fechaActual + "");

                inicializarGrafico(data);
            },
            error: function(xhr, status, error) {
                // Imprimir el mensaje de error en la consola
                console.error("Error " + error);
            }
        });
    }

    function inicializarGrafico(data) {
        //colores de las barras
        const colores = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)'
        ];
        //colores de los bordes de las graficas
        const bordes = [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)',
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)'
        ];
        // const dias = data.dia;
        const semanal = document.getElementById('semanal');
        new Chart(semanal, {
            type: 'bar',
            data: {
                labels: data.dia,
                datasets: [{
                    label: 'Ganancia $',
                    data: data.semana,
                    backgroundColor: colores,
                    borderColor: bordes,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // Oculta la leyenda
                    }
                }
            }
        });

        const mensual = document.getElementById('mensual');
        new Chart(mensual, {
            type: 'bar',
            data: {
                labels: data.meses,
                datasets: [{
                    label: 'Ganancia $',
                    data: data.mes,
                    backgroundColor: colores,
                    borderColor: bordes,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {

                        display: false // Oculta la leyenda
                    }
                }
            }
        });

    }


    var mostrarCliente = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        var tableCliente = $('#dataTableCliente').DataTable({
            "processing": true,
            "ajax": {
                type: "POST",
                "url": "<?php echo constant('URL'); ?>cliente/readExpireCustomer",
                data: {
                    id_gimnasio: id_gimnasio
                },
                dataSrc: function(json) {
                    let customData = [];
                    json.data.forEach(element => {
                        customData = [...customData, {
                            ...element,
                        }]
                    })
                    return customData;
                }
            },
            "columns": [{
                    "data": "id_cliente"
                },
                {
                    defaultContent: "",
                    'render': function(data, type, JsonResultRow, meta) {
                        var fullnameImagen = JsonResultRow.nombre_cliente + '_' + JsonResultRow
                            .apellido_paterno_cliente + '/' + JsonResultRow.imagen_cliente;
                        var urlImg = '<?php echo constant('URL'); ?>public/cliente/' + fullnameImagen;
                        if (JsonResultRow.imagen_cliente == null || JsonResultRow.imagen_cliente ==
                            '') {
                            var urlImg = '<?php echo constant('URL'); ?>public/img/avatar.png';
                        } else {
                            var urlImg = '<?php echo constant('URL'); ?>public/cliente/' +
                                fullnameImagen;
                        }
                        return '<center><img src="' + urlImg +
                            '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;"/></center>';
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['nombre_cliente'];
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['apellido_paterno_cliente'];
                    }
                },
                {
                    "data": "apellido_materno_cliente"
                },
                {
                    "data": "numero_cliente"
                },
                {
                    "data": "nombrePlanGym"
                },
                {
                    "data": "vencimiento"
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ],
            dom: '<"row"<"col-md-12"B>>' +
                '<"row"<"col-md-12"f>>' +
                '<"row"<"col-md-12"l>>' +
                '<"row"<"col-md-12"t>>' +
                '<"row"<"col-md-12"<"float-left"i>><"col-md-12 text-right"p>>',

        });
        // obtenerdatosDT(tableCliente);
    }
</script>

<?php
$menu->footer();
?>