<?php
class DashboardDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
    }

    public function update($data)
    {
    }

    public function delete($id)
    {
    }

    public function read()
    {
    }

    public function getMonthlyAndWeeklyRevenueData($id_gimnasio)
    {
        date_default_timezone_set('America/Mexico_City');

        for ($i = 6; $i > -1; $i--) {
            $subtractDaysFromCurrentDate = date("Y-m-d", strtotime("-$i days"));
            $query = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $subtractDaysFromCurrentDate . "%'";
            $query_results = $this->db->consultar($query);
            $daily_Payment_Totals[] = $query_results[0]['cantidad'];
        }

        for ($i = 11; $i > -1; $i--) {
            $subtractMonthsFromCurrentDate = date("Y-m", strtotime("-$i months"));
            $query = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $subtractMonthsFromCurrentDate . "-%'";
            $query_results = $this->db->consultar($query);
            $monthly_Payment_Totals[] = $query_results[0]['cantidad'];;
        }

        $todays_date = date('N');
        $days_of_the_week = array('lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo');
        for ($i = $todays_date - 6; $i <= $todays_date; $i++) {
            $day_Index = ($i - 1 + 7) % 7;
            $order_of_the_days_of_the_week[] = $days_of_the_week[$day_Index];
        }

        $current_month = date('n');
        $months_of_the_year = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'dDiciembre'
        ];
        for ($i = 0; $i < 12; $i++) {
            $month_Index = ($current_month - $i - 1 + 12) % 12;
            $order_of_the_month_of_the_year[] = $months_of_the_year[$month_Index];
        }
        $order_of_the_month_of_the_year = array_reverse($order_of_the_month_of_the_year);

        $response = array(
            'monthly_Payment_Totals' => $monthly_Payment_Totals,
            'daily_Payment_Totals' => $daily_Payment_Totals,
            'order_of_the_days_of_the_week' => $order_of_the_days_of_the_week,
            'order_of_the_month_of_the_year' => $order_of_the_month_of_the_year,
            'current_date' => date("Y-m-d"),
            'last_week' => date("Y-m-d", strtotime("-6 days")),
            'last_year' => date("Y-m-d", strtotime("-11 months"))
        );
        echo json_encode($response);
    }

    public function getClientsAboutMembershipExpiry($id_gimnasio)
    {
        $objCliente = array();
        require_once 'clienteDTO.php';
        require_once __DIR__ . '/../controller/emails/sendExpiredNotificationCustomer.php';

        $query_get_clients = "SELECT DISTINCT c.*, pg.nombrePlanGym, ppg.vencimiento, g.*
        FROM cliente AS c
        INNER JOIN plan_gym AS pg ON c.id_planGym = pg.id_planGym
        INNER JOIN pago_plan_gym_cliente AS ppg ON c.id_cliente = ppg.id_cliente
        INNER JOIN gimnasio AS g ON c.id_gimnasio = g.id_gimnasio
        WHERE ppg.vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        AND ppg.id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND (c.is_email_notified = 0 OR c.is_email_notified IS NULL)";

        if (!is_null($this->db->consultar($query_get_clients))) {
            foreach ($this->db->consultar($query_get_clients) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->email_customer = $value['email_cliente'];
                $cliente->nombre_cliente = $value['nombre_cliente'] . ' ' . $value['apellido_paterno_cliente'];
                $cliente->fecha_vencimiento = $value['vencimiento'];
                $cliente->nombrePlanGym = $value['nombrePlanGym'];
                $cliente->imagen_cliente = '' . $value['nombre_gimnasio'] . '_' . $value['telefono'] . '/' . $value['imagen'];
                $name_gym = $value['nombre_gimnasio'];

                if ($cliente->email_customer  != null) {
                    $sendEmailToCustomer = new sendExpiredNotificationCustomer();
                    $sendEmailToCustomer->sendEmailToCustomer($cliente, $name_gym);

                    $query_update_is_email_notified = "UPDATE cliente SET is_email_notified = 1 WHERE id_cliente = :id_cliente";
                    $values = array(
                        ':id_cliente' => $cliente->id_cliente
                    );

                    $result = $this->db->ejecutarAccion($query_update_is_email_notified, $values);
                }
                $message = "Correos enviados correctamente";
            }
        } else {
            $message = "Ya se le ha notificado a todos los clientes";
        }
        $response = array(
            'message' => $message
        );
        echo json_encode($response);
    }
}
