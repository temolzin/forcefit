<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('dashboard');
?>
<link rel="stylesheet" href="public/css/about/about.css">

<body>
    <div class="right_col" role="main" style="min-height: 825px;">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">

                        <div class="about-section">
                            <h1>Acerca de Nosotros</h1>
                        </div>

                        <div class="about-section-2 background">
                        <h1 class="centrado">¿Quiénes Somos?</h1>

                            <div class="parrafo">
                                <p>Root Heim Company es una empresa especializada en el desarrollo de software de alta
                                    calidad.
                                    Nuestro equipo está compuesto por expertos en programación y tecnología que trabajan
                                    en
                                    conjunto para brindar soluciones innovadoras y personalizadas a
                                    cada uno de nuestros clientes.</p>
                            </div>
                        </div>

                        <div class="about-section-3 background">
                            <div class="col-izq">
                                <h1>Misión</h1>
                                <p>Brindar servicios profesionales a nuestros clientes con soluciones agiles y
                                    consistentes,
                                    implementando las tecnologías actuales del mercado,
                                    además de innovaciones que el mercado requiere; manteniendo siempre la calidad de
                                    nuestro servicio, caracterizándonos por el trato, oportunidades y forma de trabajo
                                    con nuestros colaboradores.</p>
                            </div>
                            <div class="col-med">
                                <h1>Visión</h1>
                                <p>Ser una empresa reconocida a nivel mundial ofreciendo servicios profesionales
                                    especializados en tecnología y capacitación a empresas públicas y
                                    privadas, derivado de importaciones y exportaciones a clientes nacionales y
                                    extranjeros.</p>
                            </div>
                            <div class="col-izq">
                                <h1>Filosofia</h1>
                                <p>La filosofía de ROOT HEIM COMPANY S.A. de C.V., radica en ofrecer servicios
                                    ampliamente profesionales dentro del mercado de las TIC´s
                                    internacionalmente, con el propósito de mejorar e innovar constantemente, mostrando
                                    la mejor presentación, calidad; afrontando los retos que
                                    presentan las organizaciones hoy en dia.</p>
                            </div>
                        </div>

                        <div class="about-section-4">

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
