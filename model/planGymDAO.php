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
                :id_plan_gym,
                :id_gimnasio,
                :nombre_plan_gym,
                :descripcion_plan_gym,
                :costo_plan_gym)');

            $query->execute([
                ':id_plan_gym' => null,
                ':id_gimnasio' => $data['id_gimnasio'],
                ':nombre_plan_gym' => $data['nombrePlanGym'],
                ':descripcion_plan_gym' => $data['descripcionPlanGym'],
                ':costo_plan_gym' => $data['costoPlanGym']
            ]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE plan_gym SET  
            nombre_plan_gym = :nombrePlanGym,
            descripcion_plan_gym = :descripcionPlanGym,
            costo_plan_gym = :costoPlanGym
            WHERE id_plan_gym = :id_planGym');

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
            $query = $this->db->conectar()->prepare('DELETE FROM plan_gym where id_plan_gym = :id_planGym');
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
                $planGym->id_planGym = $value['id_plan_gym'];
                $planGym->nombrePlanGym = $value['nombre_plan_gym'];
                $planGym->descripcionPlanGym = $value['descripcion_plan_gym'];
                $planGym->costoPlanGym = $value['costo_plan_gym'];
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
                    $planGym->id_planGym = $value['id_plan_gym'];
                    $planGym->nombrePlanGym = $value['nombre_plan_gym'];
                    array_push($objplanGym, $planGym);
                }
            }else{
                $objplanGym=null;
            }
            return $objplanGym;
        }
    }
?>

