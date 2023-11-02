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
        $nombre_gimnasio = $_POST['nombreGimnasio'];
        $telefono = $_POST['telefono'];
        $nombreImagen = $_FILES["imagen"]["name"];

        $data = array(
            'nombre_gimnasio' => $nombre_gimnasio,
            'telefono' => $telefono,
            'imagen' => $nombreImagen,
            'nombreImagen' => $nombreImagen
        );

        if ($_FILES["imagen"]["name"] != null) {
            require 'model/gimnasioDAO.php';
            $this->loadModel('GimnasioDAO');
            $gimnasioDAO = new GimnasioDAO();
            $id_gimnasio = $gimnasioDAO->insert($data);

            require_once __DIR__ . '/services/saveImage.php';
            $imagen = $_FILES["imagen"];
            $Carpeta = "public/gimnasio/" . $id_gimnasio . "/";
            SaveImage::invoke($Carpeta, $imagen);
            echo "ok";
        }
    }

    function update()
    {
        $id_gimnasio = $_POST['idGimnasioActualizar'];
        $nombre_gimnasio = $_POST['nombreGimnasioActualizar'];
        $telefono = $_POST['telefonoActualizar'];

        $arrayActualizar = array(
            'id_gimnasio' => $id_gimnasio,
            'nombre_gimnasio' => $nombre_gimnasio,
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

    function UpdateImage()
	{
		require_once __DIR__ . '/services/saveImage.php';
		$id_gimnasio = $_POST['idGymUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$Carpeta = "public/gimnasio/" . $id_gimnasio . "/";
		$data = array(
			'id_gimnasio' => $id_gimnasio,
			'imageInput' => SaveImage::invoke($Carpeta, $imagen)
		);

		require 'model/gimnasioDAO.php';
		$this->loadModel('GimnasioDAO');
		$gimnasioDAO = new GimnasioDAO();
		$gimnasioDAO = $gimnasioDAO->updateImage($data);
	}
}
