<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class UsuarioGimnasio extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('usuario_gimnasio');
        $table->truncate();
        //$faker = Factory::create();
        $data = [
            [
                'id_usuario' => 2,
                'id_gimnasio' => 1,
                'id_plan_sistema' => 1,
                'fecha_inicio' => '2023-08-18',
                'fecha_termino' => null,
                'estatus' => null,
            ],
            [
                'id_usuario' => 3,
                'id_gimnasio' => 2,
                'id_plan_sistema' => 2,
                'fecha_inicio' => '2023-08-21',
                'fecha_termino' => null,
                'estatus' => null,
            ],
            [
                'id_usuario' => 4,
                'id_gimnasio' => 3,
                'id_plan_sistema' => 3,
                'fecha_inicio' => '2023-08-21',
                'fecha_termino' => null,
                'estatus' => null,
            ],
            [
                'id_usuario' => 7,
                'id_gimnasio' => 4,
                'id_plan_sistema' => 2,
                'fecha_inicio' => '2023-08-22',
                'fecha_termino' => null,
                'estatus' => null,
            ],
        ];

        /*$existingGimnasios = $this->fetchAll('SELECT id_gimnasio FROM gimnasio');
        $existingUsuarios = $this->fetchAll('SELECT id_usuario FROM usuario');
        for ($i = count($data) + 1; $i <= 40; $i++) {
            $data[] = [
                'id_usuario' => $faker->randomElement($existingUsuarios)['id_usuario'],
                'id_gimnasio' =>  $faker->randomElement($existingGimnasios)['id_gimnasio'],
                'id_plan_sistema' => $faker->randomElement([1, 2, 3]),
                'fecha_inicio' => $faker->date('Y-m-d'),
                'fecha_termino' => null,
                'estatus' => null,
            ];
        }*/

        $table->insert($data)->save();

    }
}
