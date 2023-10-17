<?php
class Perfil extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('perfil/index');
    }

    function getUserData()
    {
        $id_usuario = $_GET['id_usuario'];
        require 'model/perfilDAO.php';
        $this->loadModel('PerfildDAO');
        $perfilDAO = new PerfilDAO();
        $perfilDAO = $perfilDAO->getUserData($id_usuario);
    }

    function formUpdatePerfil()
    {
        $nameUser = $_POST['nameUser'];
        $lastNameP = $_POST['lastNameP'];
        $lastNameM = $_POST['lastNameM'];
        $emailUser = $_POST['emailUser'];
        $streetUser = $_POST['streetUser'];
        $stateUser = $_POST['stateUser'];
        $municipalityUser = $_POST['municipalityUser'];
        $colonyUser = $_POST['colonyUser'];
        $postalcodeUser = $_POST['postalcodeUser'];
        $id_usuario = $_POST['id_usuario'];
        $oldNameUser = $_POST['oldNameUser'];
        $oldLastNameUser = $_POST['oldLastNameUser'];

        $data = array(
            'id_usuario' => $id_usuario,
            'nameUser' => $nameUser,
            'lastNameP' => $lastNameP,
            'lastNameM' => $lastNameM,
            'emailUser' => $emailUser,
            'streetUser' => $streetUser,
            'stateUser' => $stateUser,
            'municipalityUser' => $municipalityUser,
            'colonyUser' => $colonyUser,
            'postalcodeUser' => $postalcodeUser
        );

        $newFullname = $nameUser . "_" . $lastNameP;
        $newCarpeta = "public/usuario/" . $id_usuario . "_" . $newFullname . "/";
        if (!file_exists($newCarpeta)) {
            mkdir($newCarpeta, 0777, true);
        }

        if ($oldNameUser != $nameUser || $lastNameP != $oldLastNameUser) {
            $oldFullname = $oldNameUser . "_" . $oldLastNameUser;
            $oldCarpeta = "public/usuario/" . $id_usuario . "_" . $oldFullname . "/" . $_POST['imagen'];

            copy($oldCarpeta, $newCarpeta . $_POST['imagen']);
        }

        if (!empty($_FILES["imageUserUpdate"]["name"])) {
            $imagen = $_FILES["imageUserUpdate"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            if ($tipoImagen === 'image/jpg' || $tipoImagen === 'image/jpeg' || $tipoImagen === 'image/png' || $tipoImagen === 'image/gif') {
                copy($ruta_provisional, $newCarpeta . $nombreImagen);
                $data['imageUserUpdate'] = $nombreImagen;
            }
        }

        require 'model/perfilDAO.php';
        $this->loadModel('perfilDAO');
        $perfilDAO = new PerfilDAO();
        $perfilDAO->update($data);
    }

    function updatePassword()
    {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $id_usuario = $_POST['id_usuario'];

        $data = array(
            'oldPassword' => $oldPassword,
            'newPassword' => $newPassword,
            'id_usuario' => $id_usuario
        );

        require 'model/perfilDAO.php';
        $this->loadModel('perfilDAO');
        $perfilDAO = new PerfilDAO();
        $perfilDAO->updatePassword($data);
    }
}
