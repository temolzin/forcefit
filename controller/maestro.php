<?php
    class Maestro extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('maestro/index');
        }

        function insert() {
            $nombreMaestro = $_POST['nombreMaestro'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $edad = $_POST['edad'];
            $data = array('nombreMaestro' => $nombreMaestro, 'apellidoPaterno' => $apellidoPaterno, 'apellidoMaterno'=>$apellidoMaterno, 'edad'=>$edad);

            require 'model/maestroDAO.php';
            $this->loadModel('MaestroDAO');
            $maestroDAO = new MaestroDAO();
            $maestroDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreMaestroActualizar'];
            $apellidoPaterno = $_POST['apellidoPaternoActualizar'];
            $apellidoMaterno = $_POST['apellidoMaternoActualizar'];
            $matricula = $_POST['idMaestroActualizar'];
            $edad = $_POST['edadActualizar'];
            $data = array('nombre' => $nombre, 'apellidoPaterno' => $apellidoPaterno, 'apellidoMaterno' => $apellidoMaterno,'idMaestro'=>$matricula, 'edad'=>$edad);

            require 'model/maestroDAO.php';
            $this->loadModel('maestroDAO');
            $maestroDAO = new MaestroDAO();
            $maestroDAO->update($data);
        }

        function delete(){
            $matricula = $_POST['idEliminarMaestro'];

            require 'model/maestroDAO.php';
            $this->loadModel('MaestroDAO');
            $maestroDAO = new MaestroDAO();
            $maestroDAO->delete($matricula);
        }

        function read() {
            require 'model/maestroDAO.php';
            $this->loadModel('MaestroDAO');
            $maestroDAO = new MaestroDAO();
            $maestroDAO = $maestroDAO->read();
            echo $maestroDAO;
        }
    }
