<?php
    class PlanGymDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO plan_gym 
            values (
                :id_planGym,
                :id_gimnasio,
                :nombrePlanGym,
                :descripcionPlanGym, 
                :costoPlanGym)');

            $query->execute([
                ':id_planGym' => null,
                ':id_gimnasio' => $data['id_gimnasio'],
                ':nombrePlanGym' => $data['nombrePlanGym'],
                ':descripcionPlanGym' => $data['descripcionPlanGym'],
                ':costoPlanGym' => $data['costoPlanGym']
            ]);
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
        }

        public function readPlanGymByIdGimnasio($id_gimnasio)
        {
            require_once 'planGymDTO.php';
            $query = "SELECT pg.* FROM plan_gym pg JOIN usuario_gimnasio ug ON pg.id_gimnasio = ug.id_gimnasio
            WHERE ug.id_gimnasio = ".$id_gimnasio." ";
            $objplanGym = array();
            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $planGym = new PlanGymDTO();
                $planGym->id_planGym = $value['id_planGym'];
                $planGym->nombrePlanGym = $value['nombrePlanGym'];
                $planGym->descripcionPlanGym = $value['descripcionPlanGym'];
                $planGym->costoPlanGym = $value['costoPlanGym'];
                $objplanGym[$planGym->id_planGym] = $planGym;
            }
            }
            $objplanGym = array_values($objplanGym);
            return $objplanGym;
        }

        public function readPlanGym($id_gimnasio)
        {
            require_once 'planGymDTO.php';
            $query = "SELECT pg.* FROM plan_gym pg JOIN usuario_gimnasio ug ON pg.id_gimnasio = ug.id_gimnasio
            WHERE ug.id_gimnasio = ".$id_gimnasio." ";
            $objplanGym = array();
            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $planGym = new planGymDTO();
                    $planGym->id_planGym = $value['id_planGym'];
                    $planGym->nombrePlanGym = $value['nombrePlanGym'];
                    array_push($objplanGym, $planGym);
                }
            }else{
                $objplanGym=null;
            }
            return $objplanGym;
        }
    }
?>

