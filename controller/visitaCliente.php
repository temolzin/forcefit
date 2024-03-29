<?php
class VisitaCliente extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		require_once __DIR__ . '/services/validateSession.php';
		require_once __DIR__ . '/services/validatePermissionModule.php';
		ValidateSession::invoke();
		if (ValidatePermissionModule::invoke("VisitaCliente")) {
			return $this->view->render('visitaCliente/index');
		}
		$this->view->render('errorPage/index');
	}

	function insertEntry()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_cliente = $_POST['cliente_id'];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_cliente' => $id_cliente
		);
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO->insert($data);
	}

	function updateExit()
	{
		$idCliente = $_POST['id_cliente'];
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO->updateExit($idCliente);
	}

	function update()
	{
		$id_cliente = $_POST['cliente_id_Update'];
		$hora_entrada = $_POST['hourEntryVisitUpdate'];
		$hora_salida = $_POST['hourExitVisitUpdate'];
		$fecha = $_POST['dateVisitUpdate'];
		$id_visita = $_POST['id_visitUpdate'];

		$data = array(
			'id_cliente' => $id_cliente,
			'hora_entrada' => $hora_entrada,
			'hora_salida' => $hora_salida,
			'fecha' => $fecha,
			'id_visita' => $id_visita
		);

		require 'model/visitaClienteDAO.php';
		$this->loadModel('visitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idDeleteVisit'];
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO->delete($idEliminar);
	}

	function readTableVisit()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO = $visitaClienteDAO->readVisits($id_gimnasio);
		$obj = array();
		if (is_array($visitaClienteDAO) || is_object($visitaClienteDAO)) {
			foreach ($visitaClienteDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function getClientsByGym()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$clientes = $visitaClienteDAO->getClientsByGym($id_gimnasio);
		echo json_encode($clientes);
	}

	function getClientsInGym()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$clientes = $visitaClienteDAO->getClientsInGym($id_gimnasio);
		echo json_encode($clientes);
	}
}
