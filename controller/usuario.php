<?php
class Usuario extends Controller
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
		if (ValidatePermissionModule::invoke("Usuarios")) {
			return $this->view->render('usuario/index');
		}
		$this->view->render('errorPage/index');
	}

	function insert()
	{
		$nombreUsuario = $_POST['nombreUsuario'];
		$apellidoPaternoUsuario = $_POST['apellidoPaternoUsuario'];
		$apellidoMaternoUsuario = $_POST['apellidoMaternoUsuario'];
		$telefonoUsuario = $_POST['telefonoUsuario'];
		$emailUsuario = $_POST['correoUsuario'];
		$passwordUsuario = $_POST['password'];
		$calleUsuario = $_POST['calleUsuario'];
		$estadoUsuario = $_POST['estadoUsuario'];
		$municipioUsuario = $_POST['municipioUsuario'];
		$coloniaUsuario = $_POST['coloniaUsuario'];
		$codigoPostalUsuario = $_POST['codigoPostalUsuario'];
		$idRol = $_POST['rolUsuario'];
		$nombreImagen = $_FILES["imagen"]["name"];

		$data = array(
			'nombreUsuario' => $nombreUsuario,
			'apellidoPaternoUsuario' => $apellidoPaternoUsuario,
			'apellidoMaternoUsuario' => $apellidoMaternoUsuario,
			'telefonoUsuario' => $telefonoUsuario,
			'correoUsuario' => $emailUsuario,
			'password' => $passwordUsuario,
			'calleUsuario' => $calleUsuario,
			'estadoUsuario' => $estadoUsuario,
			'municipioUsuario' => $municipioUsuario,
			'coloniaUsuario' => $coloniaUsuario,
			'codigoPostalUsuario' => $codigoPostalUsuario,
			'rolUsuario' => $idRol,
			'imagen' => $nombreImagen,
			'nombreImagen' => $nombreImagen
		);

		if ($_FILES["imagen"]["name"] != null) {
			require 'model/usuarioDAO.php';
			$this->loadModel('UsuarioDAO');
			$usuarioDAO = new UsuarioDAO();
			$idUsuario = $usuarioDAO->insert($data);
	
			require_once __DIR__ . '/services/saveImage.php';
			$imagen = $_FILES["imagen"];
			$carpeta = "public/usuario/" . $idUsuario . "/";
			SaveImage::invoke($carpeta, $imagen);
			echo "ok";
		}
	}

	function update()
	{
		$idUsuario = $_POST['id_usuarioActualizar'];
		$nombreUsuario = $_POST['nombreUsuarioActualizar'];
		$apellidoPaternoUsuario = $_POST['apellidoPaternoUsuarioActualizar'];
		$apellidoMaternoUsuario = $_POST['apellidoMaternoUsuarioActualizar'];
		$telefonoUsuario = $_POST['telefonoUsuarioActualizar'];
		$emailUsuario = $_POST['EmailUsuarioActualizar'];
		$passwordUsuario = $_POST['contrasenaUsuarioActualizar'];
		$calleUsuario = $_POST['calleUsuarioActualizar'];
		$estadoUsuario = $_POST['estadoUsuarioActualizar'];
		$municipioUsuario = $_POST['municipioUsuarioActualizar'];
		$coloniaUsuario = $_POST['coloniaUsuarioActualizar'];
		$codigoPostalUsuario = $_POST['codigopostalUsuarioActualizar'];
		$idRol = $_POST['idRolUsuarioActualizar'];

		$arrayActualizar = array(
			'id_usuario' => $idUsuario,
			'nombreUsuario' => $nombreUsuario,
			'apellidoPaternoUsuario' => $apellidoPaternoUsuario,
			'apellidoMaternoUsuario' => $apellidoMaternoUsuario,
			'telefonoUsuario' => $telefonoUsuario,
			'emailUsuario' => $emailUsuario,
			'passwordUsuario' => $passwordUsuario,
			'calleUsuario' => $calleUsuario,
			'estadoUsuario' => $estadoUsuario,
			'municipioUsuario' => $municipioUsuario,
			'coloniaUsuario' => $coloniaUsuario,
			'codigoPostalUsuario' => $codigoPostalUsuario,
			'id_rol' => $idRol,
		);

		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->update($arrayActualizar);
	}

	function delete()
	{
		$idEliminar = $_POST['idEliminarUsuario'];
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->delete($idEliminar);
	}

	function read()
	{
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->read();

	}

	function readTable()
	{
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->read();

		$obj = array();
		if (is_array($usuarioDAO) || is_object($usuarioDAO)) {
			foreach ($usuarioDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		} else {
			$obj = array();
		}
		echo json_encode($obj);
	}

	function login()
	{
		$emailUsuario = $_POST['email'];
		$passwordUsuario = $_POST['password'];
		$data = array('emailUsuario' => $emailUsuario, 'passwordUsuario' => $passwordUsuario);

		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->login($data);
	}

	function insertGymAndPlanSistema()
	{
		$id_usuario = $_POST['id_usuarioAsignar'];
		$id_gimnasio = $_POST['id_gimnasioAsignar'];
		$id_plan_sistema = $_POST['id_planSistemaAsignar'];

				$data = array(
					'id_usuario' => $id_usuario,
					'id_gimnasio' => $id_gimnasio,
					'id_plan_sistema' => $id_plan_sistema
				);
				require 'model/usuarioDAO.php';
				$this->loadModel('UsuarioDAO');
				$usuarioDAO = new UsuarioDAO();
				$usuarioDAO->insertGymAndPlanSistema($data);
	}

	function updateImage()
	{
		require_once __DIR__ . '/services/saveImage.php';
		$idUser = $_POST['idUserUpdateImage'];
		$imagen = $_FILES["imageInput"];
		$carpeta = "public/usuario/" . $idUser . "/";
		$data = array(
			'id_user' => $idUser,
			'imageInput' => SaveImage::invoke($carpeta, $imagen)
		);

		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->updateImage($data);
	}

	function getUsersWithUpcomingMembershipExpiry()
	{
		require 'model/usuarioDAO.php';
		$this->loadModel('UsuarioDAO');
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO = $usuarioDAO->getUsersWithUpcomingMembershipExpiry();

		$obj = array();
		if (is_array($usuarioDAO) || is_object($usuarioDAO)) {
			foreach ($usuarioDAO as $key => $value) {
				$obj["data"][] = $value;
			}
		}
		echo json_encode($obj);
	}
}
?>

