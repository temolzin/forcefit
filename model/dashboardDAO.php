<?php
class DashboardDAO extends Model implements CRUD
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

    public function gananciasByIdgimnasio($id_gimnasio)
    {
        // echo json_encode($objPago, JSON_UNESCAPED_UNICODE);
        $fechaActual = date("Y-m-d");

        // Inicializa un arreglo para almacenar los resultados
        for ($i = 6; $i > -1; $i--) {
            $fechaRestada = date("Y-m-d", strtotime("-$i days", strtotime($fechaActual)));
            $query = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $fechaRestada . "%'";
            $res = $this->db->consultar($query);
            // La consulta fue exitosa, ahora obtenemos el resultado
            $resultado = $res[0];
            // Obtenemos la suma de cantidad_pago
            $total_pago = (int)$resultado['cantidad'];
            $pagosSemana[] = $total_pago;
        }

        for ($i = 11; $i > -1; $i--) {
            // Resta $i meses a la fecha actual
            $fechaRestada = date("Y-m", strtotime("-$i months", strtotime($fechaActual)));
            $query = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $fechaRestada . "-%'";
            $res = $this->db->consultar($query);
            // La consulta fue exitosa, ahora obtenemos el resultado
            $resultado = $res[0];
            // Obtenemos la suma de cantidad_pago
            $total_pago = (int)$resultado['cantidad'];
            $pagosMes[] = $total_pago;
        }


        $diaActual = date('N');
        $nombresDias = array('lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo');
        $diasSemana = array();
        for ($i = $diaActual - 6; $i <= $diaActual; $i++) {
            $diaIndex = ($i - 1 + 7) % 7; // Calcular el índice del día en el array
            $diasSemana[] = $nombresDias[$diaIndex]; // Agregar el nombre del día al array
        }

        $mesActual = date('n');
        $nombresMeses = [
            'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto',
            'septiembre', 'octubre', 'noviembre', 'diciembre'
        ];
        $mesesAnio = [];
        for ($i = 0; $i < 12; $i++) {
            $indiceMes = ($mesActual - $i - 1 + 12) % 12;
            $mesesAnio[] = $nombresMeses[$indiceMes];
        }
        $mesesAnio = array_reverse($mesesAnio);


        // Crea un arreglo con los datos y lo convierte a JSON
        $response = array('mes' => $pagosMes, 'semana' => $pagosSemana, 'dia' => $diasSemana, 'meses' => $mesesAnio);
        echo json_encode($response);
    }
}
