<?php
function getPlantillaFront($cliente)
{
    if (isset($cliente['pagos']) && is_array($cliente['pagos']) && !empty($cliente['pagos'])) {
        $pagos = $cliente['pagos'];
    } else {
        $pagos = array();
    }
    
    $plantillaFront = '
            <div id="page_pdf">
                <div class="logo">
                    <img src="public/img/logos/logotipoAzulBlanco.png">
                </div>
                <table id="reporte_head">
                    <tr>
                        <td class="info_empresa">
                            <div>
                                <a class="force_titulo" href="https://www.rootheim.com/">FORCE FIT</a><br>
                                <a class="link_Whats" href="https://wa.me/525623640302">WhatsApp: +52 56 2364 0302</a><br>
                                <a class="link_Email" href="mailto:info@rootheim.com">Email: info@rootheim.com</a>
                            </div>
                        </td>
                        <td class="info_reporte">
                            <div class="round">
                                <span class="h3">Reporte de Pagos</span>
                                <p>Fecha y Hora: ' . $cliente['pagos'][0]['fecha_hora_pago'] . '</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <table id="reporte_cliente">
                    <tr>
                        <td class="info_cliente">
                            <div class="round">
                                <span class="h3">Cliente</span>
                                <table class="datos_cliente">
                                    <tr>
                                        <td><label>Nombre:</label> <p> ' . $cliente['pagos'][0]['nombre_cliente'] . ' ' . $cliente['pagos'][0]['apellido_paterno_cliente'] . ' ' . $cliente['pagos'][0]['apellido_materno_cliente'] . '</p></td>
                                        <td><label>Teléfono:</label> <p>' . $cliente['pagos'][0]['numero_cliente'] . '</p></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <table id="reporte_detalle">
                        <thead>
                            <tr>
                                <th class="textable">Id</th>
                                <th class="textable">Plan del gimnasio</th>
                                <th class="textable">Fecha y hora del pago</th>
                                <th class="textable">Formato de pago</th>
                                <th class="textable">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_productos">';
                foreach ($pagos as $pago) {
                    $plantillaFront .= '
                                        <tr>
                                            <td class="textcenter">' . $pago['id_pago'] . '</td>
                                            <td class="textright">' . $pago['nombre_´plan_gym'] . '</td>
                                            <td class="textright">' . $pago['fecha_hora_pago'] . '</td>			
                                            <td class="textright">' . $pago['tipo_pago'] . '</td>
                                            <td class="textright">' . $pago['cantidad_pago'] . '</td>
                                        </tr>';
                }
    $plantillaFront .= '
                        </tbody>
                </table>
            </div>
            <div class="info_Eabajo">
                <a class="text_infoE" href="https://www.rootheim.com/">Force Fit by Root Heim Company</a>
            </div>
    ';
    
    return $plantillaFront;
}
