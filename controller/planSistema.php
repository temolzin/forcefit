<?php
class PlanSistema extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('planSistema/index');
	}

	function insert()
	{
		$nombre_plan_sistema = $_POST['nombre_plan_sistema'];
		$descripcion_plan_sistema = $_POST['descripcion_plan_sistema'];
        $costo = $_POST['costo'];

		$data = array(
			'nombre_plan_sistema' => $nombre_plan_sistema, 
			'descripcion_plan_sistema' => $descripcion_plan_sistema, 
			'costo' => $costo);

		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO->insert($data);
	}

	function update()
	{
		$nombre_plan_sistema = $_POST['nombre_plan_sistemaActualizar'];
		$descripcion_plan_sistema = $_POST['descripcion_plan_sistemaActualizar'];
        $costo = $_POST['costoActualizar'];
		$id_plan_sistema = $_POST['id_plan_sistemaActualizar'];

		$data = array(
			'nombre_plan_sistema' => $nombre_plan_sistema, 
			'descripcion_plan_sistema' => $descripcion_plan_sistema, 
			'costo' => $costo, 
			'id_plan_sistemaActualizar'=>$id_plan_sistema);

		require 'model/planSistemaDAO.php';
		$this->loadModel('planSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarplan_sistema'];
		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO = $planSistemaDAO->read();
		echo $planSistemaDAO;
	}

	function readTable()
	{
		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO = $planSistemaDAO->read();

		$obj = null;
		if (is_array($planSistemaDAO) || is_object($planSistemaDAO)) {
			foreach ($planSistemaDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}
}
?>

