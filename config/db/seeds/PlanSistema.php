<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PlanSistema extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('plan_sistema');
        $table->truncate();
        $data = [
            [
                'id_plan_sistema' => 1,
                'nombre_plan_sistema' => 'Mensual',
                'descripcion_plan_sistema' => 'Se da el servicio por un mes',
                'costo' => '3000.00',
            ],
            [
                'id_plan_sistema' => 2,
                'nombre_plan_sistema' => 'Anual',
                'descripcion_plan_sistema' => 'Servicio por un año',
                'costo' => '20400.00',
            ],
            [
                'id_plan_sistema' => 3,
                'nombre_plan_sistema' => 'Quincenal',
                'descripcion_plan_sistema' => 'Servicio por cada quince semanas',
                'costo' => '2300.00',
            ],
        ];

        $table->insert($data)->save();


    }
}
