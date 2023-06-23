<?php
class Cliente extends Controller
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
		$this->view->render('cliente/cliente');
	}

	function insert()
	{
		$nombre_cliente = $_POST['nombreCliente'];
		$apellido_paterno_cliente = $_POST['apellidoPaternoCliente'];
		$apellido_materno_cliente = $_POST['apellidoMaternoCliente'];
		$municipio_cliente = $_POST['municipioCliente'];
		$colonia_cliente = $_POST['coloniaCliente'];
		$calle_cliente = $_POST['calleCliente'];
		$codigo_postal_cliente = $_POST['codigoPostalCliente'];
		$numero_cliente = $_POST['numeroCliente'];
		$nombreImagen = "";
		if ($_FILES["imagen"]["name"] != null) {
			$imagen = $_FILES["imagen"];
			$nombreImagen = $imagen["name"];
			$tipoImagen = $imagen["type"];
			$ruta_provisional = $imagen["tmp_name"];
			$fullname = $nombre_cliente . "_" . $apellido_paterno_cliente;
			$carpeta = "public/cliente/" . $fullname . "/";
			if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
				echo 'errorimagen';
			} else {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}
				copy($ruta_provisional, $carpeta . $nombreImagen);

				$data = array(
					'nombreCliente' => $nombre_cliente,
					'apellidoPaternoCliente' => $apellido_paterno_cliente,
					'apellidoMaternoCliente' => $apellido_materno_cliente,
					'municipioCliente' => $municipio_cliente,
					'coloniaCliente' => $colonia_cliente,
					'calleCliente' => $calle_cliente,
					'codigoPostalCliente' => $codigo_postal_cliente,
					'numeroCliente' => $numero_cliente,
					'imagen' => $nombreImagen,
					'nombreImagen' => $nombreImagen
				);
				require 'model/clienteDAO.php';
				$this->loadModel('ClienteDAO');
				$clienteDAO = new ClienteDAO();
				$clienteDAO->insert($data);
			}
		}
	}

	function update()
	{
		$id_cliente = $_POST['id_clienteActualizar'];
		$nombre_cliente = $_POST['nombreClienteActualizar'];
		$apellido_paterno_cliente = $_POST['apellidoPaternoClienteActualizar'];
		$apellido_materno_cliente = $_POST['apellidoMaternoClienteActualizar'];
		$municipio_cliente = $_POST['municipioClienteActualizar'];
		$colonia_cliente = $_POST['coloniaClienteActualizar'];
		$calle_cliente = $_POST['calleClienteActualizar'];
		$codigo_postal_cliente = $_POST['codigoPostalClienteActualizar'];
		$numero_cliente = $_POST['numeroClienteActualizar'];
		$nombreImagen = "";

		$arrayActualizar = array(
			'id_cliente' => $id_cliente,
			'nombre_cliente' => $nombre_cliente,
			'apellido_paterno_cliente' => $apellido_paterno_cliente,
			'apellido_materno_cliente' => $apellido_materno_cliente,
			'municipio_cliente' => $municipio_cliente,
			'colonia_cliente' => $colonia_cliente,
			'calle_cliente' => $calle_cliente,
			'codigo_postal_cliente' => $codigo_postal_cliente,
			'numero_cliente' => $numero_cliente,
		);

		if (isset($_FILES["imagenClienteActualizar"])) {

			if ($_FILES["imagenClienteActualizar"]["name"] != null) {

				$imagen = $_FILES["imagenClienteActualizar"];
				$nombreImagen = $imagen["name"];
				$tipoImagen = $imagen["type"];
				$ruta_provisional = $imagen["tmp_name"];

				$fullname = $nombre_cliente . "_" . $apellido_paterno_cliente;
				$carpeta = "public/cliente/" . $fullname . "/";

				if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
					echo 'errorimagen';
				} else {
					if (!file_exists($carpeta)) {
						mkdir($carpeta, 0777, true);
					}
					copy($ruta_provisional, $carpeta . $nombreImagen);
					$arrayActualizar['imagen_cliente'] = $nombreImagen;
				}
			}
		}

		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO->update($arrayActualizar);
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

	function readTable()
	{
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->read();

		$obj = null;
		if (is_array($clienteDAO) || is_object($clienteDAO)) {
			foreach ($clienteDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}
}
?>

