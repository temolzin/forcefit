<?php
class DashboardDTO implements JsonSerializable
{
    private $id_pago;
    private $cantidad_pago;
    private $fecha_hora_pago;
    private $vencimiento;
    private $id_cliente;
    private $id_planGym;
    private $tipo_Pago;
    private $nombre_cliente;
    private $nombrePlanGym;
    
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
