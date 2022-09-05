<?php
    class CategoriaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO categoria values (:id_categoria, :nombre_categoria)');
            $query->execute([':id_categoria' => null, ':nombre_categoria' => $data['nombreCategoria']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE categoria SET  nombre_categoria = :nombre_categoria WHERE id_categoria = :id_categoria');
            $query->execute([':id_categoria' => $data['idCategoria'],':nombre_categoria' => $data['nombreCategoria']]);
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
            require_once 'categoriaDTO.php';
            $query = "SELECT * FROM categoria";
            $objCategorias = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $categoria = new CategoriaDTO();
                $categoria->id_categoria = $value['id_categoria'];
                $categoria->nombre_categoria = $value['nombre_categoria'];
                $objCategorias['data'][] = $categoria;
            }
            echo json_encode($objCategorias, JSON_UNESCAPED_UNICODE);
        }
    }
?>
