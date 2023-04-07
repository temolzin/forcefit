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
        $imagen = '';

        $arrayActualizar = [];

        if (isset($data['imagen'])) {

            $imagen = 'imagen = :imagen,';

            $arrayActualizar = [
                ':id_gimnasio' => $data['id_gimnasio'],
                ':nombre_gimnasio' => $data['nombre_gimnasio'],
                ':telefono' => $data['telefono'],
                ':imagen' => $data['imagen']
            ];
        } else {
            $arrayActualizar = [
                ':id_gimnasio' => $data['id_gimnasio'],
                ':nombre_gimnasio' => $data['nombre_gimnasio'],
                ':telefono' => $data['telefono'],
                ':imagen' => $data['imagen']
            ];
        }
        $query = $this->db->conectar()->prepare('UPDATE gimnasio SET 
            ' . $imagen . '
            nombre_gimnasio = :nombre_gimnasio,  
            telefono = :telefono
            WHERE id_gimnasio = :id_gimnasio');

        $query->execute($arrayActualizar);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM gimnasio where id_gimnasio = :id_gimnasio');
        $query->execute([':id_gimnasio' => $id]);
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

