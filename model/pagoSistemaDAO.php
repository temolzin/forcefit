<?php
    class PagoSistemaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO pago_plan_sistema (`id_pago`, `fecha_hora_pago`, `vencimiento`, `id_usuario`, `id_plan_sistema`, `tipo_Pago`, `cantidad_pago`)
                values (null,
                NOW(),
                :vencimientoPago,
                :idUsuario,
                :idPlanSistema,
                :tipoPago,
                :cantidadPago
            )');
            $query->execute([
                ':vencimientoPago' => $data['vencimientoPago'],
                ':idUsuario' => $data['idUsuario'],
                ':idPlanSistema' => $data['idPlanSistema'],
                ':tipoPago' => $data['tipoPago'],
                ':cantidadPago' => $data['cantidadPago']
            ]);

            $values = [
                ':idUser' => $data['idUsuario'],
                ':isEmailNotified' => false
            ];
            $queryUpdateIsEmailNotified = "UPDATE usuario SET isEmailNotified = :isEmailNotified WHERE id_usuario = :idUser";
            $updateIsEmailNotified = $this->db->ejecutarAccion($queryUpdateIsEmailNotified, $values);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE pago_plan_sistema SET  
                fecha_hora_pago = NOW(),
                vencimiento = :vencimientoPago, 
                id_usuario = :idUsuario, 
                id_plan_sistema = :idPlanSistema, 
                tipo_Pago = :tipoPago,
                cantidad_pago = :cantidadPago
                WHERE id_pago = :id_pago');
            $query->execute([
                ':id_pago' => $data['id_PagoActualizar'],
                'vencimientoPago' => $data['vencimientoPago'],
                ':idUsuario' => $data['idUsuario'],
                ':idPlanSistema' => $data['idPlanSistema'],
                ':tipoPago' => $data['tipoPago'],
                ':cantidadPago' => $data['cantidadPago']
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
            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $pagoSistema = new PagoSistemaDTO();
                $pagoSistema->id_pago = $value['id_pago'];
                $pagoSistema->id_usuario = $value['id_usuario'];
                $pagoSistema->id_plan_sistema = $value['id_plan_sistema'];
                $pagoSistema->nombre_plan_sistema = $value['nombre_plan_sistema'];
                $pagoSistema->nombreUsuario = $value['nombreUsuario'];
                $pagoSistema->fecha_hora_pago = $value['fecha_hora_pago'];
                $pagoSistema->vencimiento = $value['vencimiento'];
                $pagoSistema->tipo_Pago = $value['tipo_Pago'];
                $pagoSistema->cantidadPago = $value['cantidad_pago'];
                array_push($objpagoSistema, $pagoSistema);
            }
            }
            $objpagoSistema = array_values($objpagoSistema);
            return $objpagoSistema;
        }
    }
?>
