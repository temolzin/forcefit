<?php

function getPlantillaFront($reporteGanancias)
{
   
    $imagenGimnasio = 'logo_gimnasio';
    $fotorutaServer = constant('URL') . 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/' . $reporteGanancias[0]['logo_gimnasio'];
    $fotorutaSistem = 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/' . $reporteGanancias[0]['logo_gimnasio'];

    if (empty($reporteGanancias[0]['logo_gimnasio']) || !file_exists($fotorutaSistem) || !is_readable($fotorutaSistem)) {
        $imagenGimnasio = 'forcefit.png';
        $fotorutaServer = constant('URL') . 'public/img/' . $imagenGimnasio;
    } else {
        $outputPath = 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/circular_' . $reporteGanancias[0]['logo_gimnasio'];
        CreateImageCircular($fotorutaSistem, $outputPath, 200);
        $fotorutaServer = constant('URL') . $outputPath;
    }

    $plantillaFront = '
    <body>
        <div id="page_pdf">
            <table id="factura_head">
                <tr>
                    <td>
                        <div>
                            <img src="' . $fotorutaServer . '" style="max-width: 100px;">
                        </div>
                    </td>
                    <td class="info_empresa">
                        <div>
                            <a class="force_titulo" href="https://www.rootheim.com/">' . $reporteGanancias[0]['nombre_gimnasio'] . '</a><br>
                            <span class="h3">Reporte de Ganancias</span><br>
                            <p>Fecha: ' . date('Y-m-d H:i:s') . '</p>
                        </div>
                    </td>
                </tr>
            </table>';

    $ingresosPorMes = array();

    foreach ($reporteGanancias as $value) {
        $anio = $value['anio'];
        $mes = $value['mes'];
        $ingresosMes = $value['ingresos_mes'];

        if (!isset($ingresosPorMes[$anio])) {
            $ingresosPorMes[$anio] = array();
        }

        if (!isset($ingresosPorMes[$anio][$mes])) {
            $ingresosPorMes[$anio][$mes] = 0;
        }

        $ingresosPorMes[$anio][$mes] += $ingresosMes;
    }

    $plantillaFront .= '<table class="ganancias" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
            <tr style="background-color: #E0E0E0;">
                <th style="border: 1px solid black; padding: 8px; text-align: center;">Año</th>';

    for ($i = 1; $i <= 12; $i++) {
        $nombreMes = obtenerNombreMes($i);
        $plantillaFront .= '<th style="border: 1px solid black; padding: 8px; text-align: center;">' . $nombreMes . '</th>';
    }

    $plantillaFront .= '<th style="border: 1px solid black; padding: 8px; text-align: center; background-color: #E0E0E0;">Total</th>';
    $plantillaFront .= '</tr>
        </thead>
        <tbody>';

    $totalGeneral = 0;

    foreach ($ingresosPorMes as $anio => $meses) {
        $plantillaFront .= '<tr>';
        $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;">' . $anio . '</td>';

        for ($i = 1; $i <= 12; $i++) {
            $ingresosMes = isset($meses[$i]) ? $meses[$i] : 0;
            $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;">' . $ingresosMes . '</td>';
        }

        $totalAnual = array_sum($meses);
        $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;"><b>' . $totalAnual . '</b></td>';
        $plantillaFront .= '</tr>';

        $totalGeneral += $totalAnual;
    }

    $plantillaFront .= '<tr style="background-color: #f2f2f2;">';
    $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;" colspan="13"><b>Total General</b></td>';
    $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;"><b>' . $totalGeneral . '</b></td>';
    $plantillaFront .= '</tr>';

    $plantillaFront .= '</tbody></table>';

    $plantillaFront .= '
        </div>
        <div class="info_Eabajo">
            <a class="text_infoE" href="https://www.rootheim.com/">Force Fit by Root Heim Company</a>
        </div>
    ';

    return $plantillaFront;
}

function obtenerNombreMes($mes)
{
    $meses = array(
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    );

    return $meses[$mes];
}

function CreateImageCircular($imagePath, $outputPath, $maxSize) {
    $src = imageCreateFromString(file_get_contents($imagePath));
    $width = imagesX($src);
    $height = imagesY($src);
    $size = min($width, $height);

    $newSize = min($maxSize, $size);

    $imageRetouch = imagecreatetruecolor($newSize, $newSize);
    imagesavealpha($imageRetouch, true);
    $transColour = imagecolorallocatealpha($imageRetouch, 0, 0, 0, 127);
    imageFill($imageRetouch, 0, 0, $transColour);

    $radius = $newSize / 2;

    for ($x = 0; $x < $newSize; $x++) {
        for ($y = 0; $y < $newSize; $y++) {
            $dX = $x - $radius;
            $dY = $y - $radius;
            $distance = sqrt($dX * $dX + $dY * $dY);

            if ($distance < $radius) {
                $srcX = $width / 2 + ($dX / $radius) * ($size / 2);
                $srcY = $height / 2 + ($dY / $radius) * ($size / 2);
                $color = imagecolorat($src, $srcX, $srcY);
                imagesetpixel($imageRetouch, $x, $y, $color);
            }
        }
    }

    imagepng($imageRetouch, $outputPath);
    imagedestroy($src);
    imagedestroy($imageRetouch);
}

?>
