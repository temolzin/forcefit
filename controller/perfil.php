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
        $idUsuario = $_POST['idUsuario'];

        $data = array(
            'id_usuario' => $idUsuario,
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
        
        if (!empty($_FILES["imageUserUpdate"]["name"])) {
            require_once __DIR__ . '/services/saveImage.php';
            $imagen = $_FILES["imageUserUpdate"];
            $carpeta = "public/usuario/" . $idUsuario . "/";
            $data['imageUserUpdate'] = SaveImage::invoke($carpeta, $imagen);
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
