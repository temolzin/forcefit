<?php
    class Materia extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('materia/index');
        }

        function insert() {
            $nombreMateria = $_POST['nombreMateria'];
            $grupoMateria = $_POST['grupoMateria'];
            $alumnosMateria = $_POST['alumnosMateria'];
            $data = array('nombreMateria' => $nombreMateria, 'grupoMateria' => $grupoMateria, 'alumnosMateria'=>$alumnosMateria, 'color_materia'=>$color_materia);

            require 'model/materiaDAO.php';
            $this->loadModel('materiaDAO');
            $materiaDAO = new materiaDAO();
            $materiaDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreMateriaActualizar'];
            $grupo = $_POST['grupoMateriaActualizar'];
            $alumnos = $_POST['alumnosMateriaActualizar'];
            $id = $_POST['idMateriaActualizar'];
            $data = array('nombreMateriaActualizar' => $nombre, 'grupoMateriaActualizar' => $grupo, 'alumnosMateriaActualizar'=>$alumnos, 'idMateriaActualizar'=>$id);

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
            require 'model/materiaDAO.php';
            $this->loadModel('materiaDAO');
            $materiaDAO = new materiaDAO();
            $materiaDAO = $materiaDAO->read();
            echo $materiaDAO;
        }
    }
