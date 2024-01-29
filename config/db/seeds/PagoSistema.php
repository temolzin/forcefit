<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class PagoSistema extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('pago_plan_sistema');
        $table->truncate();
        //$faker = Factory::create();
        $data = [
            [
			    'id_pago' => 1,
                'id_plan_sistema' => 1,
                'id_usuario' => 2,
                'cantidad_pago' => 3200,
                'fecha_hora_pago' => '2023-08-16 22:36:00',
                'vencimiento' => '2023-09-16',
                'tipo_pago' => 'Tranferencia',
            ],
            [
			    'id_pago' => 2,
                'id_plan_sistema' => 2,
                'id_usuario' => 3,
                'cantidad_pago' => 15000,
                'fecha_hora_pago' => '2023-08-16 22:36:42',
                'vencimiento' => '2024-08-16',
                'tipo_pago' => 'Efectivo',
            ],
            [
			    'id_pago' => 3,
                'id_plan_sistema' => 3,
                'id_usuario' => 5,
                'cantidad_pago' => 2400,
                'fecha_hora_pago' => '2023-08-16 22:37:10',
                'vencimiento' => '2023-08-23',
                'tipo_pago' => 'Efectivo',
            ],
            [
			    'id_pago' => 4,
                'id_plan_sistema' => 2,
                'id_usuario' => 7,
                'cantidad_pago' => 2400,
                'fecha_hora_pago' => '2023-08-16 22:37:10',
                'vencimiento' => '2023-08-23',
                'tipo_pago' => 'Efectivo',
            ],
        ];

       /* $existingUsuarios = $this->fetchAll('SELECT id_usuario FROM usuario WHERE id_rol = 2');
        for ($i = count($data) + 1; $i <= 40; $i++) {
            $fechaInicio = $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d H:i:s');
            $fechaVencimiento = $faker->dateTimeBetween('now', '+1 month +1 day')->format('Y-m-d');
            $data[] = [
                'id_pago' => $i,
                'id_plan_sistema' => $faker->randomElement([1, 2, 3]),
                'id_usuario' => $faker->randomElement($existingUsuarios)['id_usuario'],
                'cantidad_pago' => $faker->numberBetween(1000, 5000),
                'fecha_hora_pago' => $fechaInicio,
                'vencimiento' => $fechaVencimiento,
                'tipo_Pago' => $faker->randomElement(['Transferencia', 'Efectivo', 'Tarjeta']),
            ];
        }*/

        $table->insert($data)->save();
    }
}
