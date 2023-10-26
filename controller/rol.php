<?php
class Rol extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		require_once __DIR__ . '/services/validateSession.php';
		require_once __DIR__ . '/services/validatePermissionModule.php';
		ValidateSession::invoke();
		if (ValidatePermissionModule::invoke("Usuarios")) {
			return $this->view->render('rol/rol');
		}
		$this->view->render('errorPage/index');
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

	function readTable()
	{
		require 'model/rolDAO.php';
		$this->loadModel('RolDAO');
		$rolDAO = new RolDAO();
		$rolDAO = $rolDAO->read();

		$obj = null;
		if (is_array($rolDAO ) || is_object($rolDAO )) {
			foreach ($rolDAO  as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);;
	}
}
