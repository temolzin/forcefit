<?php
class Plan_sistema extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('plan_sistema/plan_sistema');
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

		require 'model/plan_sistemaDAO.php';
		$this->loadModel('Plan_sistemaDAO');
		$plan_sistemaDAO = new Plan_sistemaDAO();
		$plan_sistemaDAO->insert($data);
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

		require 'model/plan_sistemaDAO.php';
		$this->loadModel('plan_sistemaDAO');
		$plan_sistemaDAO = new Plan_sistemaDAO();
		$plan_sistemaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarplan_sistema'];
		require 'model/plan_sistemaDAO.php';
		$this->loadModel('Plan_sistemaDAO');
		$plan_sistemaDAO = new Plan_sistemaDAO();
		$plan_sistemaDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/plan_sistemaDAO.php';
		$this->loadModel('Plan_sistemaDAO');
		$plan_sistemaDAO = new Plan_sistemaDAO();
		$plan_sistemaDAO = $plan_sistemaDAO->read();
		echo $plan_sistemaDAO;
	}
}

?>
