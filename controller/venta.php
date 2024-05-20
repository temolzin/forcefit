<?php
class Venta extends Controller
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
			return $this->view->render('venta/venta');
		}
		$this->view->render('errorPage/index');
	}

	public function insert()
    {
    
		$id_cliente = $_POST['id_cliente'];
		$id_producto = $_POST['id_producto'];
		$fecha = $_POST['fecha'];
		$total = $_POST['total'];
		$cantidad = $_POST['cantidad'];
		$precio_Unitario = $_POST['precio_Unitario'];
		$subtotal = $_POST['subtotal'];
		
		$data = array(
			'id_cliente' => $id_cliente,
			'id_producto' => $id_producto,
			'fecha' => $fecha,
			'total' => $total,
			'cantidad' => $cantidad,
			'precio_Unitario' => $precio_Unitario,
			'subtotal' => $subtotal
		);
		require 'model/ventaDAO.php';
		$this->loadModel('VentaDAO');
		$ventaDAO = new VentaDAO();
		if ($ventaDAO->insert($data)) {
			echo 'ok'; 
		}
    }
	

	function delete()
	{
		$idEliminar = $_POST['idEliminarVenta'];
		require 'model/ventaDAO.php';
		$this->loadModel('VentaDAO');
		$ventaDAO = new VentaDAO();
		$ventaDAO->delete($idEliminar);
	}

	function read()
	{

	}

	function readTable()
	{
		
	}

	function readCustomer()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/ventaDAO.php';
		$this->loadModel('VentaDAO');
		$ventaDAO = new VentaDAO();
		$ventaDAO = $ventaDAO->readCustomer($id_gimnasio);
		echo json_encode($ventaDAO);
	}

	function readProduct()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/ventaDAO.php';
		$this->loadModel('VentaDAO');
		$ventaDAO = new VentaDAO();
		$ventaDAO = $ventaDAO->readProduct($id_gimnasio);
		echo json_encode($ventaDAO);
	}

	function readSales()
	{
		require 'model/ventaDAO.php';
		$this->loadModel('VentaDAO');
		$ventaDAO = new VentaDAO();
		$ventaDAO = $ventaDAO->readSales();
		$obj = array();
		if (is_array($ventaDAO) || is_object($ventaDAO)) {
			foreach ($ventaDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

}
?>
