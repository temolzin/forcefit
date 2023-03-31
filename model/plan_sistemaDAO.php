<?php
    class Plan_sistemaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO plan_sistema 
            values (
                :id_plan_sistema, 
                :nombre_plan_sistema, 
                :descripcion_plan_sistema, 
                :costo)');

            $query->execute([
                ':id_plan_sistema' => null, 
                ':nombre_plan_sistema' => $data['nombre_plan_sistema'], 
                ':descripcion_plan_sistema' => $data['descripcion_plan_sistema'], 
                ':costo' => $data['costo']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE plan_sistema SET  
            nombre_plan_sistema = :nombre_plan_sistema, 
            descripcion_plan_sistema = :descripcion_plan_sistema, 
            costo = :costo 
            WHERE id_plan_sistema = :id_plan_sistema');

            $query->execute([
                ':id_plan_sistema' => $data['id_plan_sistemaActualizar'],
                ':nombre_plan_sistema' => $data['nombre_plan_sistema'],
                ':descripcion_plan_sistema' => $data['descripcion_plan_sistema'], 
                ':costo' => $data['costo']
            ]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM plan_sistema where id_plan_sistema = :id_plan_sistema');
            $query->execute([':id_plan_sistema' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'plan_sistemaDTO.php';
            $query = "SELECT * FROM plan_sistema";
            $objplan_sistema = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $plan_sistema = new Plan_sistemaDTO();
                $plan_sistema->id_plan_sistema = $value['id_plan_sistema'];
                $plan_sistema->nombre_plan_sistema = $value['nombre_plan_sistema'];
                $plan_sistema->descripcion_plan_sistema = $value['descripcion_plan_sistema'];
                $plan_sistema->costo = $value['costo'];
                $objplan_sistema['data'][] = $plan_sistema;
            }
            echo json_encode($objplan_sistema, JSON_UNESCAPED_UNICODE);
        }
    }
?>

