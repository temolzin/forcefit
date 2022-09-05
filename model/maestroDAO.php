<?php
    class MaestroDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO maestro values (:id_maestro, :nombre_maestro, :apppat_maestro, :appmat_maestro, :edad)');
            $query->execute([':id_maestro' => null, ':nombre_maestro' => $data['nombreMaestro'],':apppat_maestro' => $data['apellidoPaterno'],':appmat_maestro' => $data['apellidoMaterno'], ':edad' => $data['edad']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE maestro SET  nombre_maestro = :nombre_maestro, apppat_maestro = :apppat_maestro, appmat_maestro = :appmat_maestro, edad_maestro = :edad_maestro WHERE id_maestro = :id_maestro');
            $query->execute([':id_maestro' => $data['idMaestro'],':nombre_maestro' => $data['nombre'],':apppat_maestro' => $data['apellidoPaterno'],':appmat_maestro' => $data['apellidoMaterno'],':edad_maestro' => $data['edad']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM maestro where id_maestro = :id_maestro');
            $query->execute([':id_maestro' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'maestroDTO.php';
            $query = "SELECT * FROM maestro";
            $objMaestros = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $maestro = new MaestroDTO();
                $maestro->id_maestro = $value['id_maestro'];
                $maestro->nombre_maestro = $value['nombre_maestro'];
                $maestro->apppat_maestro = $value['apppat_maestro'];
                $maestro->appmat_maestro = $value['appmat_maestro'];
                $maestro->edad_maestro = $value['edad_maestro'];
                $objMaestros['data'][] = $maestro;
            }
            echo json_encode($objMaestros, JSON_UNESCAPED_UNICODE);
        }
    }
?>
