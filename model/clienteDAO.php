<?php
    class ClienteDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO cliente values (
                :id_cliente,
                :nombre_cliente, 
                :apellido_paterno_cliente, 
                :apellido_materno_cliente, 
                :municipio_cliente, 
                :colonia_cliente, 
                :calle_cliente, 
                :codigo_postal_cliente, 
                :numero_cliente, 
                :imagen_cliente)');

            $query->execute([':id_cliente' => null, 
            ':nombre_cliente' => $data['nombre_cliente'], 
            ':apellido_paterno_cliente' => $data['apellido_paterno_cliente'], 
            ':apellido_materno_cliente' => $data['apellido_materno_cliente'], 
            ':municipio_cliente' => $data['municipio_cliente'], 
            ':colonia_cliente' => $data['colonia_cliente'], 
            ':calle_cliente' => $data['calle_cliente'], 
            ':codigo_postal_cliente' => $data['codigo_postal_cliente'], 
            ':numero_cliente' => $data['numero_cliente'], 
            ':imagen_cliente' => $data['imagen_cliente']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE cliente SET  
            nombre_cliente = :nombre_cliente, 
            apellido_paterno_cliente = :apellido_paterno_cliente, 
            apellido_materno_cliente = :apellido_materno_cliente,
            municipio_cliente = :municipio_cliente,
            colonia_cliente = :colonia_cliente,
            calle_cliente = :calle_cliente,
            codigo_postal_cliente = :codigo_postal_cliente,
            numero_cliente = :numero_cliente,
            imagen_cliente = :imagen_cliente
            WHERE id_cliente = :id_cliente');

            $query->execute([':id_cliente' => $data['id_clienteActualizar'],
            ':nombre_cliente' => $data['nombre_cliente'],
            ':apellido_paterno_cliente' => $data['apellido_paterno_cliente'],
            ':apellido_materno_cliente' => $data['apellido_materno_cliente'],
            ':municipio_cliente' => $data['municipio_cliente'],
            ':colonia_cliente' => $data['colonia_cliente'],
            ':calle_cliente' => $data['calle_cliente'],
            ':codigo_postal_cliente' => $data['codigo_postal_cliente'],
            ':numero_cliente' => $data['numero_cliente'],
            ':imagen_cliente' => $data['imagen_cliente']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM cliente where id_cliente = :id_cliente');
            $query->execute([':id_cliente' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'clienteDTO.php';
            $query = "SELECT * FROM cliente";
            $objcliente = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->nombre_cliente = $value['nombre_cliente'];
                $cliente->apellido_paterno_cliente = $value['apellido_paterno_cliente'];
                $cliente->apellido_materno_cliente = $value['apellido_materno_cliente'];
                $cliente->municipio_cliente = $value['municipio_cliente'];
                $cliente->colonia_cliente = $value['colonia_cliente'];
                $cliente->calle_cliente = $value['calle_cliente'];
                $cliente->codigo_postal_cliente = $value['codigo_postal_cliente'];
                $cliente->numero_cliente = $value['numero_cliente'];
                $cliente->imagen_cliente = $value['imagen_cliente'];
                $objcliente['data'][] = $cliente;
            }
            echo json_encode($objcliente, JSON_UNESCAPED_UNICODE);
        }
    }
?>
