<?php
class GimnasioDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO gimnasio values (NULL, 
            :nombre_gimnasio,
            :telefono,  
            :imagen)');
        $query->execute([
            ':nombre_gimnasio' => $data['nombre_gimnasio'],
            ':telefono' => $data['telefono'],
            ':imagen' => $data['imagen'],
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE rol SET  nombreRol = :nombreRol, descripcion = :descripcion WHERE id_rol = :id_rol');
        $query->execute([':id_rol' => $data['idRolActualizar'], ':nombreRol' => $data['nombreRol'], ':descripcion' => $data['descripcion']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM rol where id_rol = :id_rol');
        $query->execute([':id_rol' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'gimnasioDTO.php';
        $query = "SELECT * FROM gimnasio";
        $objGimnasio = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $gimnasio = new GimnasioDTO();
            $gimnasio->id_gimnasio = $value['id_gimnasio'];
            $gimnasio->nombre_gimnasio = $value['nombre_gimnasio']; 
            $gimnasio->telefono = $value['telefono']; 
            $gimnasio->imagen = $value['imagen'];
            array_push($objGimnasio, $gimnasio);
        }
        return $objGimnasio;
    }
}
?>