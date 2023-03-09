<?php
class Permiso extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('rol/rol');
    }
    function read()
	{
		require 'model/permisoDAO.php';
		$this->loadModel('PermisoDAO');
		$permisoDAO = new PermisoDAO();
		$permisoDAO = $permisoDAO->read();
		echo $permisoDAO;
	}
    public function getPermisosRol(int $idrol)
    {
        $rolid = intval($idrol);
        if ($rolid > 0) {
            $arrModulos = $this->model->selectModulos();
            $arrPermisosRol = $this->model->selectPermisosRol($rolid);
            $arrRol = $this->model->getRol($rolid);
            $arrPermisos = array('c' => 0, 'r' => 0, 'u' => 0, 'd' => 0);
            $arrPermisoRol = array('idrol' => $rolid, 'rol' => $arrRol['nombrerol']);

            if (empty($arrPermisosRol)) {
                for ($i = 0; $i < count($arrModulos); $i++) {

                    $arrModulos[$i]['permisos'] = $arrPermisos;
                }
            } else {
                for ($i = 0; $i < count($arrModulos); $i++) {
                    $arrPermisos = array('c' => 0, 'r' => 0, 'u' => 0, 'd' => 0);
                    if (isset($arrPermisosRol[$i])) {
                        $arrPermisos = array(
                            'c' => $arrPermisosRol[$i]['c'],
                            'r' => $arrPermisosRol[$i]['r'],
                            'u' => $arrPermisosRol[$i]['u'],
                            'd' => $arrPermisosRol[$i]['d']
                        );
                    }
                    $arrModulos[$i]['permisos'] = $arrPermisos;
                }
            }
            $arrPermisoRol['modulos'] = $arrModulos;
            $html = getModal("modalPermisos", $arrPermisoRol);
        }
        die();
    }
    public function setPermisos()
    {
        if ($_POST) {
            $intIdrol = intval($_POST['idrol']);
            $modulos = $_POST['modulos'];

            $this->model->deletePermisos($intIdrol);
            foreach ($modulos as $modulo) {
                $idModulo = $modulo['idmodulo'];
                $c = empty($modulo['c']) ? 0 : 1;
                $r = empty($modulo['r']) ? 0 : 1;
                $u = empty($modulo['u']) ? 0 : 1;
                $d = empty($modulo['d']) ? 0 : 1;
                $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $c, $r, $u, $d);
            }
            if ($requestPermiso > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
            } else {
                $arrResponse = array("status" => false, "msg" => 'No es posible asignar los permisos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
