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
            $queryWeekly = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $subtractDaysFromCurrentDate . "%'";
            if($id_gimnasio === ""){
                $queryWeekly = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_sistema WHERE fecha_hora_pago LIKE '" . $subtractDaysFromCurrentDate . "%'";
            }
            $query_results = $this->db->consultar($queryWeekly);
            $daily_Payment_Totals[] = $query_results[0]['cantidad'];
        }

        for ($i = 11; $i > -1; $i--) {
            $subtractMonthsFromCurrentDate = date("Y-m", strtotime("-$i months"));
            $queryMonthly = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_gym_cliente WHERE id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND fecha_hora_pago LIKE '" . $subtractMonthsFromCurrentDate . "-%'";
            if($id_gimnasio === ""){
                $queryMonthly = "SELECT SUM(cantidad_pago) as cantidad FROM pago_plan_sistema WHERE fecha_hora_pago LIKE '" . $subtractMonthsFromCurrentDate . "-%'";
            }
            $query_results = $this->db->consultar($queryMonthly);
            $monthly_Payment_Totals[] = $query_results[0]['cantidad'];;
        }

        $todays_date = date('N');
        $days_of_the_week = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
        for ($i = $todays_date - 6; $i <= $todays_date; $i++) {
            $day_Index = ($i - 1 + 7) % 7;
            $order_of_the_days_of_the_week[] = $days_of_the_week[$day_Index];
        }

        $current_month = date('n');
        $months_of_the_year = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
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
        require_once 'clienteDTO.php';
        require_once __DIR__ . '/../controller/emails/sendExpiredNotificationCustomer.php';

        $query_get_clients = "SELECT DISTINCT c.*, pg.nombrePlanGym, ppg.vencimiento, g.*
        FROM cliente AS c
        INNER JOIN plan_gym AS pg ON c.id_planGym = pg.id_planGym
        INNER JOIN pago_plan_gym_cliente AS ppg ON c.id_cliente = ppg.id_cliente
        INNER JOIN gimnasio AS g ON c.id_gimnasio = g.id_gimnasio
        WHERE ppg.vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        AND ppg.id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio) AND (c.is_email_notified = 0 OR c.is_email_notified IS NULL)
        AND c.id_cliente NOT IN (
            SELECT id_cliente
            FROM pago_plan_gym_cliente
            WHERE vencimiento > DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        )";
        $message = 'No hay correos por enviar';
        if (!is_null($this->db->consultar($query_get_clients))) {
            foreach ($this->db->consultar($query_get_clients) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->email_customer = $value['email_cliente'];
                $cliente->nombre_cliente = $value['nombre_cliente'] . ' ' . $value['apellido_paterno_cliente'];
                $cliente->fecha_vencimiento = $value['vencimiento'];
                $cliente->nombrePlanGym = $value['nombrePlanGym'];
                $cliente->imagen_cliente = '' . $value['id_gimnasio'] . '/' . $value['imagen'];
                $name_gym = ' en <strong>'.$value['nombre_gimnasio'];

                if ($cliente->email_customer  != null) {
                    $sendEmailToCustomer = new sendExpiredNotificationCustomer();
                    $result = $sendEmailToCustomer->sendEmailToCustomer($cliente, $name_gym);

                    if($result === true){
                        $queryUpdateUsEmailNotified = "UPDATE cliente SET is_email_notified = 1 WHERE id_cliente = :id_cliente";
                        $values = array(
                            ':id_cliente' => $cliente->id_cliente
                        );
                        $updateIsEmailNotified = $this->db->ejecutarAccion($queryUpdateUsEmailNotified, $values);
                    }
                }
            }
            $message = "Correos enviados correctamente";
        }
        $response = array(
            'message' => $message
        );
        echo json_encode($response);
    }

    public function getUsersAboutMembershipExpiry()
    {
        require_once 'clienteDTO.php';
        require_once __DIR__ . '/../controller/emails/sendExpiredNotificationCustomer.php';

        $query_get_clients = "SELECT DISTINCT u.*, pps.vencimiento, ps.nombre_plan_sistema
        FROM usuario as u
        INNER JOIN pago_plan_sistema as pps ON u.id_usuario = pps.id_usuario
        INNER JOIN plan_sistema as ps ON pps.id_plan_sistema = ps.id_plan_sistema
        WHERE pps.vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        AND (u.isEmailNotified = 0 OR u.isEmailNotified IS NULL)
        AND u.id_usuario NOT IN (
            SELECT id_usuario
            FROM pago_plan_sistema
            WHERE vencimiento > DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        )";
        $message = 'No hay correos por enviar';
        if (!is_null($this->db->consultar($query_get_clients))) {
            foreach ($this->db->consultar($query_get_clients) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_usuario'];
                $cliente->email_customer = $value['emailUsuario'];
                $cliente->nombre_cliente = $value['nombreUsuario'] . ' ' . $value['apellidoPaternoUsuario'];
                $cliente->fecha_vencimiento = $value['vencimiento'];
                $cliente->nombrePlanGym = $value['nombre_plan_sistema'];
                $cliente->imagen_cliente = null;
                $name_gym = null;
                $sendEmailToUser = new sendExpiredNotificationCustomer();
                $result = $sendEmailToUser->sendEmailToCustomer($cliente, $name_gym);

                if($result === true){
                    $query_update_is_email_notified = "UPDATE usuario SET isEmailNotified = 1 WHERE id_usuario = :id_usuario";
                    $values = array(
                        ':id_usuario' => $cliente->id_cliente
                    );
                    $update_is_email_notified = $this->db->ejecutarAccion($query_update_is_email_notified, $values);
                }
            }
            $message = "correos electrónicos enviados correctamente";
        }
        $response = array(
            'message' => $message
        );
        echo json_encode($response);
    }
}
