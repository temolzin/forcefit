<?php
class Dashboard extends Controller
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
		if (ValidatePermissionModule::invoke("Dashboard")) {
			return $this->view->render('dashboard/index');
		}
		$this->view->render('errorPage/index');
	}

	function aboutUs()
	{
		$this->view->render('dashboard/aboutUs');
	}

	function getMonthlyAndWeeklyRevenueData()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/dashboardDAO.php';
		$this->loadModel('DashboardDAO');
		$dashboardDAO = new DashboardDAO();
		$dashboardDAO = $dashboardDAO->getMonthlyAndWeeklyRevenueData($id_gimnasio);
	}

	function sendEmailClientsAboutMembershipExpiry()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/dashboardDAO.php';
		$this->loadModel('DashboardDAO');
		$dashboardDAO = new DashboardDAO();
		if($id_gimnasio === ""){
			$dashboardDAO = $dashboardDAO->getUsersAboutMembershipExpiry();
			return;
		}
		$dashboardDAO = $dashboardDAO->getClientsAboutMembershipExpiry($id_gimnasio);
	}

	function generateEarningsReport()
	{
        require_once( './view/dashboard/plantillaReporteIngresos.php');
		require_once __DIR__ . '/../vendor/autoload.php';

		$reporteGanancias = array();
		$id_gimnasio = $_POST['id_gimnasio'];
		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gymDAO = new GimnasioDAO();
		$gymDAO = $gymDAO->getDataGymReport($reporteGanancias, $id_gimnasio);
		$css = file_get_contents('./public/css/recibo/styleReciboPago.css');
		$mpdf = new \Mpdf\Mpdf([ 'margin_left' => 5, 'margin_right' => 20,'margin_top' => 5,'margin_bottom' => 20,]);
		$plantillaFront= getPlantillaFront($reporteGanancias);
		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($plantillaFront,\Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output();
	}
}
?>
