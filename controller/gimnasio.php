<?php
class Gimnasio extends Controller
{
    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['login'])) {
            header('location: ' . constant('URL'));
        }
    }

    function index()
    {
        $this->view->render('gimnasio/index');
    }

    function insert()
    {
        $nombre_gimnasio = $_POST['nombreGimnasio'];
        $telefono = $_POST['telefono'];
        $nombreImagen = "";
        if ($_FILES["imagen"]["name"] != null) {
            $imagen = $_FILES["imagen"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $nombre_gimnasio . "_" . $telefono;
            $carpeta = "public/gimnasio/" . $fullname . "/";
            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);

                $data = array(
                    'nombre_gimnasio' => $nombre_gimnasio,
                    'telefono' => $telefono,
                    'imagen' => $nombreImagen,
                    'nombreImagen' => $nombreImagen
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
        $id_gimnasio = $_POST['idGimnasioActualizar'];
        $nombre_gimnasio = $_POST['nombreGimnasioActualizar'];
        $telefono = $_POST['telefonoActualizar'];
        $nombreImagen = "";

        $arrayActualizar = array(
            'id_gimnasio' => $id_gimnasio,
            'nombre_gimnasio' => $nombre_gimnasio,
            'telefono' => $telefono,
        );

        if (isset($_FILES["imagenGimnasioActualizar"])) {

            if ($_FILES["imagenGimnasioActualizar"]["name"] != null) {

                $imagen = $_FILES["imagenGimnasioActualizar"];
                $nombreImagen = $imagen["name"];
                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $nombre_gimnasio . "_" . $telefono;
                $carpeta = "public/gimnasio/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);
                    $arrayActualizar['imagen'] = $nombreImagen;
                }
            }
        }

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
}

