<?php
class VentaDTO implements JsonSerializable
{
    private $id_cliente;
    private $id_venta;
    private $id_detalle;
    private $fecha;
    private $total;
    private $nombre_cliente;
    private $cantidad;
    private $precio_Unitario;
    private $subtotal;
    private $id_producto;
    private $nombre_producto;


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
