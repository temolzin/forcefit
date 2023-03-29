<?php
    class Plan_gymDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO plan_gym 
            values (
                :id_planGym, 
                :nombrePlanGym, 
                :descripcionPlanGym, 
                :costoPlanGym)');

            $query->execute([
                ':id_planGym' => null, 
                ':nombrePlanGym' => $data['nombrePlanGym'], 
                ':descripcionPlanGym' => $data['descripcionPlanGym'], 
                ':costoPlanGym' => $data['costoPlanGym']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE plan_gym SET  
            nombrePlanGym = :nombrePlanGym, 
            descripcionPlanGym = :descripcionPlanGym, 
            costoPlanGym = :costoPlanGym 
            WHERE id_planGym = :id_planGym');

            $query->execute([
                ':id_planGym' => $data['id_planGymActualizar'],
                ':nombrePlanGym' => $data['nombrePlanGym'],
                ':descripcionPlanGym' => $data['descripcionPlanGym'], 
                ':costoPlanGym' => $data['costoPlanGym']
            ]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM plan_gym where id_planGym = :id_planGym');
            $query->execute([':id_planGym' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'plan_gymDTO.php';
            $query = "SELECT * FROM plan_gym";
            $objplan_gym = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $plan_gym = new Plan_gymDTO();
                $plan_gym->id_planGym = $value['id_planGym'];
                $plan_gym->nombrePlanGym = $value['nombrePlanGym'];
                $plan_gym->descripcionPlanGym = $value['descripcionPlanGym'];
                $plan_gym->costoPlanGym = $value['costoPlanGym'];
                $objplan_gym['data'][] = $plan_gym;
            }
            echo json_encode($objplan_gym, JSON_UNESCAPED_UNICODE);
        }
    }
?>
