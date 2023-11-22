<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class PagoPlanGymCliente extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('pago_plan_gym_cliente');
        $table->truncate();
        $faker = Factory::create();
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

        $existingUsuarios = $this->fetchAll('SELECT id_cliente FROM cliente ');
        for ($i = count($data) + 1; $i <= 60; $i++) {
            $fechaInicio = $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d H:i:s');
            $fechaVencimiento = $faker->dateTimeBetween('now', '+1 month +1 day')->format('Y-m-d');
            $data[] = [
                'id_pago' => $i,
                'id_planGym' => $faker->randomElement([4, 5, 6]),
                'id_cliente' => $faker->randomElement($existingUsuarios)['id_cliente'],
                'cantidad_pago' => $faker->numberBetween(1000, 5000),
                'fecha_hora_pago' => $fechaInicio,
                'vencimiento' => $fechaVencimiento,
                'tipo_Pago' => $faker->randomElement(['Transferencia', 'Efectivo', 'Tarjeta']),
            ];
        }

        $table->insert($data)->save();
    }
}
