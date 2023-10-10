<?php
    class PagoSistemaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO pago_plan_sistema (`id_pago`, `fecha_hora_pago`, `vencimiento`, `id_usuario`, `id_plan_sistema`, `tipo_Pago`)
                values (null,
                NOW(),
                :vencimientoPago,
                :idUsuario,
                :idPlanSistema,
                :tipoPago
            )');
            $query->execute([
                ':vencimientoPago' => $data['vencimientoPago'],
                ':idUsuario' => $data['idUsuario'],
                ':idPlanSistema' => $data['idPlanSistema'],
                ':tipoPago' => $data['tipoPago']
            ]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE pago_plan_sistema SET  
                fecha_hora_pago = NOW(),
                vencimiento = :vencimientoPago, 
                id_usuario = :idUsuario, 
                id_plan_sistema = :idPlanSistema, 
                tipo_Pago = :tipoPago
                WHERE id_pago = :id_pago');
            $query->execute([
                ':id_pago' => $data['id_PagoActualizar'],
                'vencimientoPago' => $data['vencimientoPago'],
                ':idUsuario' => $data['idUsuario'],
                ':idPlanSistema' => $data['idPlanSistema'],
                ':tipoPago' => $data['tipoPago']
            ]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM pago_plan_sistema where id_pago = :id_pago');
            $query->execute([':id_pago' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'pagoSistemaDTO.php';
            $query = "SELECT ps.*, u.nombreUsuario, ps2.nombre_plan_sistema
                FROM pago_plan_sistema ps
                JOIN usuario u ON ps.id_usuario = u.id_usuario
                JOIN plan_sistema ps2 ON ps.id_plan_sistema = ps2.id_plan_sistema";
            $objpagoSistema = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $pagoSistema = new PagoSistemaDTO();
                $pagoSistema->id_pago = $value['id_pago'];
                $pagoSistema->nombre_plan_sistema = $value['nombre_plan_sistema'];
                $pagoSistema->nombreUsuario = $value['nombreUsuario'];
                $pagoSistema->fecha_hora_pago = $value['fecha_hora_pago'];
                $pagoSistema->vencimiento = $value['vencimiento'];
                $pagoSistema->tipo_Pago = $value['tipo_Pago'];
                array_push($objpagoSistema, $pagoSistema);
            }
            return $objpagoSistema;
        }
    }
?>
