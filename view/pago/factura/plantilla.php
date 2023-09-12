<?php
function getPlantillaFront($cliente)
{
    $plantillaFront = '
            <div id="page_pdf">
                <div class="logo">
                    <img src="public/img/forcefit.png">
                </div>
                <table id="factura_head">
                    <tr>
                        <td class="info_empresa">
                            <div>
                                <span class="h2">FORCE FIT</span>
                                <p>Teléfono: +52 56 2364 0302</p>
                                <p>Email: info@rootheim.com</p>
                            </div>
                        </td>
                        <td class="info_factura">
                            <div class="round">
                                <span class="h3">Reporte de Pagos</span>
                                <p>Fecha y Hora: ' . $cliente['fecha_hora_pago'] . '</p>
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
                                        <td><label>Nombre:</label> <p> ' . $cliente['nombre_cliente'] . ' ' . $cliente['apellido_paterno_cliente'] . ' ' . $cliente['apellido_materno_cliente'] . '</p></td>
                                        <td><label>Teléfono:</label> <p>' . $cliente['numero_cliente'] . '</p></td>
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
                        <tbody id="detalle_productos">
                            <tr>
                                <td class="textcenter">' . $cliente['id_cliente'] . '</td>
                                <td class="textright">' . $cliente['nombrePlanGym'] . '</td>
                                <td class="textright">' . $cliente['fecha_hora_pago'] . '</td>			
                                <td class="textright">' . $cliente['tipo_Pago'] . '</td>
                                <td class="textright">' . $cliente['cantidad_pago'] . '</td>
                            </tr>
                        </tbody>
                </table>
            </div>
            <div class="info_Eabajo">
                <p class="text_infoE">Force Fit by Root Heim Company</p>
            </div>
    ';
    
    return $plantillaFront;
}
