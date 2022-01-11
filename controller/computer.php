<?php
    class Computer extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('computer/index');
        }

        function insert() {
            $name_computer = $_POST['name_computer'];
            $price_computer = $_POST['price_computer'];
            $model_computer = $_POST['model_computer'];
            $color_computer = $_POST['color_computer'];
            $data = array('name_computer' => $name_computer, 'price_computer' => $price_computer, 'model_computer'=>$model_computer, 'color_computer'=>$color_computer);

            require 'model/computerDAO.php';
            $this->loadModel('ComputerDAO');
            $computerDAO = new ComputerDAO();
            $computerDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreActualizar'];
            $apellido = $_POST['apellidoActualizar'];
            $matricula = $_POST['matriculaActualizar'];
            $data = array('nombre' => $nombre, 'apellido' => $apellido, 'matricula'=>$matricula);

            require 'model/ComputadoraDAO.php';
            $this->loadModel('ComputadoraDAO');
            $ComputadoraDAO = new ComputadoraDAO();
            $ComputadoraDAO->update($data);
        }

        function delete(){
            $matricula = $_POST['idEliminarComputadora'];

            require 'model/ComputadoraDAO.php';
            $this->loadModel('ComputadoraDAO');
            $ComputadoraDAO = new ComputadoraDAO();
            $ComputadoraDAO->delete($matricula);
        }

        function read() {
            require 'model/computerDAO.php';
            $this->loadModel('computerDAO');
            $computerDAO = new ComputerDAO();
            $computerDAO = $computerDAO->read();
            echo $computerDAO;
        }
    }
