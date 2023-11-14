<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UsuarioGimnasio extends AbstractSeed
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
        $table = $this->table('usuario_gimnasio');
        $table->truncate();
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
                'id_plan_sistema' => 1,
                'fecha_inicio' => '2023-08-21',
                'fecha_termino' => null,
                'estatus' => null,
            ],
            [
                'id_usuario' => 5,
                'id_gimnasio' => 4,
                'id_plan_sistema' => 2,
                'fecha_inicio' => '2023-08-22',
                'fecha_termino' => null,
                'estatus' => null,
            ],
        ];

        $table->insert($data)->save();

    }
}
