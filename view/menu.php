<?php

class Menu
{
    function header($title)
    {
        echo '<!DOCTYPE html>
            <html lang="en">
            
            <head>
            
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <!-- Meta, title, CSS, favicons, etc. -->
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <title>FORCE FIT</title>
            
                <!-- Bootstrap -->
                <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                <link href="public/css/dataTables.bootstrap4.css" rel="stylesheet">
                <link href="public/css/responsive.bootstrap4.css" rel="stylesheet">
                <link href="public/css/buttons.bootstrap4.min.css" rel="stylesheet">
                <link href="public/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
                <link href="public/css/adminlte.min.css" rel="stylesheet">
                <link href="public/css/icheck-bootstrap.min.css" rel="stylesheet">
                <link href="public/css/jqvmap.min.css" rel="stylesheet">
                <link href="public/css/OverlayScrollbars.min.css" rel="stylesheet">


                <!-- Font Awesome -->
                <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- NProgress -->
                <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
                <link href="public/css/login/sweetalert2.css" rel="stylesheet">



            
                <!-- Custom Theme Style -->
                <link href="public/css/gentella/custom.min.css" rel="stylesheet">
            </head>
            
            <body class="nav-md">
                <div class="container body">
                    <div class="main_container">
                        <div class="col-md-3 left_col">
                            <div class="left_col scroll-view">
                                <div class="navbar nav_title" style="border: 0;">
                                    <a href="' . constant('URL') . 'dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Force Fit</span></a>
                                </div>
            
                                <div class="clearfix"></div>
            
                                <!-- menu profile quick info -->
                                <div class="profile clearfix">
                                    <div class="profile_pic">
                                        <img src="public/img/gentella/img.jpg" alt="..." class="img-circle profile_img">
                                    </div>
                                    <div class="profile_info">
                                        <span>Bienvenido,</span>
                                        <h2>John Doe</h2>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- /menu profile quick info -->
            
                                <br />
            
                                <!-- sidebar menu -->
                                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                    <div class="menu_section">
                                        <ul class="nav side-menu">
                                            <li><a><i class="fa fa-home"></i> Dashboard </a></li>
                                            <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li><a href="' . constant('URL') . 'usuarios">Usuarios</a></li>
                                                    <li><a href="' . constant('URL') . 'rol">Roles</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="' . constant('URL') .'plan_sistema"><i class="fa fa-book"></i> Planes del sistema </a></li>
                                            <li><a href="' . constant('URL') .'cliente"><i class="fa fa-user"></i> Clientes </a></li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /menu footer buttons -->
                            </div>
                        </div>
                        
                        <!-- top navigation -->
                        <div class="top_nav">
                            <div class="nav_menu">
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>
                                <nav class="nav navbar-nav">
                                    <ul class=" navbar-right">
                                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                                id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                                <img src="public/img/gentella/img.jpg" alt="">John Doe
                                            </a>
                                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                                                <a class="dropdown-item" href="javascript:;"><i class="fa fa-user pull-right"></i>Perfil</a>

                                                <a class="dropdown-item" href="javascript:;"><i class="fa fa-info-circle pull-right"></i>Acerca de</a>

                                                <a class="dropdown-item" href="#"><i class="fa fa-sign-out pull-right"></i>Cerrar sesión</a>
                                                
                                            </div>
                                        </li>
            
                                    </ul>
                                </nav>
                            </div>
                        </div>';
    }

    function footer()
    {
        echo '            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Force Fit Support System by <a href="https://www.rootheim.com/">Root Heim Company</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="public/vendors/jquery/dist/jquery.min.js"></script>
    <script src="public/js/jquery-ui.min.js"></script>
    <!-- Bootstrap -->

    <script src="public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="public/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="public/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="public/js/gentella/custom.min.js"></script>
    <script src="public/js/login/sweetalert2.js"></script>

    <script src="public/js/jquery.validate.js"></script>
    <!-- DataTables  & Plugins -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
    <script>
                var idiomaDataTable = {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Registros del _START_ al _END_, Total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                };
            </script>
</body>

</html>';
    }
}
?>