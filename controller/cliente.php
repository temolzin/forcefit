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
		$id_usuario= $_POST['id_usuario'];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$id_usuario= $_POST['id_usuario'];
		$id_usuario= $_POST['id_usuario'];
		$clienteDAO = $clienteDAO->readDataByIdUsuario($id_usuario);

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
	function generarGafete()
	{
        require_once( './view/cliente/credencial/plantilla.php');
		require_once __DIR__ . '/../vendor/autoload.php';

		$cliente = array();
		$id_cliente = $_GET['id_cliente'];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->getDatos($cliente, $id_cliente);

		$css = file_get_contents('./public/css/credencial/styles.css');
		$mpdf = new \Mpdf\Mpdf([ 'margin_left' => 5, 'margin_right' => 20,'margin_top' => 5,'margin_bottom' => 20,]);
		$plantillaFront= getPlantillaFront($cliente);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->AddPage();
		$plantillaBack= getPlantillaBack($cliente);
		$mpdf->WriteHTML($plantillaBack,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
		//$mpdf->Output('credencial.pdf', 'D');
	}
}
?>

