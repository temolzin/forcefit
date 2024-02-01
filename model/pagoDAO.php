<?php
class PagoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO pago_plan_gym_cliente (`id_pago`, `cantidad_pago`, `fecha_hora_pago`, `vencimiento`, `id_cliente`, `id_plan_gym`, `tipo_pago`)
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

        $values = [
            ':idUser' => $data['idCliente'],
            ':isEmailNotified' => false
        ];
        $queryUpdateIsEmailNotified = "UPDATE cliente SET is_email_notified = :isEmailNotified WHERE id_cliente = :idUser";
        $updateIsEmailNotified = $this->db->ejecutarAccion($queryUpdateIsEmailNotified, $values);
        echo 'ok';
    }
    

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE pago_plan_gym_cliente SET  
            cantidad_pago = :cantidadPago,
            fecha_hora_pago = NOW(),
            vencimiento = :vencimientoPago, 
            id_cliente = :idCliente, 
            id_plan_gym = :idPlanGym,
            tipo_pago = :tipoPago
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

    public function getPagoInfoByCliente($id_cliente)
    {
        require_once 'planGymDTO.php';
        $query = "SELECT
        c.nombre_cliente,
        c.apellido_paterno_cliente,
        g.nombre_gimnasio,
        pg.id_plan_gym,
        pg.nombre_plan_gym,
        pg.costo_plan_gym
        FROM
        cliente c
        JOIN
        gimnasio g ON c.id_gimnasio = g.id_gimnasio
        JOIN
        plan_gym pg ON c.id_plan_gym = pg.id_plan_gym
        WHERE
        c.id_cliente = ".$id_cliente.";";
        $result = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $info = new PlanGymDTO();
                $info->id_planGym = $value['id_plan_gym'];
                $info->costoPlanGym = $value['costo_plan_gym'];
                $info->nombrePlanGym = $value['nombre_plan_gym'];
                array_push($result, $info);
            }
        }
        $result = array_values($result);
        return $result;
    }


    public function readPagoByIdgimnasio($id_gimnasio)
    {
        require_once 'pagoDTO.php';
        $query ="SELECT pg.id_pago, pg.id_cliente, pg.id_plan_gym, plg.nombre_plan_gym, c.nombre_cliente, pg.cantidad_pago, pg.fecha_hora_pago, pg.vencimiento, pg.tipo_pago
        FROM pago_plan_gym_cliente pg
        INNER JOIN cliente c ON pg.id_cliente = c.id_cliente
        INNER JOIN usuario_gimnasio ug ON c.id_gimnasio = ug.id_gimnasio
        INNER JOIN plan_gym plg ON pg.id_plan_gym = plg.id_plan_gym
        WHERE ug.id_gimnasio = ".$id_gimnasio."";
        $objPago = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $pago = new PagoDTO();
            $pago->id_pago = $value['id_pago'];
            $pago->id_cliente = $value['id_cliente'];
            $pago->id_planGym = $value['id_plan_gym'];
            $pago->nombrePlanGym = $value['nombre_plan_gym'];
            $pago->nombre_cliente = $value['nombre_cliente'];
            $pago->cantidad_pago = $value['cantidad_pago'];
            $pago->fecha_hora_pago = $value['fecha_hora_pago'];
            $pago->vencimiento = $value['vencimiento'];
            $pago->tipo_Pago = $value['tipo_pago'];
            array_push($objPago, $pago);
        }
        }
        return $objPago;
    }

    public function getCustomersWithPaymentsPerUser($id_usuario)
    {
        $query = $this->db->conectar()->prepare("
            SELECT DISTINCT c.id_cliente, c.nombre_cliente,  c.apellido_paterno_cliente, c.apellido_materno_cliente
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
        $query = $this->db->conectar()->prepare("SELECT c.*, ppgc.*, pg.nombre_plan_gym
            FROM cliente AS c
            LEFT JOIN pago_plan_gym_cliente AS ppgc ON c.id_cliente = ppgc.id_cliente
            LEFT JOIN plan_gym AS pg ON ppgc.id_plan_gym = pg.id_plan_gym
            WHERE c.id_cliente = :id_cliente
        ");

        $query->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $query->execute();

        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        $cliente['pagos'] = $resultados;
    }

    public function getCustomerPaymentDetails(&$clientePagoRecibo, $id_pago)
    {
        $query = $this->db->conectar()->prepare("SELECT pp.*, c.*, pg.nombre_plan_gym
            FROM pago_plan_gym_cliente pp
            INNER JOIN cliente c ON pp.id_cliente = c.id_cliente
            INNER JOIN plan_gym pg ON pp.id_plan_gym = pg.id_plan_gym
            WHERE pp.id_pago = :id_pago
        ");

        $query->bindParam(':id_pago', $id_pago, PDO::PARAM_INT);
        $query->execute();

        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        $clientePagoRecibo = $resultados[0];
    }
}
