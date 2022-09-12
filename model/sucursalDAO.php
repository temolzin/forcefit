<?php
    class SucursalDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO sucursal values (:id_sucursal, :nombre_sucursal, :numero_sucursal, :descripcion_sucursal)');
            $query->execute([':id_sucursal' => null, ':nombre_sucursal' => $data['nombreSucursal'],':numero_sucursal' => $data['numeroSucursal'],':descripcion_sucursal' => $data['descripcionSucursal']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE sucursal SET  nombre_sucursal = :nombre_sucursal, numero_sucursal = :numero_sucursal, descripcion_sucursal = :descripcion_sucursal WHERE id_sucursal = :id_sucursal');
            $query->execute([':id_sucursal' => $data['idSucursal'],':nombre_sucursal' => $data['nombreSucursal'],':numero_sucursal' => $data['numeroSucursal'],':descripcion_sucursal' => $data['descripcionSucursal']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM sucursal where id_sucursal = :id_sucursal');
            $query->execute([':id_sucursal' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'sucursalDTO.php';
            $query = "SELECT * FROM sucursal";
            $objSucursal = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $sucursal = new SucursalDTO();
                $sucursal->id_sucursal = $value['id_sucursal'];
                $sucursal->nombre_sucursal = $value['nombre_sucursal'];
                $sucursal->numero_sucursal = $value['numero_sucursal'];
                $sucursal->descripcion_sucursal = $value['descripcion_sucursal'];
                $objSucursal['data'][] = $sucursal;
            }
            echo json_encode($objSucursal, JSON_UNESCAPED_UNICODE);
        }
    }
?>
