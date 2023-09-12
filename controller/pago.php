<?php
class Pago extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('pago/index');
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
		$id_gimnasio = $_GET['id_gimnasio'];
        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->readPagoByIdgimnasio($id_gimnasio);
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

	function mostrarClientesConPagos() {
		$id_usuario = $_GET['id_usuario'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$clientes = $pagoDAO->getClientesConPagosPorUsuario($id_usuario);
		echo json_encode($clientes);
	}

	function generateInvoice()
	{
		require_once('./view/pago/factura/plantilla.php');
		require_once __DIR__ . '/../vendor/autoload.php';
		$cliente = array();
		$id_cliente = $_POST['idCliente'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->getPaymentsByCustomerId($cliente, $id_cliente);
		$css = file_get_contents('./public/css/factura/styles.css');
		$mpdf = new \Mpdf\Mpdf(['margin_left' => 5, 'margin_right' => 20, 'margin_top' => 5, 'margin_bottom' => 20,]);
		$plantillaFront = getPlantillaFront($cliente);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}
}
