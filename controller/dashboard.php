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
}
?>
