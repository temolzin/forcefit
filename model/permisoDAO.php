<?php
class PermisoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }
    public function read()
        {
            require_once 'permisoDTO.php';
            $query = "SELECT permiso.*,modulo.* FROM permiso,modulo";
            $objPermiso = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $permiso = new PermisoDTO();
                $permiso->id_permiso = $value['id_permiso'];
                $permiso->id_rol = $value['id_rol'];
                $permiso->id_modulo = $value['id_modulo'];
                $permiso->nombre_modulo = $value['nombre_modulo'];
                $permiso->c = $value['c'];
                $permiso->r = $value['r'];
                $permiso->u = $value['u'];
                $permiso->d = $value['d'];
                $objPermiso['data'][] = $permiso;
            }
            echo json_encode($objPermiso, JSON_UNESCAPED_UNICODE);
        }
    public function selectModulos()
    {
        $sql = "SELECT * FROM modulo";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectPermisosRol(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "SELECT * FROM permiso WHERE rolid = $this->intRolid";
        $request = $this->select_all($sql);
        return $request;
    }

    public function deletePermisos(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "DELETE FROM permiso WHERE rolid = $this->intRolid";
        $request = $this->delete($sql);
        return $request;
    }

    public function insertPermisos(int $idrol, int $idmodulo, int $c, int $r, int $u, int $d)
    {
        $this->intRolid = $idrol;
        $this->intModuloid = $idmodulo;
        $this->c = $c;
        $this->r = $r;
        $this->u = $u;
        $this->d = $d;
        $query_insert = "INSERT INTO permiso(rolid,moduloid,c,r,u,d) VALUES(?,?,?,?,?,?)";
        $arrData = array($this->intRolid, $this->intModuloid, $this->c, $this->r, $this->u, $this->d);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function permisosModulo(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "SELECT p.rolid,
						p.moduloid,
						m.titulo as modulo,
						p.c,
						p.r,
						p.u,
						p.d 
					FROM permiso p 
					INNER JOIN modulo m
					ON p.moduloid = m.idmodulo
					WHERE p.rolid = $this->intRolid";
        $request = $this->select_all($sql);
        $arrPermisos = array();
        for ($i = 0; $i < count($request); $i++) {
            $arrPermisos[$request[$i]['moduloid']] = $request[$i];
        }
        return $arrPermisos;
    }

    public function getRol(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "SELECT * FROM rol WHERE idrol = $this->intRolid";
        $request = $this->select($sql);
        return $request;
    }

	/**
	 * @param mixed $data
	 * @return mixed
	 */
	public function insert($data) {
	}
	
	/**
	 *
	 * @param mixed $data
	 * @return mixed
	 */
	public function update($data) {
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function delete($id) {
	}
	
	/**
	 * @return mixed
	 */

}
?>
