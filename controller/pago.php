<?php
class Pago extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('pago/index');
	}

	function insert()
	{
		$cantidadPago = $_POST['cantidadPago'];
        $vencimientoPago = $_POST['vencimientoPago'];
        $idCliente = $_POST['idCliente'];
        $idPlanGym = $_POST['idPlanGym'];
        $tipoPago = $_POST['tipoPago'];
		$data = array(
            'cantidadPago' => $cantidadPago,
            'vencimientoPago' => $vencimientoPago, 
            'idCliente' => $idCliente, 
            'idPlanGym' => $idPlanGym,
            'tipoPago' => $tipoPago);

		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->insert($data);
	}

	function update()
	{
        $id_pago = $_POST['id_PagoActualizar'];
        $cantidadPago = $_POST['cantidadPagoActualizar'];
        $vencimientoPago = $_POST['vencimientoPagoActualizar'];
        $idCliente = $_POST['idClientePagoActualizar'];
        $idPlanGym = $_POST['idplanPagoGymActualizar'];
        $tipoPago = $_POST['tipoPagoActualizar'];
        $data = array(
			'id_PagoActualizar' => $id_pago, 
			'cantidadPago' => $cantidadPago, 
			'vencimientoPago' => $vencimientoPago, 
			'idCliente'=>$idCliente,
            'idPlanGym' =>$idPlanGym,
            'tipoPago' =>$tipoPago
        );

        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarPago'];
		require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO->delete($idEliminar);
	}

    function read()
    {
        require 'model/pagoDAO.php';
		$this->loadModel('PagoDAO');
		$pagoDAO = new PagoDAO();
		$pagoDAO = $pagoDAO->read();
    }

    function readClientes()
	{
		$q =$_GET["q"];
		$id_usuario= $_GET["id_user"];
		require 'model/clienteDAO.php';
		$this->loadModel('ClienteDAO');
		$clienteDAO = new ClienteDAO();
		$clienteDAO = $clienteDAO->readClientes($id_usuario,$q);
		$data = array("results" =>$clienteDAO);
		header("Content-Type: application/json"); echo json_encode($data);
		
	}

    function readPlanGym()
	{
		
		require 'model/planGymDAO.php';
		$this->loadModel('PlanGymDAO');
		$planGymDAO = new PlanGymDAO();
		$planGymDAO = $planGymDAO->readPlanGym();
		$data = array("results" =>$planGymDAO);
		header("Content-Type: application/json"); echo json_encode($data);
	}

 
}


