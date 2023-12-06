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
		$idGimnasio = $_POST['id_gimnasio'];
		$idPlanGym = $_POST['id_PlanGym'];
		$nombreCliente = $_POST['nombreCliente'];
		$apellidoPaternoCliente = $_POST['apellidoPaternoCliente'];
		$apellidoMaternoCliente = $_POST['apellidoMaternoCliente'];
		$municipioCliente = $_POST['municipioCliente'];
		$coloniaCliente = $_POST['coloniaCliente'];
		$calleCliente = $_POST['calleCliente'];
		$codigoPostalCliente = $_POST['codigoPostalCliente'];
		$numeroCliente = $_POST['numeroCliente'];
		$emailCliente = $_POST['emailCliente'];
		$nombreImagen = $_FILES["imagen"]["name"];

		$data = array(
			'id_gimnasio' => $idGimnasio,
			'id_PlanGym' => $idPlanGym,
			'nombreCliente' => $nombreCliente,
			'apellidoPaternoCliente' => $apellidoPaternoCliente,
			'apellidoMaternoCliente' => $apellidoMaternoCliente,
			'municipioCliente' => $municipioCliente,
			'coloniaCliente' => $coloniaCliente,
			'calleCliente' => $calleCliente,
			'codigoPostalCliente' => $codigoPostalCliente,
			'numeroCliente' => $numeroCliente,
			'emailCliente' => $emailCliente,
			'imagen' => $nombreImagen,
			'nombreImagen' => $nombreImagen
		);
		if ($_FILES["imagen"]["name"] != null) {
			require 'model/clienteDAO.php';
			$this->loadModel('ClienteDAO');
			$clienteDAO = new ClienteDAO();
			$idCliente = $clienteDAO->insert($data);
			
			require_once __DIR__ . '/services/saveImage.php';
			$imagen = $_FILES["imagen"];
			$carpeta = "public/cliente/" . $idCliente . "/";
			SaveImage::invoke($carpeta, $imagen);
			echo "ok";
		}
	}

	function update()
	{
		$id_planGym = $_POST['id_PlanGymActualizar'];
		$idCliente = $_POST['id_clienteActualizar'];
		$nombreCliente = $_POST['nombreClienteActualizar'];
		$apellidoPaternoCliente = $_POST['apellidoPaternoClienteActualizar'];
		$apellidoMaternoCliente = $_POST['apellidoMaternoClienteActualizar'];
		$municipioCliente = $_POST['municipioClienteActualizar'];
		$coloniaCliente = $_POST['coloniaClienteActualizar'];
		$calleCliente = $_POST['calleClienteActualizar'];
		$codigoPostalCliente = $_POST['codigoPostalClienteActualizar'];
		$numeroCliente = $_POST['numeroClienteActualizar'];
		$emailCliente = $_POST['emailClienteActualizar'];

		$arrayActualizar = array(
			'id_planGym' => $id_planGym,
			'id_cliente' => $idCliente,
			'nombre_cliente' => $nombreCliente,
			'apellido_paterno_cliente' => $apellidoPaternoCliente,
			'apellido_materno_cliente' => $apellidoMaternoCliente,
			'municipio_cliente' => $municipioCliente,
			'colonia_cliente' => $coloniaCliente,
			'calle_cliente' => $calleCliente,
			'codigo_postal_cliente' => $codigoPostalCliente,
			'numero_cliente' => $numeroCliente,
			'email_cliente' => $emailCliente,
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
		$obj = array();
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
		$rutaPlantilla = "public/gimnasio/fondo/" . $cliente['id_gimnasio'] . "/" . $cliente['fondoCredencial'];
		if($cliente['fondoCredencial'] !== null && file_exists($rutaPlantilla)){
			$css = str_replace("url('public/img/fondoCredencial.png')", "url('$rutaPlantilla')", $css);
		}
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

		$obj = array();
		if (is_array($clienteDAO) || is_object($clienteDAO)) {
			foreach ($clienteDAO as $key => $value) {
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
		$idCliente = $_POST['idClientUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$carpeta = "public/cliente/" . $idCliente . "/";
		$data = array(
			'id_cliente' => $idCliente,
			'imageInput' => SaveImage::invoke($carpeta, $imagen)
		);

		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->updateImage($data);
	}
}
?>

