<?php
class AboutUs extends Controller
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
        $this->view->render('aboutUs/index');
    }
}
?>

