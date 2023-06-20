<?php
class PermisoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }
    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM permiso where id_rol = :id_rol');
        $query->execute([':id_rol' => $id]);
    }

    public function insertPermisos($id_rol, $idmodulo, $c, $r, $u, $d)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO permiso values (:id_permiso, :id_rol, :id_modulo, :c, :r, :u, :d)');
        $query->execute([
            ':id_permiso' => null,
            ':id_rol' => $id_rol,
            ':id_modulo' => $idmodulo,
            ':c' => $c,
            ':r' => $r,
            ':u' => $u,
            ':d' => $d
        ]);

        echo "ok";
    }

    public function update($data)
    {
    }

    public function insert($data)
    {
    }



    public function read()
    {
    }

    public function readModulo()
    {
        require_once 'moduloDTO.php';
        $query = "SELECT * FROM modulo";
        $objModulo = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $modulo = new ModuloDTO();
            $modulo->id_modulo = $value['id_modulo'];
            $modulo->nombre_modulo = $value['nombre_modulo'];
            $modulo->icono = $value['icono'];
            $objModulo['data'][] = $modulo;
        }
        echo json_encode($objModulo, JSON_UNESCAPED_UNICODE);
    }

    public function readPermiso($id_rol)
    {
        require_once 'permisoDTO.php';

        $query = "SELECT p.id_permiso, p.id_rol, p.id_modulo, p.c, p.r, p.u, p.d FROM permiso p INNER JOIN rol r ON p.id_rol = r.id_rol Where p.id_rol=" . $id_rol . "";
        $objPermiso = array();
        if (is_null($this->db->consultar($query)) == true) {
            $objPermiso['data'] = [];
            echo json_encode($objPermiso, JSON_UNESCAPED_UNICODE);
        } else {
            foreach ($this->db->consultar($query) as $key => $value) {
                $permiso = new PermisoDTO();
                $permiso->id_permiso = $value['id_permiso'];
                $permiso->id_rol = $value['id_rol'];
                $permiso->id_modulo = $value['id_modulo'];
                $permiso->c = $value['c'];
                $permiso->r = $value['r'];
                $permiso->u = $value['u'];
                $permiso->d = $value['d'];
                $objPermiso['data'][] = $permiso;
            }
            echo json_encode($objPermiso, JSON_UNESCAPED_UNICODE);
        }
    }
}

?>