<?php
function getPlantillaFront($cliente)
{

    if ($cliente['imagen_cliente'] !== null && file_exists('public/cliente/' . $cliente['nombre_cliente'] . '_' . $cliente['apellido_paterno_cliente'] . '/' . $cliente['imagen_cliente'])) {
        $fotoruta = constant('URL') . 'public/cliente/' . $cliente['nombre_cliente'] . '_' . $cliente['apellido_paterno_cliente'] . '/' . $cliente['imagen_cliente'];
    } else {
        $fotoruta = constant('URL') . 'public/img/defaultFotoCliente.png';
    }
    $plantillaFront = '
        <div class="front">
            <div class="logo"><img src="public/img/forcefit.png"></div>
            <div><img class="foto" src="' .$fotoruta. '"></div>

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
    if ($cliente['imagen'] !== null && file_exists('public/gimnasio/' . $cliente['nombre_gimnasio'] . '_' . $cliente['telefono']  . '/' .$cliente['imagen'])) {
        $fotoruta = constant('URL') . 'public/gimnasio/' . $cliente['nombre_gimnasio'] . '_' . $cliente['telefono']  . '/' .$cliente['imagen'];
    } else {
        $fotoruta = constant('URL') . 'public/img/defaultFotoGym.png';
    }
    $plantillaBack = '
        <div class="back">
            <div class="logo"><img src="public/img/forcefit.png"></div>
            
            <div class="container"><img class="foto" src="' . $fotoruta . '"></div>
            <div>
                <h5>Nombre del GYM: ' . $cliente['nombre_gimnasio'] . '</h5>
                <p>Telefono: ' . $cliente['telefono'] . '</p>
                <p></p>
            </div>
        </div>
    ';
    return $plantillaBack;
}
