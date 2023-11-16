<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PlanSistema extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'id_plan_sistema' => 1,
                'nombre_plan_sistema' => 'Mensual',
                'descripcion_plan_sistema' => 'Se da el servicio por un mes',
                'costo' => '1500.00',
            ],
            [
                'id_plan_sistema' => 2,
                'nombre_plan_sistema' => 'Anual',
                'descripcion_plan_sistema' => 'Servicio por un año',
                'costo' => '10000.00',
            ],
        ];

        $table = $this->table('plan_sistema');
        $table->insert($data)->save();


    }
}
