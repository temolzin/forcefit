<?php
class PagoSistema extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('pagoSistema/index');
	}

	function insert()
	{
        $vencimientoPago = $_POST['vencimientoPago'];
        $idUsuario = $_POST['idUsuario'];
        $cantidadPago = $_POST['cantidad'];
        $idPlanSistema = $_POST['idPlanSistema'];
        $tipoPago = $_POST['tipoPago'];
		$data = array(
            'vencimientoPago' => $vencimientoPago, 
            'idUsuario' => $idUsuario, 
            'cantidadPago' => $cantidadPago, 
            'idPlanSistema' => $idPlanSistema,
            'tipoPago' => $tipoPago);

        require 'model/pagoSistemaDAO.php';
        $this->loadModel('PagoSistemaDAO');
        $pagoSistemaDAO = new PagoSistemaDAO();
        $pagoSistemaDAO->insert($data);
	}

	function update()
	{
        $id_pago = $_POST['id_PagoActualizar'];
        $vencimientoPago = $_POST['vencimientoPagoActualizar'];
        $idUsuario = $_POST['idUsuarioPagoActualizar'];
        $cantidadPago = $_POST['cantidadPagoActualizar'];
        $idPlanSistema = $_POST['idPlanSistemaActualizar'];
        $tipoPago = $_POST['tipoPagoActualizar'];
        $data = array(
			'id_PagoActualizar' => $id_pago, 
			'vencimientoPago' => $vencimientoPago, 
			'idUsuario'=>$idUsuario,
			'cantidadPago'=>$cantidadPago,
            'idPlanSistema' =>$idPlanSistema,
            'tipoPago' =>$tipoPago
        );

        require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarPago'];
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO->delete($idEliminar);
	}

    function read()
    {
        require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO->read();
		echo json_encode($pagoSistemaDAO);
    }

    function readTable()
	{
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO->read();

		$obj = array();
		if (is_array($pagoSistemaDAO) || is_object($pagoSistemaDAO)) {
			foreach ($pagoSistemaDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function readUserManagersGym()
	{
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->readUserManagersGym();
        echo json_encode($usuarioDAO);
	}

	function readSystemPlan()
	{
		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO = $planSistemaDAO->readSystemPlan();
		echo json_encode($planSistemaDAO);
	}

    function readUserPlanDetails()
    {
		$idUsuario= $_POST["idUsuario"];
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('pagoSistemaDAO');
		$pagoSistemaDAO = new pagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO->readUserPlanDetails($idUsuario);
		echo json_encode($pagoSistemaDAO);
    }
	function generateReceipt()
	{
	    require_once( './view/pagoSistema/recibo/plantillaReciboPago.php');
		require_once __DIR__ . '/../vendor/autoload.php';
		$usuarioPagoRecibo = array();
		$id_pago = $_POST['id_pago'];
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('pagoSistemaDAO.php');
		$pagoSistemaDAO = new pagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO-> getUserPaymentDetails($usuarioPagoRecibo, $id_pago);
		$css = file_get_contents('./public/css/recibo/styleReciboPago.css');
		$mpdf = new \Mpdf\Mpdf([ 'margin_left' => 5, 'margin_right' => 20,'margin_top' => 5,'margin_bottom' => 20,]);
		$plantillaFront= getPlantillaFront($usuarioPagoRecibo);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}
}
