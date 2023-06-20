<?php
class Usuario extends Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		session_start();
		if (isset($_SESSION['login'])) {
			$this->view->render('usuario/index');
		} else {
			header('location: ' . constant('URL'));
		}
	}

	function insert()
	{
		$nombreUsuario = $_POST['nombreUsuario'];
		$apellidoPaternoUsuario = $_POST['apellidoPaternoUsuario'];
		$apellidoMaternoUsuario = $_POST['apellidoMaternoUsuario'];
		$emailUsuario = $_POST['correoUsuario'];
		$passwordUsuario = $_POST['password'];
		$calleUsuario = $_POST['calleUsuario'];
		$estadoUsuario = $_POST['estadoUsuario'];
		$municipioUsuario = $_POST['municipioUsuario'];
		$coloniaUsuario = $_POST['coloniaUsuario'];
		$codigoPostalUsuario = $_POST['codigoPostalUsuario'];
		$id_rol = $_POST['rolUsuario'];
		$nombreImagen = "";
		if ($_FILES["imagen"]["name"] != null) {
			$imagen = $_FILES["imagen"];
			$nombreImagen = $imagen["name"];
			$tipoImagen = $imagen["type"];
			$ruta_provisional = $imagen["tmp_name"];
			$fullname = $nombreUsuario . "_" . $apellidoPaternoUsuario;
			$carpeta = "public/usuario/" . $fullname . "/";
			if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
				echo 'errorimagen';
			} else {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}
				copy($ruta_provisional, $carpeta . $nombreImagen);

				$data = array(
					'nombreUsuario' => $nombreUsuario,
					'apellidoPaternoUsuario' => $apellidoPaternoUsuario,
					'apellidoMaternoUsuario' => $apellidoMaternoUsuario,
					'correoUsuario' => $emailUsuario,
					'password' => $passwordUsuario,
					'calleUsuario' => $calleUsuario,
					'estadoUsuario' => $estadoUsuario,
					'municipioUsuario' => $municipioUsuario,
					'coloniaUsuario' => $coloniaUsuario,
					'codigoPostalUsuario' => $codigoPostalUsuario,
					'rolUsuario' => $id_rol,
					'imagen' => $nombreImagen,
					'nombreImagen' => $nombreImagen
				);
				require 'model/usuarioDAO.php';
				$this->loadModel('UsuarioDAO');
				$usuarioDAO = new UsuarioDAO();
				$usuarioDAO->insert($data);
			}
		}
	}

	function update()
	{
		$id_usuario = $_POST['id_usuarioActualizar'];
		$nombreUsuario = $_POST['nombreUsuarioActualizar'];
		$apellidoPaternoUsuario = $_POST['apellidoPaternoUsuarioActualizar'];
		$apellidoMaternoUsuario = $_POST['apellidoMaternoUsuarioActualizar'];
		$emailUsuario = $_POST['EmailUsuarioActualizar'];
		$passwordUsuario = $_POST['contrasenaUsuarioActualizar'];
		$calleUsuario = $_POST['calleUsuarioActualizar'];
		$estadoUsuario = $_POST['estadoUsuarioActualizar'];
		$municipioUsuario = $_POST['municipioUsuarioActualizar'];
		$coloniaUsuario = $_POST['coloniaUsuarioActualizar'];
		$codigoPostalUsuario = $_POST['codigopostalUsuarioActualizar'];
		$id_rol = $_POST['rolUsuarioActualizar'];
		$nombreImagen = "";

		$arrayActualizar = array(
			'id_usuario' => $id_usuario,
			'nombreUsuario' => $nombreUsuario,
			'apellidoPaternoUsuario' => $apellidoPaternoUsuario,
			'apellidoMaternoUsuario' => $apellidoMaternoUsuario,
			'emailUsuario' => $emailUsuario,
			'passwordUsuario' => $passwordUsuario,
			'calleUsuario' => $calleUsuario,
			'estadoUsuario' => $estadoUsuario,
			'municipioUsuario' => $municipioUsuario,
			'coloniaUsuario' => $coloniaUsuario,
			'codigoPostalUsuario' => $codigoPostalUsuario,
			'id_rol' => $id_rol,
		);

		if (isset($_FILES["imagenUsuarioActualizar"])) {
			if ($_FILES["imagenUsuarioActualizar"]["name"] != null) {
				$imagen = $_FILES["imagenUsuarioActualizar"];
				$nombreImagen = $imagen["name"];
				$tipoImagen = $imagen["type"];
				$ruta_provisional = $imagen["tmp_name"];

				$fullname = $nombreUsuario . "_" . $apellidoPaternoUsuario;
				$carpeta = "public/usuario/" . $fullname . "/";

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

		$obj = null;
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

	function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		header('location: ' . constant('URL'));
	}
}

?>