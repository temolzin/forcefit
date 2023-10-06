<?php
class Visita extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('visita/index');
	}

	function insertEntry()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_cliente = $_POST['cliente_id'];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_cliente' => $id_cliente
		);
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$visitaDAO->insert($data);
	}

	function insertExit()
	{
		$id_gimnasio = $_POST['id_gimnasio'];
		$id_cliente = $_POST['id_cliente'];

		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'id_cliente' => $id_cliente
		);
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$visitaDAO->insertExit($data);
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

		require 'model/visitaDAO.php';
		$this->loadModel('visitaDAO');
		$visitaDAO = new VisitaDAO();
		$visitaDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idDeleteVisit'];
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$visitaDAO->delete($idEliminar);
	}

	function readTableVisit()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$visitaDAO = $visitaDAO->readVisits($id_gimnasio);
	}

	function getClientsByGym()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$clientes = $visitaDAO->getClientsByGym($id_gimnasio);
		echo json_encode($clientes);
	}

	function getClientsInGym()
	{
		$id_gimnasio = $_GET['id_gimnasio'];
		require 'model/visitaDAO.php';
		$this->loadModel('VisitaDAO');
		$visitaDAO = new VisitaDAO();
		$clientes = $visitaDAO->getClientsInGym($id_gimnasio);
		echo json_encode($clientes);
	}
}
