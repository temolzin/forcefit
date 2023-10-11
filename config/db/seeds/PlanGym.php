<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PlanGym extends AbstractSeed
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
        $data = [
            [
                'id_planGym' => 1,
                'id_gimnasio' => 1,
                'nombrePlanGym' => 'Semanal',
                'descripcionPlanGym' => 'Gimnasio cats ofrece plan semanal',
                'costoPlanGym' => '300.00',
            ],
            [
                'id_planGym' => 2,
                'id_gimnasio' => 1,
                'nombrePlanGym' => 'Mensual',
                'descripcionPlanGym' => 'Gimnasio cats ofrece plan Mensual',
                'costoPlanGym' => '1000.00',
            ],
            [
                'id_planGym' => 3,
                'id_gimnasio' => 1,
                'nombrePlanGym' => 'Anual',
                'descripcionPlanGym' => 'Gimnasio Cats ofrece plan Anual',
                'costoPlanGym' => '5000.00',
            ],
            [
                'id_planGym' => 4,
                'id_gimnasio' => 2,
                'nombrePlanGym' => 'Semanal',
                'descripcionPlanGym' => 'Gimnasio Gatito ofrece plan semanal',
                'costoPlanGym' => '350.00',
            ],
            [
                'id_planGym' => 5,
                'id_gimnasio' => 2,
                'nombrePlanGym' => 'Mensual',
                'descripcionPlanGym' => 'Gimnasio Gatito ofrece plan Mensual',
                'costoPlanGym' => '900.00',
            ],
            [
                'id_planGym' => 6,
                'id_gimnasio' => 2,
                'nombrePlanGym' => 'Anual',
                'descripcionPlanGym' => 'Gimnasio Gatito ofrece plan Anual',
                'costoPlanGym' => '7000.00',
            ],
            [
                'id_planGym' => 7,
                'id_gimnasio' => 3,
                'nombrePlanGym' => 'Semanal',
                'descripcionPlanGym' => 'Gimnasio Start ofrece plan Semanal',
                'costoPlanGym' => '500.00',
            ],
            [
                'id_planGym' => 8,
                'id_gimnasio' => 3,
                'nombrePlanGym' => 'Mensual',
                'descripcionPlanGym' => 'Gimnasio Start ofrece plan Mensual',
                'costoPlanGym' => '700.00',
            ],
            [
                'id_planGym' => 9,
                'id_gimnasio' => 3,
                'nombrePlanGym' => 'Anual',
                'descripcionPlanGym' => 'Gimnasio Start ofrece plan Anual',
                'costoPlanGym' => '7000.00',
            ],
            [
                'id_planGym' => 10,
                'id_gimnasio' => 4,
                'nombrePlanGym' => 'Semanal',
                'descripcionPlanGym' => 'Gimnasio Dogs ofrece plan Semanal',
                'costoPlanGym' => '300.00',
            ],
            [
                'id_planGym' => 11,
                'id_gimnasio' => 4,
                'nombrePlanGym' => 'Mensual',
                'descripcionPlanGym' => 'Gimnasio Dogs ofrece plan Mensual',
                'costoPlanGym' => '700.00',
            ],
            [
                'id_planGym' => 12,
                'id_gimnasio' => 4,
                'nombrePlanGym' => 'Anual',
                'descripcionPlanGym' => 'Gimnasio Dogs ofrece plan Anual',
                'costoPlanGym' => '7000.00',
            ],
        ];

        $table = $this->table('plan_gym');
        $table->insert($data)->save();

    }
}
