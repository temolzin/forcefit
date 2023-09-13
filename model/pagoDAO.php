<?php
class PagoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO pago_plan_gym_cliente (`id_pago`, `cantidad_pago`, `fecha_hora_pago`, `vencimiento`, `id_cliente`, `id_planGym`, `tipo_Pago`)
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
            tipo_Pago = :tipoPago
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

    }

    public function readPagoByIdgimnasio($id_gimnasio)
    {
        require_once 'pagoDTO.php';
        $query ="SELECT pg.id_pago, plg.nombrePlanGym, c.nombre_cliente, pg.cantidad_pago, pg.fecha_hora_pago, pg.vencimiento, pg.tipo_Pago
        FROM pago_plan_gym_cliente pg
        INNER JOIN cliente c ON pg.id_cliente = c.id_cliente
        INNER JOIN usuario_gimnasio ug ON c.id_gimnasio = ug.id_gimnasio
        INNER JOIN plan_gym plg ON pg.id_planGym = plg.id_planGym
        WHERE ug.id_gimnasio = ".$id_gimnasio."";
        $objPago = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $pago = new PagoDTO();
            $pago->id_pago = $value['id_pago'];
            $pago->nombrePlanGym = $value['nombrePlanGym'];
            $pago->nombre_cliente = $value['nombre_cliente'];
            $pago->cantidad_pago = $value['cantidad_pago'];
            $pago->fecha_hora_pago = $value['fecha_hora_pago'];
            $pago->vencimiento = $value['vencimiento'];
            $pago->tipo_Pago = $value['tipo_Pago'];
            $objPago['data'][] = $pago;
        }
        
        echo json_encode($objPago, JSON_UNESCAPED_UNICODE);
    }

    public function getCustomersWithPaymentsPerUser($id_usuario) {
        $query = $this->db->conectar()->prepare("
            SELECT DISTINCT c.id_cliente, c.nombre_cliente
            FROM cliente c
            INNER JOIN pago_plan_gym_cliente p ON c.id_cliente = p.id_cliente
            INNER JOIN usuario_gimnasio ug ON c.id_gimnasio = ug.id_gimnasio
            WHERE ug.id_usuario = :id_usuario
        ");
        $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaymentsByCustomerId(&$cliente, $id_cliente)
    {
        $query = $this->db->conectar()->prepare("SELECT c.*, ppgc.*, pg.nombrePlanGym
            FROM cliente AS c
            LEFT JOIN pago_plan_gym_cliente AS ppgc ON c.id_cliente = ppgc.id_cliente
            LEFT JOIN plan_gym AS pg ON ppgc.id_planGym = pg.id_planGym
            WHERE c.id_cliente = :id_cliente
        ");

        $query->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $query->execute();

        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        $cliente['pagos'] = $resultados;
    }
}
