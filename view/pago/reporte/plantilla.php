<?php
function getPlantillaFront($cliente)
{
    if (isset($cliente['pagos']) && is_array($cliente['pagos']) && !empty($cliente['pagos'])) {
        $pagos = $cliente['pagos'];
    } else {
        $pagos = array(); // Define un arreglo vacío si no hay datos de pagos
    }
    
    $plantillaFront = '
            <div id="page_pdf">
                <div class="logo">
                    <img src="public/img/forcefit.png">
                </div>
                <table id="factura_head">
                    <tr>
                        <td class="info_empresa">
                            <div>
                                <span class="h2">FORCE FIT</span><br>
                                <a class="link_Whats" href="https://wa.me/525623640302">WhatsApp: +52 56 2364 0302</a><br>
                                <a class="link_Email" href="mailto:info@rootheim.com">Email: info@rootheim.com</a>
                            </div>
                        </td>
                        <td class="info_factura">
                            <div class="round">
                                <span class="h3">Reporte de Pagos</span>
                                <p>Fecha y Hora: ' . $cliente['pagos'][0]['fecha_hora_pago'] . '</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <table id="factura_cliente">
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
                <table id="factura_detalle">
                        <thead>
                            <tr>
                                <th width="50px">ID</th>
                                <th  class="textright" width="150px">Plan del Gimnacio</th>
                                <th  class="textright" width="150px">Fecha y hora del pago</th>
                                <th class="textright" width="150px">Formato de pago</th>
                                <th class="textright" width="150px"> Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_productos">';
                foreach ($pagos as $pago) {
                    $plantillaFront .= '
                                        <tr>
                                            <td class="textcenter">' . $pago['id_pago'] . '</td>
                                            <td class="textright">' . $pago['nombrePlanGym'] . '</td>
                                            <td class="textright">' . $pago['fecha_hora_pago'] . '</td>			
                                            <td class="textright">' . $pago['tipo_Pago'] . '</td>
                                            <td class="textright">' . $pago['cantidad_pago'] . '</td>
                                        </tr>';
                }
    $plantillaFront .= '
                        </tbody>
                </table>
            </div>
            <div class="info_Eabajo">
                <p class="text_infoE">Force Fit by Root Heim Company</p>
            </div>
    ';
    
    return $plantillaFront;
}
