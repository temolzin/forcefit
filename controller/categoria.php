<?php
Class Categoria extends Controller
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
		if (ValidatePermissionModule::invoke("Tienda")) {
			return $this->view->render('categoria/index');
		}
		$this->view->render('errorPage/index');
	}

	public function insert()
	{
		if (!isset($_POST['id_gimnasio'], $_POST['nombre'], $_POST['descripcion'])) {
			echo 'Error: Uno o más índices no están definidos en $_POST.';
			return;
		}
		
		$id_gimnasio = $_POST['id_gimnasio'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		
		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'nombre' => $nombre, 
			'descripcion' => $descripcion
		);
		
		require 'model/categoriaDAO.php';
		$this->loadModel('CategoriaDAO');
		$categoriaDAO = new CategoriaDAO();
		
		try {
			$categoriaDAO->insert($data);
			echo 'ok';
		} catch (PDOException $e) {
			echo 'Error al registrar la categoría. Detalles: ' . $e->getMessage();
		}
	}
	function update()
	{
		$nombre = $_POST['nombreActualizar'];
		$descripcion = $_POST['descripcionActualizar'];
		$id_categoria = $_POST['idCategoriaActualizar'];

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion,  
			'idCategoriaActualizar'=>$id_categoria);

		require 'model/categoriaDAO.php';
		$this->loadModel('categoriaDAO');
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarCategoria'];
		require 'model/categoriaDAO.php';
		$this->loadModel('CategoriaDAO');
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO->delete($idEliminar);
	}

	function read()
	{
	}

	function readCategoriaByIdGimnasio()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/categoriaDAO.php';
		$this->loadModel('CategoriaDAO');
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO = $categoriaDAO->readCategoriaByIdGimnasio($id_gimnasio);
		$obj = array();
		if (is_array($categoriaDAO) || is_object($categoriaDAO)) {
			foreach ($categoriaDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function readCategoria()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/categoriaDAO.php';
		$this->loadModel('CategoriaDAO');
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO = $categoriaDAO->readCategoria($id_gimnasio);
		echo json_encode($categoriaDAO);
	}
}