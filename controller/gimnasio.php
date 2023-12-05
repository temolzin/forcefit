<?php
class Gimnasio extends Controller
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
		if (ValidatePermissionModule::invoke("Gimnasio")) {
			return $this->view->render('gimnasio/index');
		}
		$this->view->render('errorPage/index');
    }

    function insert()
    {
        $nombreGimnasio = $_POST['nombreGimnasio'];
        $telefono = $_POST['telefono'];
        $nombreImagen = $_FILES["imagen"]["name"];
        $nombreFondoCredencial = $_FILES["fondoCredencial"]["name"];

        $data = array(
            'nombre_gimnasio' => $nombreGimnasio,
            'telefono' => $telefono,
            'imagen' => $nombreImagen,
            'nombreImagen' => $nombreImagen,
            'fondoCredencial' => $nombreFondoCredencial
        );

        if ($_FILES["imagen"]["name"] != null) {
            require 'model/gimnasioDAO.php';
            $this->loadModel('GimnasioDAO');
            $gimnasioDAO = new GimnasioDAO();
            $idGimnasio = $gimnasioDAO->insert($data);

            require_once __DIR__ . '/services/saveImage.php';
            $imagen = $_FILES["imagen"];
            $carpeta = "public/gimnasio/" . $idGimnasio . "/";
            SaveImage::invoke($carpeta, $imagen);

            $imagen = $_FILES["fondoCredencial"];
            $carpeta = "public/gimnasio/fondo/" . $idGimnasio . "/";
            SaveImage::invoke($carpeta, $imagen);
            echo "ok";
        }
    }

    function update()
    {
        $idGimnasio = $_POST['idGimnasioActualizar'];
        $nombreGimnasio = $_POST['nombreGimnasioActualizar'];
        $telefono = $_POST['telefonoActualizar'];

        $arrayActualizar = array(
            'id_gimnasio' => $idGimnasio,
            'nombre_gimnasio' => $nombreGimnasio,
            'telefono' => $telefono,
        );

        require 'model/gimnasioDAO.php';
        $this->loadModel('GimnasioDAO');
        $gimnasioDAO = new GimnasioDAO();
        $gimnasioDAO->update($arrayActualizar);
    }

    function delete()
    {
        $idEliminar = $_POST['idEliminarGimnasio'];
        require 'model/gimnasioDAO.php';
        $this->loadModel('GimnasioDAO');
        $gimnasioDAO = new GimnasioDAO();
        $gimnasioDAO->delete($idEliminar);
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

        $obj = array();
        if (is_array($gimnasioDAO) || is_object($gimnasioDAO)) {
            foreach ($gimnasioDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    function updateImage()
	{
		require_once __DIR__ . '/services/saveImage.php';
		$idGimnasio = $_POST['idGymUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$carpeta = "public/gimnasio/" . $idGimnasio . "/";
		$data = array(
			'id_gimnasio' => $idGimnasio,
			'imageInput' => SaveImage::invoke($carpeta, $imagen)
		);

		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO = $gimnasioDAO->updateImage($data);
	}
    
    function UpdateBackgroundCredential(){
        require_once __DIR__ . '/services/saveImage.php';
		$idGimnasio = $_POST['idGymUpdateBackground'];
		$imagen = $_FILES["imageBackgroundInput"];
		$carpeta = "public/gimnasio/fondo/" . $idGimnasio . "/";
		$data = array(
			'id_gimnasio' => $idGimnasio,
			'backgroundCredential' => SaveImage::invoke($carpeta, $imagen)
		);

		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO = $gimnasioDAO->updateBackgroundCredential($data);
    }
}
