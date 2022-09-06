<?php
    class Sucursal extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->render('sucursal/index');
        }

        function insert() {
            $nombreSucursal = $_POST['nombreSucursal'];
            $numeroSucursal = $_POST['numeroSucursal'];
            $descripcionSucursal = $_POST['descripcionSucursal'];
            $data = array('nombreSucursal' => $nombreSucursal, 'numeroSucursal' => $numeroSucursal, 'descripcionSucursal' => $descripcionSucursal);

            require 'model/sucursalDAO.php';
            $this->loadModel('SucursalDAO');
            $sucursalDAO = new SucursalDAO();
            $sucursalDAO->insert($data);
        }

        function update() {
            $nombre = $_POST['nombreSucursalActualizar'];
            $numero = $_POST['numeroSucursalActualizar'];
            $descripcion = $_POST['descripcionSucursalActualizar'];
            $id = $_POST['idSucursalActualizar'];
            $data = array('nombreSucursal' => $nombre, 'numeroSucursal' => $numero, 'descripcionSucursal' => $descripcion, 'idSucursal' => $id);

            require 'model/sucursalDAO.php';
            $this->loadModel('sucursalDAO');
            $sucursalDAO = new sucursalDAO();
            $sucursalDAO->update($data);
        }

        function delete(){
            $id = $_POST['idEliminarSucursal'];

            require 'model/sucursalDAO.php';
            $this->loadModel('sucursalDAO');
            $sucursalDAO = new SucursalDAO();
            $sucursalDAO->delete($id);
        }

        function read() {
            require 'model/sucursalDAO.php';
            $this->loadModel('sucursalDAO');
            $sucursalDAO = new SucursalDAO();
            $sucursalDAO = $sucursalDAO->read();
            echo $sucursalDAO;
        }
    }
