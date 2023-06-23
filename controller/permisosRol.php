<?php
class PermisosRol extends Controller
{
	function __construct()
	{
		parent::__construct();
		session_start();
		if (!isset($_SESSION['login'])) {
			header('location: ' . constant('URL'));
		}
	}

	function index()
	{
		$this->view->render('rol/rol');
	}

	function readModulo()
	{
		require 'model/PermisoDAO.php';
		$this->loadModel('PermisoDAO');
		$moduloDAO = new PermisoDAO();
		$moduloDAO = $moduloDAO->readModulo();
	}

	function readPermiso()
	{
		$id_rol = $_POST['rolId'];
		require 'model/PermisoDAO.php';
		$this->loadModel('PermisoDAO');
		$moduloDAO = new PermisoDAO();
		$moduloDAO = $moduloDAO->readPermiso($id_rol);
	}

	function setPermisos()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$id_rol = $data['idrol'];
		require 'model/PermisoDAO.php';
		$this->loadModel('PermisoDAO');
		$permisoDAO = new PermisoDAO();
		$permisoDAO = $permisoDAO->delete($id_rol);

		foreach ($data["modules"] as $module) {
			$permisosDAO = new PermisoDAO();
			$idmodulo = $module["idModule"];
			$c = empty($module['c']) ? 0 : 1;
			$r = empty($module['r']) ? 0 : 1;
			$u = empty($module['u']) ? 0 : 1;
			$d = empty($module['d']) ? 0 : 1;
			$permisosDAO = $permisosDAO->insertPermisos($id_rol, $idmodulo, $c, $r, $u, $d);
		}
	}
}
?>
