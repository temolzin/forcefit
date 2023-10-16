<?php
class PagoSistema extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('pagoSistema/index');
	}

	function insert()
	{
        $vencimientoPago = $_POST['vencimientoPago'];
        $idUsuario = $_POST['idUsuario'];
        $idPlanSistema = $_POST['idPlanSistema'];
        $tipoPago = $_POST['tipoPago'];
		$data = array(
            'vencimientoPago' => $vencimientoPago, 
            'idUsuario' => $idUsuario, 
            'idPlanSistema' => $idPlanSistema,
            'tipoPago' => $tipoPago);

        require 'model/pagoSistemaDAO.php';
        $this->loadModel('PagoSistemaDAO');
        $pagoSistemaDAO = new PagoSistemaDAO();
        $pagoSistemaDAO->insert($data);
	}

	function update()
	{
        $id_pago = $_POST['id_PagoActualizar'];
        $vencimientoPago = $_POST['vencimientoPagoActualizar'];
        $idUsuario = $_POST['idUsuarioPagoActualizar'];
        $idPlanSistema = $_POST['idPlanSistemaActualizar'];
        $tipoPago = $_POST['tipoPagoActualizar'];
        $data = array(
			'id_PagoActualizar' => $id_pago, 
			'vencimientoPago' => $vencimientoPago, 
			'idUsuario'=>$idUsuario,
            'idPlanSistema' =>$idPlanSistema,
            'tipoPago' =>$tipoPago
        );

        require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarPago'];
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO->delete($idEliminar);
	}

    function read()
    {
        require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO->read();
		echo json_encode($pagoSistemaDAO);
    }

    function readTable()
	{
		require 'model/pagoSistemaDAO.php';
		$this->loadModel('PagoSistemaDAO');
		$pagoSistemaDAO = new PagoSistemaDAO();
		$pagoSistemaDAO = $pagoSistemaDAO->read();

		$obj = null;
		if (is_array($pagoSistemaDAO) || is_object($pagoSistemaDAO)) {
			foreach ($pagoSistemaDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function readUserManagersGym()
	{
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->readUserManagersGym();
        echo json_encode($usuarioDAO);
	}

	function readSystemPlan()
	{
		require 'model/planSistemaDAO.php';
		$this->loadModel('PlanSistemaDAO');
		$planSistemaDAO = new PlanSistemaDAO();
		$planSistemaDAO = $planSistemaDAO->readSystemPlan();
		echo json_encode($planSistemaDAO);
	}
}