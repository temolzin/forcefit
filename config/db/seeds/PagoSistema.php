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

        $table->insert($data)->save();
    }
}
