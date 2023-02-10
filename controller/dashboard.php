<?php
	class Dashboard extends Controller
	{		
		function __construct() 
		{
			parent::__construct();
		}

		function index(){
			$this->view->render('dashboard/index');
		}

		function aboutUs(){
			$this->view->render('dashboard/aboutUs');
		}

		function formRegisterAdmins(){
			$this ->view->render('dashboard/formRegisterAdmins');
		}
	}
?>