<?php
class Cliente extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('cliente/cliente');
	}

	function insert()
	{
		$nombre_cliente = $_POST['nombre_cliente'];
		$apellido_paterno_cliente = $_POST['apellido_paterno_cliente'];
        $apellido_materno_cliente = $_POST['apellido_materno_cliente'];
        $municipio_cliente = $_POST['municipio_cliente'];
        $colonia_cliente = $_POST['colonia_cliente'];
        $calle_cliente = $_POST['calle_cliente'];
        $codigo_postal_cliente = $_POST['codigo_postal_cliente'];
        $numero_cliente = $_POST['numero_cliente'];
        $imagen_cliente = $_POST['imagen_cliente'];

		$data = array(
        'nombre_cliente' => $nombre_cliente, 
        'apellido_paterno_cliente' => $apellido_paterno_cliente, 
        'apellido_materno_cliente' => $apellido_materno_cliente,
        'municipio_cliente' => $municipio_cliente,
        'colonia_cliente' => $colonia_cliente,
        'calle_cliente' => $calle_cliente,
        'codigo_postal_cliente' => $codigo_postal_cliente,
        'numero_cliente' => $numero_cliente,
        'imagen_cliente' => $imagen_cliente);

		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO->insert($data);
	}

	function update()
	{
        $nombre_cliente = $_POST['nombre_clienteActualizar'];
		$apellido_paterno_cliente = $_POST['apellido_paterno_clienteActualizar'];
        $apellido_materno_cliente = $_POST['apellido_materno_clienteActualizar'];
        $municipio_cliente = $_POST['municipio_clienteActualizar'];
        $colonia_cliente = $_POST['colonia_clienteActualizar'];
        $calle_cliente = $_POST['calle_clienteActualizar'];
        $codigo_postal_cliente = $_POST['codigo_postal_clienteActualizar'];
        $numero_cliente = $_POST['numero_clienteActualizar'];
        $imagen_cliente = $_POST['imagen_clienteActualizar'];
        $id_cliente = $_POST['id_clienteActualizar'];

		$data = array(
        'nombre_cliente' => $nombre_cliente, 
        'apellido_paterno_cliente' => $apellido_paterno_cliente, 
        'apellido_materno_cliente' => $apellido_materno_cliente,
        'municipio_cliente' => $municipio_cliente,
        'colonia_cliente' => $colonia_cliente,
        'calle_cliente' => $calle_cliente,
        'codigo_postal_cliente' => $codigo_postal_cliente,
        'numero_cliente' => $numero_cliente,
        'imagen_cliente' => $imagen_cliente,
        'id_clienteActualizar' => $id_cliente);

		require 'model/clienteDAO.php';
		$this->loadModel('clienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarcliente'];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->read();
		echo $clienteDAO;
	}
}

?>
