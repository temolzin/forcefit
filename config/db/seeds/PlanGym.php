<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PlanGym extends AbstractSeed
{
    public function run(): void
    {
    
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('plan_gym');
        $table->truncate();
        $data = [
            [
                'id_plan_gym' => 1,
                'id_gimnasio' => 1,
                'nombre_plan_gym' => 'Semanal',
                'descripcion_plan_gym' => 'Gimnasio cats ofrece plan semanal',
                'costo_plan_gym' => '300.00',
            ],
            [
                'id_plan_gym' => 2,
                'id_gimnasio' => 1,
                'nombre_plan_gym' => 'Mensual',
                'descripcion_plan_gym' => 'Gimnasio cats ofrece plan Mensual',
                'costo_plan_gym' => '1000.00',
            ],
            [
                'id_plan_gym' => 3,
                'id_gimnasio' => 1,
                'nombre_plan_gym' => 'Anual',
                'descripcion_plan_gym' => 'Gimnasio Cats ofrece plan Anual',
                'costo_plan_gym' => '5000.00',
            ],
            [
                'id_plan_gym' => 4,
                'id_gimnasio' => 2,
                'nombre_plan_gym' => 'Semanal',
                'descripcion_plan_gym' => 'Gimnasio Gatito ofrece plan semanal',
                'costo_plan_gym' => '350.00',
            ],
            [
                'id_plan_gym' => 5,
                'id_gimnasio' => 2,
                'nombre_plan_gym' => 'Mensual',
                'descripcion_plan_gym' => 'Gimnasio Gatito ofrece plan Mensual',
                'costo_plan_gym' => '900.00',
            ],
            [
                'id_plan_gym' => 6,
                'id_gimnasio' => 2,
                'nombre_plan_gym' => 'Anual',
                'descripcion_plan_gym' => 'Gimnasio Gatito ofrece plan Anual',
                'costo_plan_gym' => '7000.00',
            ],
            [
                'id_plan_gym' => 7,
                'id_gimnasio' => 3,
                'nombre_plan_gym' => 'Semanal',
                'descripcion_plan_gym' => 'Gimnasio Start ofrece plan Semanal',
                'costo_plan_gym' => '500.00',
            ],
            [
                'id_plan_gym' => 8,
                'id_gimnasio' => 3,
                'nombre_plan_gym' => 'Mensual',
                'descripcion_plan_gym' => 'Gimnasio Start ofrece plan Mensual',
                'costo_plan_gym' => '700.00',
            ],
            [
                'id_plan_gym' => 9,
                'id_gimnasio' => 3,
                'nombre_plan_gym' => 'Anual',
                'descripcion_plan_gym' => 'Gimnasio Start ofrece plan Anual',
                'costo_plan_gym' => '7000.00',
            ],
            [
                'id_plan_gym' => 10,
                'id_gimnasio' => 4,
                'nombre_plan_gym' => 'Semanal',
                'descripcion_plan_gym' => 'Gimnasio Dogs ofrece plan Semanal',
                'costo_plan_gym' => '300.00',
            ],
            [
                'id_plan_gym' => 11,
                'id_gimnasio' => 4,
                'nombre_plan_gym' => 'Mensual',
                'descripcion_plan_gym' => 'Gimnasio Dogs ofrece plan Mensual',
                'costo_plan_gym' => '700.00',
            ],
            [
                'id_plan_gym' => 12,
                'id_gimnasio' => 4,
                'nombre_plan_gym' => 'Anual',
                'descripcion_plan_gym' => 'Gimnasio Dogs ofrece plan Anual',
                'costo_plan_gym' => '7000.00',
            ],
        ];

        $table->insert($data)->save();

    }
}
