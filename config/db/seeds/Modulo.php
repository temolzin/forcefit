<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Modulo extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('modulo');
        $table->truncate();
        $data = [
            [
                'id_modulo' => 1,
                'nombre_modulo' => 'Dashboard',
                'icono' => 'fa fa-home',
                'posicion' => 1,
            ],
            [
                'id_modulo' => 2,
                'nombre_modulo' => 'Usuarios',
                'icono' => 'fa fa-users',
                'posicion' => 2,
            ],
            [
                'id_modulo' => 3,
                'nombre_modulo' => 'Cliente',
                'icono' => 'fa fa-user',
                'posicion' => 3,
            ],
            [
                'id_modulo' => 4,
                'nombre_modulo' => 'Gimnasio',
                'icono' => 'fa fa-building',
                'posicion' => 4,
            ],
            [
                'id_modulo' => 5,
                'nombre_modulo' => 'PlanGym',
                'icono' => 'fa fa-clipboard',
                'posicion' => 5,
            ],
            [
                'id_modulo' => 6,
                'nombre_modulo' => 'PlanSistema',
                'icono' => 'fa fa-clipboard',
                'posicion' => 6,
            ],
            [
                'id_modulo' => 7,
                'nombre_modulo' => 'Pago',
                'icono' => 'fa fa-money',
                'posicion' => 7,
            ],
            [
                'id_modulo' => 8,
                'nombre_modulo' => 'visitas',
                'icono' => 'fa fa-users',
                'posicion' => 8,
            ],
            [
                'id_modulo' => 9,
                'nombre_modulo' => 'PagoSistema',
                'icono' => 'fa fa-money',
                'posicion' => 9,
            ],
        ];

        $table->insert($data)->save();

    }
}
