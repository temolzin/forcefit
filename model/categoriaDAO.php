<?php
class CategoriaDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO categoria 
        VALUES (NULL, :id_gimnasio, :nombre, :descripcion)');

        if (!$query->execute([
            ':id_gimnasio' => $data['id_gimnasio'],
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion']
        ])) {
            echo 'Error al ejecutar la consulta: ' . $query->errorInfo()[2];
            return;
        }
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE categoria SET  
        nombre = :nombre,
        descripcion = :descripcion
        WHERE id_categoria = :id_categoria');
        
        $query->execute([
            ':id_categoria' => $data['idCategoriaActualizar'],
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion']
        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM categoria where id_categoria = :id_categoria');
        $query->execute([':id_categoria' => $id]);
        echo 'ok';
    }

    public function read()
    {
    }
    
    public function readCategoria($id_gimnasio)
    {
        require_once 'categoriaDTO.php';

        $query = "SELECT c.* FROM categoria c JOIN usuario_gimnasio ug ON c.id_gimnasio = ug.id_gimnasio
        WHERE ug.id_gimnasio =".$id_gimnasio." ";
        $objCategoria = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $categoria = new CategoriaDTO();
                $categoria->id_categoria = $value['id_categoria'];
                $categoria->nombre = $value['nombre'];
                $categoria->descripcion = $value['descripcion'];
                array_push($objCategoria, $categoria);
            }
        } else {
            $objCategoria = null;
        }
        return $objCategoria;
    }

    public function readCategoriaByIdGimnasio($id_gimnasio)
        {
            require_once 'categoriaDTO.php';
            $query = "SELECT * FROM categoria
            WHERE id_gimnasio = ".$id_gimnasio." ";
            $objcategoria = array();
            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $categoria = new categoriaDTO();
                $categoria->id_categoria = $value['id_categoria'];
                $categoria->nombre = $value['nombre'];
                $categoria->descripcionPlanGym = $value['descripcion'];
                $objcategoria[$categoria->id_categoria] = $categoria;
            }
            }
            $objcategoria = array_values($objcategoria);
            return $objcategoria;
        }


}
?>
