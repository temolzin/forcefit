<?php
class Cliente extends Controller
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
		if (ValidatePermissionModule::invoke("Cliente")) {
			return $this->view->render('cliente/cliente');
		}
		$this->view->render('errorPage/index');
	}

	function insert()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_PlanGym = $_POST['id_PlanGym'];
		$nombre_cliente = $_POST['nombreCliente'];
		$apellido_paterno_cliente = $_POST['apellidoPaternoCliente'];
		$apellido_materno_cliente = $_POST['apellidoMaternoCliente'];
		$municipio_cliente = $_POST['municipioCliente'];
		$colonia_cliente = $_POST['coloniaCliente'];
		$calle_cliente = $_POST['calleCliente'];
		$codigo_postal_cliente = $_POST['codigoPostalCliente'];
		$numero_cliente = $_POST['numeroCliente'];
		$email_cliente = $_POST['emailCliente'];
		$nombreImagen = $_FILES["imagen"]["name"];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_PlanGym' => $id_PlanGym,
			'nombreCliente' => $nombre_cliente,
			'apellidoPaternoCliente' => $apellido_paterno_cliente,
			'apellidoMaternoCliente' => $apellido_materno_cliente,
			'municipioCliente' => $municipio_cliente,
			'coloniaCliente' => $colonia_cliente,
			'calleCliente' => $calle_cliente,
			'codigoPostalCliente' => $codigo_postal_cliente,
			'numeroCliente' => $numero_cliente,
			'emailCliente' => $email_cliente,
			'imagen' => $nombreImagen,
			'nombreImagen' => $nombreImagen
		);
		if ($_FILES["imagen"]["name"] != null) {
			require 'model/clienteDAO.php';
			$this->loadModel('ClienteDAO');
			$clienteDAO = new ClienteDAO();
			$id_cliente = $clienteDAO->insert($data);
			
			require_once __DIR__ . '/services/saveImage.php';
			$imagen = $_FILES["imagen"];
			$Carpeta = "public/cliente/" . $id_cliente . "/";
			SaveImage::invoke($Carpeta, $imagen);
			echo "ok";
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
		$email_cliente = $_POST['emailClienteActualizar'];
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
			'email_cliente' => $email_cliente,
		);
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
		$id_cliente = $_POST['id_cliente'];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->readFullDataById($cliente, $id_cliente);

		$css = file_get_contents('./public/css/credencial/styles.css');
		$mpdf = new \Mpdf\Mpdf([ 'margin_left' => 5, 'margin_right' => 20,'margin_top' => 5,'margin_bottom' => 20,]);
		$plantillaFront= getPlantillaFront($cliente);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->AddPage();
		$plantillaBack= getPlantillaBack($cliente);
		$mpdf->WriteHTML($plantillaBack,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}

	function getCustomersWithUpcomingMembershipExpiry()
	{
		$id_gimnasio= $_POST['id_gimnasio'];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->getCustomersWithUpcomingMembershipExpiry($id_gimnasio);

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

	function UpdateImage()
	{
		require_once __DIR__ . '/services/saveImage.php';
		$id_cliente = $_POST['idClientUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$Carpeta = "public/cliente/" . $id_cliente . "/";
		$data = array(
			'id_cliente' => $id_cliente,
			'imageInput' => SaveImage::invoke($Carpeta, $imagen)
		);

		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->updateImage($data);
	}
}
?>

