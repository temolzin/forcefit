<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UsuarioGimnasio extends AbstractSeed
{
    public function run(): void
    {
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

            $table = $this->table('usuario_gimnasio');
            $table->insert($data)->save();

    }
}
