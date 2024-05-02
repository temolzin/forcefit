<?php
class VentaDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        try {
            
            $conexion = Conexion::getInstance();
            $conexion->beginTransaction();
            $queryVenta = $conexion->prepare('INSERT INTO venta (id_cliente, fecha, total) VALUES (:id_cliente, :fecha, :total)');
            $queryVenta->execute([
                ':id_cliente' => $data['id_cliente'],
                ':fecha' => $data['fecha'],
                ':total' => $data['total']
            ]);
            $id_venta = $conexion->getLastInsertId();
            $queryDetalleVenta = $conexion->prepare('INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_Unitario, subtotal) VALUES (:id_venta, :id_producto, :cantidad, :precio_Unitario, :subtotal)');
            $queryDetalleVenta->execute([
                ':id_venta' => $id_venta,
                ':id_producto' => $data['id_producto'],
                ':cantidad' => $data['cantidad'],
                ':precio_Unitario' => $data['precio_Unitario'],
                ':subtotal' => $data['subtotal']
            ]);
            $conexion->commit();
    
            return true; 
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
            return false;
        }
    }

    public function update($data)
    {
        
    }

    public function delete($id)
    {
        try {
            $conexion = Conexion::getInstance();
            $conexion->beginTransaction();
            $queryDetalleVenta = $conexion->prepare('DELETE FROM detalle_venta WHERE id_venta IN (SELECT id_venta FROM venta WHERE id_cliente = :id_cliente)');
            $queryDetalleVenta->execute([':id_cliente' => $id]);
            $queryVenta = $conexion->prepare('DELETE FROM venta WHERE id_cliente = :id_cliente');
            $queryVenta->execute([':id_cliente' => $id]);
            
            $conexion->commit();
            
            echo 'ok';
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
        }
    }

    public function read()
    {

    }

    public function readCustomer($id_gimnasio)
    {
        require_once 'clienteDTO.php';
        $query = "SELECT cl.id_cliente, cl.nombre_cliente
        FROM cliente cl
        JOIN usuario_gimnasio ug ON cl.id_gimnasio = ug.id_gimnasio
        WHERE ug.id_gimnasio = ".$id_gimnasio." ";
        $objCliente = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->nombre_cliente = $value['nombre_cliente'];
               
                array_push($objCliente, $cliente);
            }
        } else {
            $objCliente = null;
        }
        return $objCliente;
    }

    public function readProduct($id_gimnasio)
    {
        require_once 'productoDTO.php';
        $query = "SELECT pr.id_producto, pr.nombre, pr.precio, pr.stock
        FROM producto pr
        JOIN usuario_gimnasio ug ON pr.id_gimnasio = ug.id_gimnasio
        WHERE ug.id_gimnasio = ".$id_gimnasio." ";
        $objProducto = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $producto = new ProductoDTO();
                $producto->id_producto = $value['id_producto'];
                $producto->nombre = $value['nombre'];
                $producto->precio = $value['precio'];
                $producto->stock = $value['stock'];
               
                array_push($objProducto, $producto);
            }
        } else {
            $objProducto = null;
        }
        return $objProducto;
    }

    public function readSales()
    {
        require_once 'ventaDTO.php';
        $query = "SELECT dv.id_detalle, dv.id_venta, dv.id_producto, p.nombre as nombre_producto, dv.cantidad, dv.precio_Unitario, dv.subtotal, v.id_cliente, c.nombre_cliente as nombre_cliente, v.total, v.fecha FROM detalle_venta AS dv JOIN venta AS v ON dv.id_venta = v.id_venta JOIN producto AS p ON dv.id_producto = p.id_producto JOIN cliente AS c ON v.id_cliente = c.id_cliente";
        $objventa = array();
        $result = $this->db->consultar($query);
        if (is_array($result) || is_object($result)) {
            foreach ($result as $key => $value) {
                $venta = new ventaDTO();
                $venta->id_detalle = $value['id_detalle'];
                $venta->id_venta = $value['id_venta'];
                $venta->id_producto = $value['id_producto'];
                $venta->nombre_producto = $value['nombre_producto'];
                $venta->id_cliente = $value['id_cliente'];
                $venta->nombre_cliente = $value['nombre_cliente']; 
                $venta->fecha = $value['fecha'];
                $venta->cantidad = $value['cantidad'];
                $venta->precio_Unitario = $value['precio_Unitario'];
                $venta->subtotal = $value['subtotal'];
                $venta->total = $value['total'];
                $objventa[$venta->id_venta] = $venta;
            }
        }
        $objventa = array_values($objventa);
        return $objventa;
    }

}
?>