<?php
function getPlantillaFront($clientePagoRecibo, $gimnasio)
{

    if (isset($gimnasio['details']) && is_array($gimnasio['details']) && !empty($gimnasio['details'])) {
        $nombreGimnasio = $gimnasio['details']['nombre_gimnasio'];
        $imagenGimnasio = $gimnasio['details']['imagen_gimnasio'];
    } else {
        $nombreGimnasio = 'Nombre de Gimnasio no disponible';
        $imagenGimnasio = 'public/img/forcefit.png';
    }

    $plantillaFront = '
        <div id="page_pdf">
            <table id="factura_head">
                <tr>
                    <td>
                        <div>
                            <img src="'.$imagenGimnasio.'" style="max-width: 200px;">
                        </div>
                    </td>
                    <td class="info_empresa">
                        <div>
                            <a class="force_titulo" href="https://www.rootheim.com/">'.$nombreGimnasio.'</a><br>
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
                            <p>Nombre del cliente: <label>' . $clientePagoRecibo['nombre_cliente'] . ' ' . $clientePagoRecibo['apellido_paterno_cliente'] . ' ' . $clientePagoRecibo['apellido_materno_cliente'] . '</label></p>
                            <p>Teléfono: <label>' . $clientePagoRecibo['numero_cliente'] . '</label></p>
                            <p>Dirección: <label>' . $clientePagoRecibo['municipio_cliente'] . ', ' . $clientePagoRecibo['colonia_cliente'] . ', ' . $clientePagoRecibo['calle_cliente'] . ', ' . $clientePagoRecibo['codigo_postal_cliente'] . '</label></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="table_pago_uno">
                <tr>
                    <td class="datos_pago_uno">
                        <div>
                            <p>Id del pago: <label>' . $clientePagoRecibo['id_pago'] . '</label></p>
                            <p>Fecha y Hora del pago: <label>' . $clientePagoRecibo['fecha_hora_pago'] . '</label></p>
                            <p>Fecha de vencimiento del pago: <label>' . $clientePagoRecibo['vencimiento'] . '</label></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="table_pago_tres">
                <tr>
                    <td class="datos_pago_tres">
                        <div>
                            <p>Plan del gimnasio: <label>' . $clientePagoRecibo['nombre_plan_gym'] . '</label></p>
                            <p>Formato de pago: <label>' . $clientePagoRecibo['tipo_pago'] . '</label></p>
                            <p>Cantidad: <label>' . $clientePagoRecibo['cantidad_pago'] . '</label></p>
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
