<?php
class UsuarioDTO implements JsonSerializable
{
    private $id_usuario;
    private $id_gimnasio;
    private $id_rol;
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
    private $nombreRol;
    private $nombre_gimnasio;
    private $nombre_plan_sistema;
    private $id_plan_sistema;
    private $fecha_inicio;
    private $fecha_termino;
    private $status;
    private $is_active;
    private $telefonoUsuario;
    private $isEmailNotified;


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
