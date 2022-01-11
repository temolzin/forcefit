<?php
    class Alumno extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->render('alumno/index');
        }

        function insert() {
            $nombreAlumno = $_POST['nombreAlumno'];
            $apellidosAlumno = $_POST['apellidosAlumno'];
            $data = array('nombreAlumno' => $nombreAlumno, 'apellidosAlumno' => $apellidosAlumno);

            require 'model/alumnoDAO.php';
            $this->loadModel('AlumnoDAO');
            $alumnoDAO = new AlumnoDAO();
            $alumnoDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreAlumnoActualizar'];
            $apellido = $_POST['apellidosAlumnoActualizar'];
            $matricula = $_POST['idAlumnoActualizar'];
            $data = array('nombreAlumno' => $nombre, 'apellidosAlumno' => $apellido, 'idAlumno'=>$matricula);

            require 'model/alumnoDAO.php';
            $this->loadModel('alumnoDAO');
            $alumnoDAO = new alumnoDAO();
            $alumnoDAO->update($data);
        }

        function delete(){
            $matricula = $_POST['idEliminarAlumno'];

            require 'model/alumnoDAO.php';
            $this->loadModel('alumnoDAO');
            $alumnoDAO = new AlumnoDAO();
            $alumnoDAO->delete($matricula);
        }

        function read() {
            require 'model/alumnoDAO.php';
            $this->loadModel('alumnoDAO');
            $alumnoDAO = new AlumnoDAO();
            $alumnoDAO = $alumnoDAO->read();
            echo $alumnoDAO;
        }
    }
