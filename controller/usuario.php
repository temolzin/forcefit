<?php
class Usuario extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function login()
    {
        $username_usuario = $_POST['username_usuario'];
        $password_usuario = $_POST['password_usuario'];
        $data = array('username_usuario' => $username_usuario, 'password_usuario' => $password_usuario);

        require 'model/usuarioDAO.php';
        $this->loadModel('usuarioDAO');
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO = $usuarioDAO->login($username_usuario, $password_usuario);
        echo $usuarioDAO;
    }
}
