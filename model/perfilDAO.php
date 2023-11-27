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
        $queryValidatePasswordInBD = $this->db->prepare("SELECT passwordUsuario
        FROM usuario
        WHERE id_usuario = :idUsuario AND passwordUsuario = SHA1(:passwordBD)");
        $queryValidatePasswordInBD->bindParam(":idUsuario", $data['id_usuario']);
        $queryValidatePasswordInBD->bindParam(":passwordBD", $data['oldPassword']);
        $queryValidatePasswordInBD->execute();

        $passwordMatch = $queryValidatePasswordInBD->fetch(PDO::FETCH_ASSOC);

        if (!$passwordMatch) {
            return "error";
        }

        $queryUpdatePassword = $this->db->prepare("
        UPDATE usuario SET 
        passwordUsuario = SHA1(:newPassword)
        WHERE id_usuario = :idUsuario");
        $queryUpdatePassword->bindParam(":idUsuario", $data['id_usuario']);
        $queryUpdatePassword->bindParam(":newPassword", $data['newPassword']);
        $queryUpdatePassword->execute();

        echo "ok";
    }
}
