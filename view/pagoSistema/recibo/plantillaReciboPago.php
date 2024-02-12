<?php
function getPlantillaFront($usuarioPagoRecibo)
{
    $fotorutaServer = constant('URL') . 'public/gimnasio/' . $usuarioPagoRecibo['id_gimnasio'] . '/' .$usuarioPagoRecibo['imagen'];
    $fotorutaSistem = 'public/gimnasio/' . $usuarioPagoRecibo['id_gimnasio'] . '/' .$usuarioPagoRecibo['imagen'];
    if (!file_exists($fotorutaSistem)) {
        $fotorutaServer = constant('URL') . 'public/img/defaultFotoGym.png';
    }

    $plantillaFront = '
        <div id="page_pdf">
            <table id="factura_head">
                <tr>
                    <td>
                        <div>
                            <img src="' .$fotorutaServer. '" style="max-width: 200px;">
                        </div>
                    </td>
                    <td class="info_empresa">
                        <div>
                            <a class="force_titulo" href="https://www.rootheim.com/">' . $usuarioPagoRecibo['nombre_gimnasio'] . '</a><br>
                            <a class="link_Whats" href="https://wa.me/525623640302">WhatsApp: +52 56 2364 0302</a><br>
                            <a class="link_Email" href="mailto:info@rootheim.com">Email: info@rootheim.com</a>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="card card-bg">
                <div class="card-content">
                    <h2>Recibo de pago</h2>
                </div>
            </div>
            <table id="table_pago_dos">
                <tr>
                    <td class="datos_pago_dos">
                        <div>
                            <p>Nombre del cliente: <label>' . $usuarioPagoRecibo['nombre'] . ' ' . $usuarioPagoRecibo['apellido_paterno'] . ' ' . $usuarioPagoRecibo['apellido_materno'] . '</label></p>
                            <p>Teléfono: <label>' . $usuarioPagoRecibo['telefono'] . '</label></p>
                            <p>Dirección: <label>' . $usuarioPagoRecibo['municipio'] . ', ' . $usuarioPagoRecibo['colonia'] . ', ' . $usuarioPagoRecibo['calle'] . ', ' . $usuarioPagoRecibo['codigo_postal'] . '</label></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="table_pago_uno">
                <tr>
                    <td class="datos_pago_uno">
                        <div>
                            <p>Id del pago: <label>' . $usuarioPagoRecibo['id_pago'] . '</label></p>
                            <p>Fecha y Hora del pago: <label>' . $usuarioPagoRecibo['fecha_hora_pago'] . '</label></p>
                            <p>Fecha de vencimiento del pago: <label>' . $usuarioPagoRecibo['vencimiento'] . '</label></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="table_pago_tres">
                <tr>
                    <td class="datos_pago_tres">
                        <div>
                            <p>Plan del gimnasio: <label>' . $usuarioPagoRecibo['nombre_plan_sistema'] . '</label></p>
                            <p>Formato de pago: <label>' . $usuarioPagoRecibo['tipo_pago'] . '</label></p>
                            <p>Cantidad: <label>' . $usuarioPagoRecibo['cantidad_pago'] . '</label></p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="info_Eabajo">
            <a class="text_infoE" href="https://www.rootheim.com/">Force Fit by Root Heim Company</a>
        </div>
    ';
    
    return $plantillaFront;
}
