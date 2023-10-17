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
        $queryGetDatasUser = "SELECT u.*, r.*
        FROM usuario as u
        INNER JOIN rol AS r ON u.id_rol = r.id_rol
        WHERE id_usuario = $id_usuario";
        $dataUser = $this->db->consultar($queryGetDatasUser);
        echo json_encode($dataUser);
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

        $queryUpdateUser = "UPDATE usuario SET 
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
            $queryUpdateUser .= ", imagen = :imagen";
            $_SESSION['imagen'] = $data['imageUserUpdate'];
        }

        $queryUpdateUser .= " WHERE id_usuario = :id_usuario";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            $_SESSION['nombreUsuario'] = $data['nameUser'];
            $_SESSION['apellidoPaternoUsuario'] = $data['lastNameP'];
            echo "ok";
        }
    }

    public function updatePassword($data)
    {
        $inputOldPassword = $data['oldPassword'];

        $querySearchPassword = "SELECT passwordUsuario
        FROM usuario
        WHERE id_usuario = " . $data['id_usuario'];
        $passwordBD = $this->db->consultar($querySearchPassword);

        if ($passwordBD[0]['passwordUsuario'] !== $inputOldPassword) {
            return "error";
        }

        $insertData = array(
            ':newPassword' => $data['newPassword']
        );

        $query = "UPDATE usuario SET 
        passwordUsuario = :newPassword
        WHERE id_usuario = " . $data['id_usuario'];

        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
    }
}
