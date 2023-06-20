<?php
class UsuarioDTO implements JsonSerializable
{
    private $id_usuario;
    private $nombreUsuario;
    private $apellidoPaternoUsuario;
    private $apellidoMaternoUsuario;
    private $emailUsuario;
    private $passwordUsuario;
    private $imagen;
    private $calleUsuario;
    private $estadoUsuario;
    private $municipioUsuario;
    private $coloniaUsuario;
    private $codigoPostalUsuario;
    private $id_rol;


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

