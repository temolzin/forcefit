<?php
class SaveImage
{
    public static function invoke($Carpeta, $imagen)
    {
        if (!file_exists($Carpeta)) {
            mkdir($Carpeta, 0777, true);
        }
        
        $nombreImagen = $imagen["name"];
        $ruta_provisional = $imagen["tmp_name"];
        
        copy($ruta_provisional, $Carpeta . $nombreImagen);
        return $nombreImagen;
    }
}
