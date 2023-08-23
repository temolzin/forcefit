<?php
class PlanGym extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('planGym/index');
	}

	function insert()
	{
		$id_gimnasio= $_POST['id_gimnasio'];
		$nombrePlanGym = $_POST['nombrePlanGym'];
		$descripcionPlanGym = $_POST['descripcionPlanGym'];
        $costoPlanGym = $_POST['costoPlanGym'];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
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
	}

	function readPlanGymByIdGimnasio()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO = $planGymDAO->readPlanGymByIdGimnasio($id_gimnasio);
	}

	function readPlanGym()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO = $planGymDAO->readPlanGym($id_gimnasio);
		echo json_encode($planGymDAO);
	}
}
?>

