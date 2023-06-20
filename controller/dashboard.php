<?php
class Dashboard extends Controller
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
		$this->view->render('dashboard/index');
	}

	function aboutUs()
	{
		$this->view->render('dashboard/aboutUs');
	}
}
?>