<?php
class Rol extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('rol/rol');
	}

	function insert()
	{
		$nombreRol = $_POST['nombreRol'];
		$descripcion = $_POST['descripcion'];
		$data = array('nombreRol' => $nombreRol, 'descripcion' => $descripcion);

		require 'model/rolDAO.php';
		$this->loadModel('RolDAO');
		$rolDAO = new RolDAO();
		$rolDAO->insert($data);
	}

	function update()
	{
		$nombreRol = $_POST['nombreRolActualizar'];
		$descripcion = $_POST['descripcionRolActualizar'];
		$idRol = $_POST['idRolActualizar'];
		$data = array('nombreRol' => $nombreRol, 'descripcion' => $descripcion, 'idRolActualizar' => $idRol);

		require 'model/rolDAO.php';
		$this->loadModel('rolDAO');
		$rolDAO = new RolDAO();
		$rolDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarRol'];
		require 'model/rolDAO.php';
		$this->loadModel('RolDAO');
		$rolDAO = new RolDAO();
		$rolDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/rolDAO.php';
		$this->loadModel('RolDAO');
		$rolDAO = new RolDAO();
		$rolDAO = $rolDAO->read();
		echo $rolDAO;
	}
}

