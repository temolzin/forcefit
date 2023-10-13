<?php
class PerfilDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
    }

    public function delete($id)
    {
    }

    public function read()
    {
    }

    public function getUserData($id_usuario)
    {
        $query = "SELECT u.*, r.*
        FROM usuario as u
        INNER JOIN rol AS r ON u.id_rol = r.id_rol
        WHERE id_usuario = $id_usuario";
        $query_results = $this->db->consultar($query);
        echo json_encode($query_results);
    }

    public function update($data)
    {
        session_start();
        $insertData = array(
            ':id_usuario' => $data['id_usuario'],
            ':nombreUsuario' => $data['nameUser'],
            ':apellidoPaternoUsuario' => $data['lastNameP'],
            ':apellidoMaternoUsuario' => $data['lastNameM'],
            ':correoUsuario' => $data['emailUser'],
            ':calleUsuario' => $data['streetUser'],
            ':estadoUsuario' => $data['stateUser'],
            ':municipioUsuario' => $data['municipalityUser'],
            ':coloniaUsuario' => $data['colonyUser'],
            ':codigoPostalUsuario' => $data['postalcodeUser'],
        );

        $query = "UPDATE usuario SET 
        nombreUsuario = :nombreUsuario,
        apellidoPaternoUsuario = :apellidoPaternoUsuario,
        apellidoMaternoUsuario = :apellidoMaternoUsuario,
        emailUsuario = :correoUsuario,
        calleUsuario = :calleUsuario,
        estadoUsuario = :estadoUsuario,
        municipioUsuario = :municipioUsuario,
        coloniaUsuario = :coloniaUsuario,
        codigoPostalUsuario = :codigoPostalUsuario";
        
        if (isset($data['imageUserUpdate'])) {
            $insertData[':imagen'] = $data['imageUserUpdate'];
            $query .= ", imagen = :imagen";
            $_SESSION['imagen'] = $data['imageUserUpdate'];
        }
        $query .= " WHERE id_usuario = :id_usuario";

        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
        $_SESSION['nombreUsuario'] = $data['nameUser'];
        $_SESSION['apellidoPaternoUsuario'] = $data['lastNameP'];
    }

    public function updatePassword($data)
    {
        $actualContrasena = $data['oldPassword'];
        
        $query = "SELECT passwordUsuario
        FROM usuario
        WHERE id_usuario = " . $data['id_usuario'];
        $passwordBD = $this->db->consultar($query);

        if($passwordBD[0]['passwordUsuario'] !== $actualContrasena){
            return "error ";
        }

        $insertData = array(
            ':actualContrasena' => $data['newPassword']
        );
        
        $query = "UPDATE usuario SET 
        passwordUsuario = :actualContrasena
        WHERE id_usuario = " . $data['id_usuario'];

        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
    }
}
