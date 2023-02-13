<?php
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        session_start();
		if (isset($_SESSION['login'])) {
			header('Location: ' . '/dashboard');
			die();
		}
    }

    function index()
    {
        $this->view->render('main/index');
    }

    public function loginUser(){
        require_once 'LoginDAO.php';
        //dep($_POST);
        if($_POST){
            if(empty($_POST['email']) || empty($_POST['password'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
            }else{
                $strUsuario  =  strtolower(strClean($_POST['email']));
                $strPassword = hash("SHA256",$_POST['password']);
                $requestUser = $this->model->loginUser($strEmail, $strPassword);
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.' ); 
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
