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
}
