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
            <h3>Plain Page</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Ganancia semanal</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <p>De Tal fecha a Tal fecha</p>
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
                    <h2>Ganancia Mensual</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="mensual" width="auto" height="auto"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Membresías por expirar</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="card-box table-responsive">
                    <table id="dataTableCliente" name="dataTableCliente" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre del cliente</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Teléfono</th>
                                <th>Plan Gimnasio</th>
                                <th>vencimiento</th>
                                <th>Opciones</th>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->


<script>
    var mes;
    var semana;
    var dia;
    var meses;
    $(document).ready(function() {
        traerDatos();
        mostrarCliente();
    });

    var traerDatos = function() {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>dashboard/readPagoByIdgimnasio",
            data: {
                id_gimnasio: id_gimnasio,
            },
            async: false,
            dataType: "json",
            success: function(data) {
                console.log(data.mes);
                console.log(data.semana);
                console.log(data.dia);
                mes = data.mes;
                semana = data.semana;
                dia = data.dia;
                meses = data.meses;
                console.log(meses)

                inicializarGrafico();
            },
            error: function(xhr, status, error) {
                // Imprimir el mensaje de error en la consola
                console.error("Error " + error);
            }
        });
    }

    function inicializarGrafico() {
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
        const dias = dia;
        const semanal = document.getElementById('semanal');
        new Chart(semanal, {
            type: 'bar',
            data: {
                labels: dias,
                datasets: [{
                    label: '# of Votes',
                    data: semana,
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
                labels: meses,
                datasets: [{
                    label: '# of Votes',
                    data: mes,
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
                "url": "<?php echo constant('URL'); ?>cliente/readExpireTable",
                data: {
                    id_gimnasio: id_gimnasio
                },
                dataSrc: function(json) {
                    let customData = [];
                    json.data.forEach(element => {
                        customData = [...customData, {
                            ...element,
                            option: `
                            <div class="d-flex justify-content-center align-items-center text-center"> 
        <a href="<?php echo constant("URL"); ?>cliente" class="btn btn-primary"> 
        <i class="fa fa-user"></i>Clientes 
        </a> 
        </div>`
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
        // obtenerdatosDT(tableCliente);
    }
</script>

<?php
$menu->footer();
?>