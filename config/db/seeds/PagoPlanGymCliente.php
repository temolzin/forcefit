<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PagoPlanGymCliente extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('pago_plan_gym_cliente');
        $table->truncate();
        $data = [
            [
			    'id_pago' => 1,
                'id_planGym' => 2,
                'id_cliente' => 1,
                'cantidad_pago' => 300,
                'fecha_hora_pago' => '2023-08-16 22:36:00',
                'vencimiento' => '2023-09-16',
                'tipo_Pago' => 'Tranferencia',
            ],
            [
			    'id_pago' => 2,
                'id_planGym' => 3,
                'id_cliente' => 3,
                'cantidad_pago' => 5000,
                'fecha_hora_pago' => '2023-08-16 22:36:42',
                'vencimiento' => '2024-08-16',
                'tipo_Pago' => 'Efectivo',
            ],
            [
			    'id_pago' => 3,
                'id_planGym' => 5,
                'id_cliente' => 5,
                'cantidad_pago' => 900,
                'fecha_hora_pago' => '2023-08-16 22:37:10',
                'vencimiento' => '2023-08-23',
                'tipo_Pago' => 'Efectivo',
            ],
            [
			    'id_pago' => 4,
                'id_planGym' => 8,
                'id_cliente' => 8,
                'cantidad_pago' => 700,
                'fecha_hora_pago' => '2023-08-21 15:51:49',
                'vencimiento' => '2023-09-21',
                'tipo_Pago' => 'Tarjeta',
            ],
            [
			    'id_pago' => 5,
                'id_planGym' => 10,
                'id_cliente' => 9,
                'cantidad_pago' => 300,
                'fecha_hora_pago' => '2023-09-04 11:44:12',
                'vencimiento' => '2023-09-11',
                'tipo_Pago' => 'Tarjeta',
            ],
        ];

        $table->insert($data)->save();
    }
}
