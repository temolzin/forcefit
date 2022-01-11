<?php
	/**
	 * 
	 */
	class Nuevo extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->view->render('nuevo/index');
		}

		function registrarComputadora() {
		    $matricula = $_POST['matricula'];
		    $nombre = $_POST['nombre'];
		    $apellido = $_POST['apellido'];
		    $this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido]);
            echo 'Registra Computadora';
        }
	}
?>
