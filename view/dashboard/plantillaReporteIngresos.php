<?php

function getPlantillaFront($reporteGanancias)
{
    $imagenGimnasio = 'logo_gimnasio';
    $fotorutaServer = constant('URL') . 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/' . $reporteGanancias[0]['logo_gimnasio'];
    $fotorutaSistem = 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/' . $reporteGanancias[0]['logo_gimnasio'];

    if (!file_exists($fotorutaSistem) or !is_readable($fotorutaSistem)) {
        $imagenGimnasio = 'forcefit.png';
        $fotorutaServer = constant('URL') . 'public/img/' . $imagenGimnasio;
    } else {
        $outputPath = 'public/gimnasio/' . $reporteGanancias[0]['id_gimnasio'] . '/circular_' . $reporteGanancias[0]['logo_gimnasio'];
        makeCircularImage($fotorutaSistem, $outputPath, 100); // Tamaño reducido a 100x100
        $fotorutaServer = constant('URL') . $outputPath;
    }

    $plantillaFront = '
        <div id="page_pdf">
            <table id="factura_head">
                <tr>
                    <td>
                        <div>
                            <img src="' . $fotorutaServer . '" class="logo-img" style="width: 100px; height: 100px;">
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
            <tr style="background-color: #E0E0E0;"> <!-- Color gris tenue para años -->
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

        $totalAnual = 0;
        for ($i = 1; $i <= 12; $i++) {
            $ingresosMes = isset($meses[$i]) ? $meses[$i] : 0;
            $plantillaFront .= '<td style="border: 1px solid black; padding: 8px; text-align: center;">' . $ingresosMes . '</td>';
            $totalAnual += $ingresosMes;
        }

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

function makeCircularImage($imagePath, $outputPath, $newSize) {
    $src = imagecreatefromstring(file_get_contents($imagePath));
    $width = imagesx($src);
    $height = imagesy($src);
    $size = min($width, $height);
    
    $dst = imagecreatetruecolor($newSize, $newSize);
    imagesavealpha($dst, true);
    $trans_colour = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefill($dst, 0, 0, $trans_colour);

    $radius = $newSize / 2;
    $scale = $size / $newSize;

    for ($x = 0; $x < $newSize; $x++) {
        for ($y = 0; $y < $newSize; $y++) {
            $dx = $x - $radius;
            $dy = $y - $radius;
            if (($dx * $dx + $dy * $dy) < ($radius * $radius)) {
                $color = imagecolorat($src, ($x * $scale) + ($width - $size) / 2, ($y * $scale) + ($height - $size) / 2);
                imagesetpixel($dst, $x, $y, $color);
            }
        }
    }

    imagepng($dst, $outputPath);
    imagedestroy($src);
    imagedestroy($dst);
}

?>
