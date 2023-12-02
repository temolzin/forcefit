<?php session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . constant('URL'));
 }

require 'view/menu.php';
$menu = new Menu();
$menu->header('dashboard');
?>
<link rel="stylesheet" href="public/css/about/styles.css">

<body>
    <div class="right_col" role="main" style="min-height: 825px;">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_panel">
                    <div class="about-section">
                        <img class="img" src="public/img/forcefit.png" alt="">
                        <div class="inner-container">
                            <h1>Acerca de Nosotros</h1>
                            <p class="text">
                                En nuestro sistema de gestión de gimnasios, nos dedicamos a ayudar a los dueños de
                                gimnasios y centros deportivos a optimizar y mejorar su gestión empresarial. Nuestro
                                equipo está formado por expertos en tecnología y en el sector del fitness, y nos
                                enorgullecemos de ofrecer una solución integral y personalizada que se adapta a las
                                necesidades específicas de cada cliente.
                            </p>
                            <p class="text">
                                Nuestro sistema de gestión de gimnasios cuenta con funciones avanzadas y herramientas de
                                análisis que permiten a los propietarios y administradores tomar decisiones informadas
                                basadas en datos en tiempo real, lo que les permite mejorar la eficiencia y el
                                rendimiento de su negocio. Además, nuestro sistema está diseñado para ser fácil de usar
                                y se puede personalizar para satisfacer las necesidades de cualquier tamaño de negocio.
                            </p>
                            <p class="text">
                                En resumen, nuestro sistema de gestión de gimnasios es la solución ideal para aquellos
                                que buscan mejorar la gestión y la rentabilidad de su negocio.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
$menu->footer();
?>

