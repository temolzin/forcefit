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
                <link rel="shortcut icon" href="public/img/logos/iconoRojo.png">

            
                <!-- Bootstrap -->
                <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                <!-- Font Awesome -->
                <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <!-- NProgress -->
                <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
            
                <!-- Custom Theme Style -->
                <link href="public/css/gentella/custom.min.css" rel="stylesheet">
            </head>
            
            <body class="nav-md">
                <div class="container body">
                    <div class="main_container">
                        <div class="col-md-3 left_col">
                            <div class="left_col scroll-view">
                                <div class="navbar nav_title" style="border: 0;">
                                    <a href="index.html" class="site_title"><img src= "public/img/logos/iconoRojo.png"> <span>Force Fit</span></a>
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
                                            <li><a><i class="fa fa-home"></i> Dashboard</a>
                                            </li>
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
    <!-- Bootstrap -->
    <script src="public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="public/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="public/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="public/js/gentella/custom.min.js"></script>
</body>

</html>';
        }
    }
?>