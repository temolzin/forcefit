<?php
class PagoSistemaDTO implements JsonSerializable
{
    private $id_pago;
    private $fecha_hora_pago;
    private $vencimiento;
    private $id_usuario;
    private $id_plan_sistema;
    private $tipo_Pago;
    private $nombreUsuario;
    private $nombre_plan_sistema;
    private $cantidadPago;
    private $costo;

    
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
