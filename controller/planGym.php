<?php
class PlanGym extends Controller
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
		$this->view->render('planGym/index');
	}

	function insert()
	{
		$nombrePlanGym = $_POST['nombrePlanGym'];
		$descripcionPlanGym = $_POST['descripcionPlanGym'];
        $costoPlanGym = $_POST['costoPlanGym'];

		$data = array(
			'nombrePlanGym' => $nombrePlanGym, 
			'descripcionPlanGym' => $descripcionPlanGym, 
			'costoPlanGym' => $costoPlanGym);

		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO->insert($data);
	}

	function update()
	{
		$nombrePlanGym = $_POST['nombrePlanGymActualizar'];
		$descripcionPlanGym = $_POST['descripcionPlanGymActualizar'];
        $costoPlanGym = $_POST['costoPlanGymActualizar'];
		$id_planGym = $_POST['id_planGymActualizar'];

		$data = array(
			'nombrePlanGym' => $nombrePlanGym, 
			'descripcionPlanGym' => $descripcionPlanGym, 
			'costoPlanGym' => $costoPlanGym, 
			'id_planGymActualizar'=>$id_planGym);

		require 'model/planGymDAO.php';
		$this->loadModel('planGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarplan_gym'];
		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO = $planGymDAO->read();
		echo $planGymDAO;
	}
}

?>

