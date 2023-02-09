<?php
    class LoginDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }
        public function read()
        {
            require_once 'loginDTO.php';
            session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: dashboard/index.php');
            break;

            case 2:
            header('location: colab.php');
            break;

            default:
        }
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM usuario WHERE email = :email AND password = :password';
        $query = 'email' => $email, 'password' => $password;

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: dashboard/index.php');
                break;

                case 2:
                header('location: colab.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        
    }
            $objLogin = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $login = new LoginDTO();
                $login->email= $value['email'];
                $login->password = $value['password'];
                $objLogin['data'][] = $login;
            }
            echo json_encode($objLogin, JSON_UNESCAPED_UNICODE);
        }
    }
?>
