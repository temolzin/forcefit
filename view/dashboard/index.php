<?php
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
        <div class="title_right text-right">
            <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == '2') { ?>
                <button class="btn btn-primary" id="generarReporte">Reporte de Ingresos</button>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Charts -->
    <div class="row">
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
                    <canvas id="semanal" width="auto" height="auto"></canvas>
                </div>
            </div>
        </div>
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
                    <canvas id="mensual" width="auto" height="auto"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /Charts -->
    <!-- Table of customers with membership expiring in the next 5 days -->
    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Membresías por expirar</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-primary" onclick="sendEmailClientsAboutMembershipExpiry();">
                                <i class="fa fa-user"></i>Notificar via Email
                            </button>
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
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Teléfono</th>
                                <th>Plan Gimnasio</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Email</th>
                                <th>Notificacion</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Table of customers with membership expiring in the next 5 days -->
</div>
<!-- /page content -->
<?php
$menu->footer();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script>
$(document).on('click', '#generarReporte', function (event) {
    event.preventDefault();
    var id_usuario = "<?php echo $_SESSION['id_usuario']; ?>"
    var url = "<?php echo constant('URL'); ?>dashboard/generateEarningsReport";

    $.ajax({
        type: "POST",
        url: url,
        xhrFields: {
            responseType: 'blob'
        },
        data: {
            id_usuario: id_usuario
        },
        success: function (json) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(json);
            a.href = url;
            a.download = 'Reporte de Ganancias.pdf';
            a.click();
            window.URL.revokeObjectURL(url);
        },
        error: function () {
            console.error("Error generando el reporte");
        }
    });
});

var tableCliente;
$(document).ready(function() {
    getMonthlyAndWeeklyRevenueData();
    getCustomersAboutToExpireMembership();
});

var sendEmailClientsAboutMembershipExpiry = function() {
    var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL'); ?>dashboard/sendEmailClientsAboutMembershipExpiry",
        data: {
            id_gimnasio: id_gimnasio,
        },
        async: false,
        dataType: "json",
        success: function(data) {
            Swal.fire(
                "¡Éxito!",
                data.message,
                "success"
            )
        },
        error: function(xhr, status, error) {
            Swal.fire(
                "Error!",
                xhr.responseText,
                "error"
            )
        }
    });
    tableCliente.destroy();
    getCustomersAboutToExpireMembership();
}

var getMonthlyAndWeeklyRevenueData = function() {
    var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL'); ?>dashboard/getMonthlyAndWeeklyRevenueData",
        data: {
            id_gimnasio: id_gimnasio,
        },
        async: false,
        dataType: "json",
        success: function(data) {
            initialize_profit_charts(data);
        },
        error: function(xhr, status, error) {
            console.error("Error " + error);
        }
    });
}

function initialize_profit_charts(data) {
    $("#tituloSemanal").text("Ganancia semanal del día " + data.last_week + " al día " + data.current_date + "");
    $("#tituloMensual").text("Ganancia mensual del día " + data.last_year + " al día " + data.current_date + "");
    const barFillColor = [
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
    const barBorderColor = [
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
    const idWeeklyChart = document.getElementById('semanal');
    new Chart(idWeeklyChart, {
        type: 'bar',
        data: {
            labels: data.order_of_the_days_of_the_week,
            datasets: [{
                label: 'Ganancia $',
                data: data.daily_Payment_Totals,
                backgroundColor: barFillColor,
                borderColor: barBorderColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const idMonthlyChart = document.getElementById('mensual');
    new Chart(idMonthlyChart, {
        type: 'bar',
        data: {
            labels: data.order_of_the_month_of_the_year,
            datasets: [{
                label: 'Ganancia $',
                data: data.monthly_Payment_Totals,
                backgroundColor: barFillColor,
                borderColor: barBorderColor,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}

var getCustomersAboutToExpireMembership = function() {
    var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>";
    var url = "<?php echo constant('URL'); ?>cliente/getCustomersWithUpcomingMembershipExpiry";
    if (id_gimnasio === "") {
        var url = "<?php echo constant('URL'); ?>usuario/getUsersWithUpcomingMembershipExpiry";
    }
    tableCliente = $('#dataTableCliente').DataTable({
        "processing": true,
        "ajax": {
            type: "POST",
            "url": url,
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
                    var fullnameImagen = JsonResultRow.id_cliente + '/' + JsonResultRow.imagen_cliente;
                    var urlImg = '<?php echo constant('URL'); ?>public/cliente/' + fullnameImagen;
                    if ("<?php echo $_SESSION['id_gimnasio']; ?>" === "") {
                        urlImg = '<?php echo constant('URL'); ?>public/usuario/' + fullnameImagen;
                    }
                    return '<center><img src="' + urlImg +
                        '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;" onerror="handleErrorImage(this);"/></center>';
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
                "data": "fecha_vencimiento"
            },
            {
                "data": "email_customer"
            },
            {
                "data": "is_email_notified",
                "render": function(data, type, row) {
                    var response = 'Enviada';
                    var color = 'green';
                    if (data !== 1) {
                        response = 'No enviada';
                        color = 'red';
                    }
                    return '<span style="color: ' + color + ';">' + response + '</span>';
                }
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip',
    });
}

function handleErrorImage(image) {
    image.src = '<?php echo constant('URL'); ?>public/img/avatar.png';
}
</script>
