<?php
class ClienteDTO implements JsonSerializable
{
    private $id_cliente;
    private $nombrePlanGym;
    private $nombre_cliente;
    private $apellido_paterno_cliente;
    private $apellido_materno_cliente;
    private $municipio_cliente;
    private $colonia_cliente;
    private $calle_cliente;
    private $codigo_postal_cliente;
    private $numero_cliente;
    private $imagen_cliente;
    // Dato tomado de la tabla pago_plan_gym_cliente
    private $fecha_vencimiento;
    private $is_active;
    private $email_customer;
    private $is_email_notified;

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

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>

