<?php
class Gimnasio extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('gimnasio/index');
	}

    function insert(){
        $nombre_gimnasio = $_POST['nombreGimnasio'];
        $telefono = $_POST['telefono'];
        $nombreImagen = "";
        if ($_FILES["imagen"]["name"] != null) {
            $imagen = $_FILES["imagen"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $nombre_gimnasio . "_" . $telefono;
            $carpeta ="public/gimnasio/" . $fullname . "/";
            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif'){
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)){
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);

                $data = array(
                    'nombre_gimnasio' => $nombre_gimnasio,
                    'telefono' => $telefono,
                    'imagen' => $nombreImagen,
                    'nombreImagen'  => $nombreImagen
                );
                require 'model/gimnasioDAO.php';
                $this->loadModel('GimnasioDAO');
                $gimnasioDAO = new GimnasioDAO();
                $gimnasioDAO->insert($data);
            }
        }
    }

	function update()
	{
		$nombreRol = $_POST['nombreRolActualizar'];
		$descripcion = $_POST['descripcionRolActualizar'];
		$idRol = $_POST['idRolActualizar'];
		$data = array('nombreRol' => $nombreRol, 'descripcion' => $descripcion,'idRolActualizar'=>$idRol);

		require 'model/gimnasioDAO.php';
		$this->loadModel('rolDAO');
		$rolDAO = new GimnasioDAO();
		$rolDAO->update($data);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarRol'];
		require 'model/gimnasioDAO.php';
		$this->loadModel('RolDAO');
		$rolDAO = new GimnasioDAO();
		$rolDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO = $gimnasioDAO->read();
		echo $gimnasioDAO;
	}

	function readTable()
    {
        require 'model/gimnasioDAO.php';
        $this->loadModel('GimnasioDAO');
        $gimnasioDAO = new GimnasioDAO();
        $gimnasioDAO = $gimnasioDAO->read();

        $obj = null;
        if (is_array($gimnasioDAO) || is_object($gimnasioDAO)) {
            foreach ($gimnasioDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}