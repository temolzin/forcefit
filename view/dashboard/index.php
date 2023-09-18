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
    <!-- /Table of customers with membership expiring in the next 5 days -->
</div>
<!-- /page content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        getMonthlyAndWeeklyRevenueData();
        getCustomersAboutToExpireMembership();
    });

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
        $("#tituloSemanal").text("Ganancia semanal del día " + data.last_week + " al día" + data.current_date + "");
        $("#tituloMensual").text("Ganancia mensual del día(" + data.last_year + " al día " + data.current_date + "");
        const barFillColor  = [
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
        const barBorderColor  = [
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
        const idWeeklyChart  = document.getElementById('semanal');
        new Chart(idWeeklyChart, {
            type: 'bar',
            data: {
                labels: data.order_of_the_days_of_the_week,
                datasets: [{
                    label: 'Ganancia $',
                    data: data.daily_Payment_Totals,
                    backgroundColor: barFillColor ,
                    borderColor: barBorderColor ,
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
                        display: false
                    }
                }
            }
        });

        const idMonthlyChart  = document.getElementById('mensual');
        new Chart(idMonthlyChart , {
            type: 'bar',
            data: {
                labels: data.order_of_the_month_of_the_year,
                datasets: [{
                    label: 'Ganancia $',
                    data: data.monthly_Payment_Totals,
                    backgroundColor: barFillColor ,
                    borderColor: barBorderColor ,
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
                        display: false
                    }
                }
            }
        });
    }

    var getCustomersAboutToExpireMembership = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        var tableCliente = $('#dataTableCliente').DataTable({
            "processing": true,
            "ajax": {
                type: "POST",
                "url": "<?php echo constant('URL'); ?>cliente/getCustomersWithUpcomingMembershipExpiry",
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
            buttons: ['copy', 'excel', 'csv', 'pdf'],
            dom: 'Bfltip',
        });
    }
</script>

<?php
$menu->footer();
?>

