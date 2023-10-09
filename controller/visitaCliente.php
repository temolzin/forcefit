<?php
class VisitaCliente extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('visitaCliente/index');
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

	function insertExit()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_cliente = $_POST['id_cliente'];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_cliente' => $id_cliente
		);
		require 'model/visitaClienteDAO.php';
		$this->loadModel('VisitaClienteDAO');
		$visitaClienteDAO = new VisitaClienteDAO();
		$visitaClienteDAO->insertExit($data);
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
