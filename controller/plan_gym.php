<?php
class Plan_gym extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('plan_gym/plan_gym');
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

		require 'model/plan_gymDAO.php';
		$this->loadModel('Plan_gymDAO');
		$plan_gymDAO = new Plan_gymDAO();
		$plan_gymDAO->insert($data);
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

		require 'model/plan_gymDAO.php';
		$this->loadModel('plan_gymDAO');
		$plan_gymDAO = new Plan_gymDAO();
		$plan_gymDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarplan_gym'];
		require 'model/plan_gymDAO.php';
		$this->loadModel('Plan_gymDAO');
		$plan_gymDAO = new Plan_gymDAO();
		$plan_gymDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/plan_gymDAO.php';
		$this->loadModel('Plan_gymDAO');
		$plan_gymDAO = new Plan_gymDAO();
		$plan_gymDAO = $plan_gymDAO->read();
		echo $plan_gymDAO;
	}
}

?>
