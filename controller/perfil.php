<?php
class Perfil extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function index()
    {
        $this->view->render('perfil/perfil');
    }
	function update()
	{
		$nombreRol = $_POST['nombreRolActualizar'];
		$descripcion = $_POST['descripcionRolActualizar'];
		$idRol = $_POST['idRolActualizar'];
		$data = array('nombreRol' => $nombreRol, 'descripcion' => $descripcion,'idRolActualizar'=>$idRol);

		require 'model/perfilDAO.php';
		$this->loadModel('rolDAO');
		$rolDAO = new RolDAO();
		$rolDAO->update($data);
	}
    function read()
	{
		require 'model/perfilDAO.php';
		$this->loadModel('PerfilDAO');
		$perfilDAO = new PerfilDAO();
		$perfilDAO = $perfilDAO->read();
		echo $perfilDAO;
	}
}
?>
