<?php
function getPlantillaFront($cliente)
{

    $fotorutaServer = constant('URL') . 'public/cliente/' . $cliente['id_cliente'] . '/' . $cliente['imagen_cliente'];
    $fotorutaSistem = 'public/cliente/' . $cliente['id_cliente'] . '/' . $cliente['imagen_cliente'];
    if (!file_exists($fotorutaSistem) || $cliente['imagen_cliente'] === null) {
        $fotorutaServer = constant('URL') . 'public/img/defaultFotoCliente.png';
    }
    $plantillaFront = '
        <div class="front">
            <div class="logo"><img src="public/img/forcefit.png"></div>
            <div><img class="foto" src="' .$fotorutaServer. '"></div>

            <div >
                <h5>Nombre: ' . $cliente['nombre_cliente'] . ' ' . $cliente['apellido_paterno_cliente'] . ' ' . $cliente['apellido_materno_cliente'] . '</h5>
                <p>Telefono: ' . $cliente['numero_cliente'] . '</p>
                <p>Dirección: ' . $cliente['calle_cliente'] .' '.",".' '. $cliente['colonia_cliente'] .  ''.",".'  ' . $cliente['municipio_cliente'] .  '</p>
            </div>
        </div> 
    ';
    
    return $plantillaFront;
}

function getPlantillaBack($cliente)
{
    $fotorutaServer = constant('URL') . 'public/gimnasio/' . $cliente['id_gimnasio'] . '/' .$cliente['imagen'];
    $fotorutaSistem = 'public/gimnasio/' . $cliente['id_gimnasio'] . '/' .$cliente['imagen'];
    if (!file_exists($fotorutaSistem)) {
        $fotorutaServer = constant('URL') . 'public/img/defaultFotoGym.png';
    }
    $plantillaBack = '
        <div class="back">
            <div class="logo"><img src="public/img/forcefit.png"></div>
            
            <div class="container"><img class="foto" src="' . $fotorutaServer . '"></div>
            <div>
                <h5>Nombre del GYM: ' . $cliente['nombre_gimnasio'] . '</h5>
                <p>Telefono: ' . $cliente['telefono'] . '</p>
                <p></p>
            </div>
        </div>
    ';
    return $plantillaBack;
}
