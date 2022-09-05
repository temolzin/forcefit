<?php
    class Categoria extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->render('categoria/index');
        }

        function insert() {
            $nombreCategoria = $_POST['nombreCategoria'];
            $data = array('nombreCategoria' => $nombreCategoria);

            require 'model/categoriaDAO.php';
            $this->loadModel('CategoriaDAO');
            $categoriaDAO = new CategoriaDAO();
            $categoriaDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreCategoriaActualizar'];
            $matricula = $_POST['idCategoriaActualizar'];
            $data = array('nombreCategoria' => $nombre, 'idCategoria'=>$matricula);

            require 'model/categoriaDAO.php';
            $this->loadModel('categoriaDAO');
            $categoriaDAO = new categoriaDAO();
            $categoriaDAO->update($data);
        }

        function delete(){
            $matricula = $_POST['idEliminarCategoria'];

            require 'model/categoriaDAO.php';
            $this->loadModel('categoriaDAO');
            $categoriaDAO = new CategoriaDAO();
            $categoriaDAO->delete($matricula);
        }

        function read() {
            require 'model/categoriaDAO.php';
            $this->loadModel('categoriaDAO');
            $categoriaDAO = new CategoriaDAO();
            $categoriaDAO = $categoriaDAO->read();
            echo $categoriaDAO;
        }
    }
