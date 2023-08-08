<?php
class PagoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO pago_plan_gym_cliente (`id_pago`, `cantidad_pago`, `fecha_hora_pago`, `vencimiento`, `id_cliente`, `id_planGym`, `tipo_dePago`) 
            values (null, 
            :cantidadPago,
            NOW(), 
            :vencimientoPago, 
            :idCliente, 
            :idPlanGym,
            :tipoPago
        )');
        $query->execute([
            ':cantidadPago' => $data['cantidadPago'],
            ':vencimientoPago' => $data['vencimientoPago'],
            ':idCliente' => $data['idCliente'],
            ':idPlanGym' => $data['idPlanGym'],
            ':tipoPago' => $data['tipoPago']
        ]);
        echo 'ok';
    }
    

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE pago_plan_gym_cliente SET  
            cantidad_pago = :cantidadPago,
            fecha_hora_pago = NOW(),
            vencimiento = :vencimientoPago, 
            id_cliente = :idCliente, 
            id_planGym = :idPlanGym, 
            tipo_dePago = :tipoPago 
            WHERE id_pago = :id_pago');
        $query->execute([
            ':id_pago' => $data['id_PagoActualizar'],
            ':cantidadPago' => $data['cantidadPago'],
            'vencimientoPago' => $data['vencimientoPago'],
            ':idCliente' => $data['idCliente'],
            ':idPlanGym' => $data['idPlanGym'],
            ':tipoPago' => $data['tipoPago']
        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM pago_plan_gym_cliente where id_pago = :id_pago');
        $query->execute([':id_pago' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'pagoDTO.php';
        $query = "SELECT pg.id_pago, pg.cantidad_pago, pg.fecha_hora_pago, pg.vencimiento, c.nombre_cliente, plg.nombrePlanGym, pg.tipo_dePago
        FROM pago_plan_gym_cliente pg
        JOIN cliente c ON pg.id_cliente = c.id_cliente
        JOIN plan_gym plg ON pg.id_planGym = plg.id_planGym";
        $objPago = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $pago = new PagoDTO();
            $pago->id_pago = $value['id_pago'];
            $pago->cantidad_pago = $value['cantidad_pago'];
            $pago->fecha_hora_pago = $value['fecha_hora_pago'];
            $pago->vencimiento = $value['vencimiento'];
            $pago->nombre_cliente = $value['nombre_cliente'];
            $pago->nombrePlanGym = $value['nombrePlanGym'];
            $pago->tipo_dePago = $value['tipo_dePago'];
            $objPago['data'][] = $pago;
        }
        
        echo json_encode($objPago, JSON_UNESCAPED_UNICODE);
    }

  
}
