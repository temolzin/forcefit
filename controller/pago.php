<?php
class Pago extends Controller
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
		if (ValidatePermissionModule::invoke("Pago")) {
			return $this->view->render('pago/index');
		}
		$this->view->render('errorPage/index');
	}

	function insert()
	{
		$cantidadPago = $_POST['cantidadPago'];
        $vencimientoPago = $_POST['vencimientoPago'];
        $idCliente = $_POST['idCliente'];
        $idPlanGym = $_POST['idPlanGym'];
        $tipoPago = $_POST['tipoPago'];
		$data = array(
            'cantidadPago' => $cantidadPago,
            'vencimientoPago' => $vencimientoPago, 
            'idCliente' => $idCliente, 
            'idPlanGym' => $idPlanGym,
            'tipoPago' => $tipoPago);

		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->insert($data);
	}

	function update()
	{
        $id_pago = $_POST['id_PagoActualizar'];
        $cantidadPago = $_POST['cantidadPagoActualizar'];
        $vencimientoPago = $_POST['vencimientoPagoActualizar'];
        $idCliente = $_POST['idClientePagoActualizar'];
        $idPlanGym = $_POST['idplanPagoGymActualizar'];
        $tipoPago = $_POST['tipoPagoActualizar'];
        $data = array(
			'id_PagoActualizar' => $id_pago, 
			'cantidadPago' => $cantidadPago, 
			'vencimientoPago' => $vencimientoPago, 
			'idCliente'=>$idCliente,
            'idPlanGym' =>$idPlanGym,
            'tipoPago' =>$tipoPago
        );

        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarPago'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->delete($idEliminar);
	}

    function read()
    {
        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->read();
    }

	function readPagoByIdgimnasio()
    {
		$id_gimnasio = $_POST['id_gimnasio'];
        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->readPagoByIdgimnasio($id_gimnasio);

		$obj = array();
		if (is_array($pagoDAO) || is_object($pagoDAO)) {
			foreach ($pagoDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
    }

	function getPagoInfoByCliente()
	{
		$id_cliente = $_POST['idCliente'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
        $pagoDAO = $pagoDAO->getPagoInfoByCliente($id_cliente);
        echo json_encode($pagoDAO);
	}

    function readClientes()
	{
		$id_usuario= $_GET["id_user"];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->readClientes($id_usuario);
        echo json_encode($clienteDAO);
		
	}

	function showCustomersWithPayments()
	{
		$id_usuario = $_GET['id_usuario'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$clientes = $pagoDAO->getCustomersWithPaymentsPerUser($id_usuario);
		echo json_encode($clientes);
	}

	function generatePaymentReport()
	{
		require_once('./view/pago/reporte/plantillaReportePagos.php');
		require_once __DIR__ . '/../vendor/autoload.php';
		$cliente = array();
		$id_cliente = $_POST['idCliente'];

		$gimnasio = array();
		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO->getGymInfoByCustomerId($gimnasio, $id_cliente);

		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->getPaymentsByCustomerId($cliente, $id_cliente);
		$css = file_get_contents('./public/css/reporte/stylesReportePagos.css');
		$mpdf = new \Mpdf\Mpdf(['margin_left' => 0, 'margin_right' => 20, 'margin_top' => 0, 'margin_bottom' => 20,]);
		$plantillaFront = getPlantillaFront($cliente, $gimnasio);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}

	function generateReceipt()
	{
        require_once( './view/pago/recibo/plantillaReciboPago.php');
		require_once __DIR__ . '/../vendor/autoload.php';

		$clientePagoRecibo = array();
		$id_pago = $_POST['id_pago'];

		$gimnasio = array();
		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO->getGymInfoByCustomerId($gimnasio, $id_pago);

		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->getCustomerPaymentDetails($clientePagoRecibo, $id_pago);
		$css = file_get_contents('./public/css/recibo/styleReciboPago.css');
		$mpdf = new \Mpdf\Mpdf([ 'margin_left' => 5, 'margin_right' => 20,'margin_top' => 5,'margin_bottom' => 20,]);
		$plantillaFront= getPlantillaFront($clientePagoRecibo, $gimnasio);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}
}
