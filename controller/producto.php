<?php
class Producto extends Controller
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
			return $this->view->render('producto/producto');
		}
		$this->view->render('errorPage/index');
	}

	function insert()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_categoria = $_POST['id_categoria'];
		$nombreProducto = $_POST['nombreProducto'];
		$descripcionProducto= $_POST['descripcionProducto'];
        $precioProducto= $_POST['precioProducto'];
		$stockProducto = $_POST['stockProducto'];
		$imagen = $_FILES["imagen"]["name"];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_categoria' => $id_categoria,
			'nombreProducto' => $nombreProducto,
			'descripcionProducto' => $descripcionProducto,
			'precioProducto' => $precioProducto,
			'stockProducto' => $stockProducto,
			'imagen' => $imagen,
		);
		if ($_FILES["imagen"]["name"] != null) {
			require 'model/productoDAO.php';
			$this->loadModel('ProductoDAO');
			$productoDAO = new ProductoDAO();
			$idProducto = $productoDAO->insert($data);
			
			require_once __DIR__ . '/services/saveImage.php';
			$imagen = $_FILES["imagen"];
			$carpeta = "public/producto/" . $idProducto . "/";
			SaveImage::invoke($carpeta, $imagen);
			echo "ok";
		}
	}

	function update()
	{
		$id_categoria = $_POST['id_categoriaActualizar'];
		$id_producto = $_POST['id_productoActualizar'];
		$nombreProducto = $_POST['nombreProductoActualizar'];
		$descripcionProducto = $_POST['descripcionProductoActualizar'];
		$precioProducto = $_POST['precioProductoActualizar'];
		$stockProducto = $_POST['stockProductoActualizar'];

		$arrayActualizar = array(
			'id_categoria' => $id_categoria,
			'id_producto' => $id_producto,
			'nombre' => $nombreProducto,
			'descripcion' => $descripcionProducto,
			'precio' => $precioProducto,
			'stock' => $stockProducto
		);
		require 'model/productoDAO.php';
		$this->loadModel('ProductoDAO');
		$productoDAO = new ProductoDAO();
		$productoDAO->update($arrayActualizar);

	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarProducto'];
		require 'model/productoDAO.php';
		$this->loadModel('ProductoDAO');
		$productoDAO = new ProductoDAO();
		$productoDAO->delete($idEliminar);

	}

	function read()
	{
	}

	function readTable()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		require 'model/productoDAO.php';
		$this->loadModel('ProductoDAO');
		$productoDAO = new ProductoDAO();
		$productoDAO = $productoDAO->readDataByIdGimnasio($id_gimnasio);
		$obj = array();
		if (is_array($productoDAO) || is_object($productoDAO)) {
			foreach ($productoDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function updateImage()
	{
		require_once __DIR__ . '/services/saveImage.php';
		$id_producto = $_POST['idProductoUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$carpeta = "public/producto/" . $id_producto . "/";
		$data = array(
			'id_producto' => $id_producto,
			'imageInput' => SaveImage::invoke($carpeta, $imagen)
		);

		require 'model/productoDAO.php';
		$this->loadModel('ProductoDAO');
		$productoDAO = new ProductoDAO();
		$productoDAO = $productoDAO->updateImage($data);

	}
	
}
?>
