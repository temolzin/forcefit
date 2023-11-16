<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Rol extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'id_rol' => 1,
                'nombreRol' => 'Administrador',
                'descripcion' => 'Encargado de administrar el sistema',
            ],
            [
                'id_rol' => 2,
                'nombreRol' => 'Gerente de gimnasio',
                'descripcion' => 'Encargado de administrar el gimnasio',
            ],
        ];

        $table = $this->table('rol');
        $table->insert($data)->save();

    }
}
