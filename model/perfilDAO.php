<?php
class PerfilDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE rol SET  nombreRol = :nombreRol, descripcion = :descripcion WHERE id_rol = :id_rol');
        $query->execute([':id_rol' => $data['idRolActualizar'], ':nombreRol' => $data['nombreRol'], ':descripcion' => $data['descripcion']]);
        echo 'ok';
    }
    public function read()
    {
        require_once 'rolDTO.php';
        $query = "SELECT * FROM rol";
        $objRol = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $rol = new RolDTO();
            $rol->id_rol = $value['id_rol'];
            $rol->nombreRol = $value['nombreRol'];
            $rol->descripcion = $value['descripcion'];
            $objRol['data'][] = $rol;
        }
        echo json_encode($objRol, JSON_UNESCAPED_UNICODE);
    }
    /**
     * @param mixed $data
     */
    public function insert($data)
    {
        parent::insert($data);
    }

    /**
     *
     * @param mixed $id
     */
    public function delete($id)
    {
        parent::delete($id);
    }
}
?>
