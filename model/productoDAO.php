<?php
class ProductoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':id_gimnasio'=> $data['id_gimnasio'],
            ':id_categoria' =>$data['id_categoria'],
            ':nombre' => $data['nombreProducto'],
            ':descripcion' => $data['descripcionProducto'],
            ':precio' => $data['precioProducto'],
            ':stock' => $data['stockProducto'],
            ':imagen' => $data['imagen'],
    
        );
        $query ="INSERT INTO producto values (NULL,
                :nombre, 
                :descripcion, 
                :precio, 
                :stock, 
                :imagen,
                :id_categoria,
                :id_gimnasio)";
        if ($this->db->ejecutarAccion($query, $insertData)) {
            return $this->db->getLastInsertId();
        }
    }

    public function update($data)
    {
        $arrayActualizar = [
            ':id_producto' => $data['id_producto'],
            ':id_categoria' => $data['id_categoria'],
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion'],
            ':precio' => $data['precio'],
            ':stock' => $data['stock']
        ];
        $query = $this->db->conectar()->prepare('UPDATE producto SET 
            nombre = :nombre,
            id_categoria = :id_categoria,
            descripcion = :descripcion,
            precio = :precio,
            stock = :stock
            WHERE id_producto = :id_producto');
    
        $query->execute($arrayActualizar);
        echo 'ok';

    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM producto where id_producto = :id_producto');
        $query->execute([':id_producto' => $id]);
        echo 'ok';
    }

    public function read()
    {
    }

    public function readDataByIdGimnasio($id_gimnasio)
    {
        require_once 'productoDTO.php';
        $query = "SELECT * FROM producto WHERE id_gimnasio = " . $id_gimnasio;
        $objProducto = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $producto = new ProductoDTO();
            $producto->id_producto = $value['id_producto'];
            $producto->id_categoria = $value['id_categoria'];
            $producto->nombre = $value['nombre'];
            $producto->descripcion = $value['descripcion'];
            $producto->precio = $value['precio'];
            $producto->stock = $value['stock'];
            $producto->imagen = $value['imagen_producto'];
            array_push($objProducto, $producto);
        }
        }
        return $objProducto;

    }

    public function updateImage($data)
    {
        $insertData = array(
            ':id_producto' => $data['id_producto'],
            ':imagen_producto' => $data['imageInput'],
        );

        $queryUpdateUser = "UPDATE producto  SET 
        imagen_producto = :imagen_producto
        WHERE id_producto = :id_producto";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }

    }
}
?>
