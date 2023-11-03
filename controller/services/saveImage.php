<?php
class SaveImage
{
    public static function invoke($carpeta, $imagen)
    {
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        
        $nombreImagen = $imagen["name"];
        $rutaProvisional = $imagen["tmp_name"];
        
        copy($rutaProvisional, $carpeta . $nombreImagen);
        return $nombreImagen;
    }
}
