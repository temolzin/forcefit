<?php
class Dashboard extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('dashboard/index');
	}

	function aboutUs()
	{
		$this->view->render('dashboard/aboutUs');
	}

	function readPagoByIdgimnasio()
    {
		$id_gimnasio = $_GET['id_gimnasio'];
        require 'model/dashboardDAO.php';
		$this->loadModel('DashboardDAO');
		$dashboardDAO = new DashboardDAO();
		$dashboardDAO = $dashboardDAO->gananciasByIdgimnasio($id_gimnasio);
    }
}
?>
