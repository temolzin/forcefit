<?php
class GimnasioDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':nombre_gimnasio' => $data['nombre_gimnasio'],
            ':telefono' => $data['telefono'],
            ':imagen' => $data['imagen'],
            ':fondoCredencial' => $data['fondoCredencial']
        );
        $query = "INSERT INTO gimnasio values (NULL, 
            :nombre_gimnasio,
            :telefono,  
            :imagen,
            :fondoCredencial)";
        if ($this->db->ejecutarAccion($query, $insertData)) {
            return $this->db->getLastInsertId();
        }
    }

    public function update($data)
    {
        $arrayActualizar = [
            ':id_gimnasio' => $data['id_gimnasio'],
            ':nombre_gimnasio' => $data['nombre_gimnasio'],
            ':telefono' => $data['telefono']
        ];
        $query = $this->db->conectar()->prepare('UPDATE gimnasio SET
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
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $gimnasio = new GimnasioDTO();
            $gimnasio->id_gimnasio = $value['id_gimnasio'];
            $gimnasio->nombre_gimnasio = $value['nombre_gimnasio'];
            $gimnasio->telefono = $value['telefono'];
            $gimnasio->imagen = $value['imagen'];
            $gimnasio->fondoCredencial = $value['fondo_credencial'];
            array_push($objGimnasio, $gimnasio);
        }
        }
        $objGimnasio = array_values($objGimnasio);
        return $objGimnasio;
    }

    public function updateImage($data)
    {
        $insertData = array(
            ':id_gimnasio' => $data['id_gimnasio'],
            ':imageInput' => $data['imageInput'],
        );

        $queryUpdateUser = "UPDATE gimnasio SET 
        imagen = :imageInput
        WHERE id_gimnasio = :id_gimnasio";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }

    public function updateBackgroundCredential($data)
    {
        $insertData = array(
            ':id_gimnasio' => $data['id_gimnasio'],
            ':backgroundCredential' => $data['backgroundCredential'],
        );

        $queryUpdateUser = "UPDATE gimnasio SET 
        fondo_credencial = :backgroundCredential
        WHERE id_gimnasio = :id_gimnasio";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }
}
?>

