<?php
    class PlanSistemaDAO extends Model implements CRUD {
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
            require_once 'planSistemaDTO.php';
            $query = "SELECT * FROM plan_sistema";
            $objplanSistema = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $planSistema = new PlanSistemaDTO();
                $planSistema->id_plan_sistema = $value['id_plan_sistema'];
                $planSistema->nombre_plan_sistema = $value['nombre_plan_sistema'];
                $planSistema->descripcion_plan_sistema = $value['descripcion_plan_sistema'];
                $planSistema->costo = $value['costo'];
                array_push($objplanSistema, $planSistema);
            }
            return $objplanSistema;
        }
    }
?>

