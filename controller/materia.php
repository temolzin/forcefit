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
            $data = array('nombreMateria' => $nombreMateria, 'grupoMateria' => $grupoMateria, 'alumnosMateria'=>$alumnosMateria);

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

            require 'model/materiaDAO.php';
            $this->loadModel('materiaDAO');
            $materiaDAO = new materiaDAO();
            $materiaDAO->update($data);
        }

        function delete(){
            $id = $_POST['idEliminarMateria'];

            require 'model/materiaDAO.php';
            $this->loadModel('materiaDAO');
            $materiaDAO = new materiaDAO();
            $materiaDAO->delete($id);
        }

        function read() {
            require 'model/materiaDAO.php';
            $this->loadModel('materiaDAO');
            $materiaDAO = new materiaDAO();
            $materiaDAO = $materiaDAO->read();
            echo $materiaDAO;
        }
    }
