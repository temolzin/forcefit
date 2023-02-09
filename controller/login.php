<?php
    class Login extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->render('main/index');
        }

        function read() {
            require 'model/loginDAO.php';
            $this->loadModel('loginDAO');
            $loginDAO = new LoginDAO();
            $loginDAO = $loginDAO->read();
            echo $loginDAO;
        }
    }
    
