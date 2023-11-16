<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Rol extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('rol');
        $table->truncate();
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

        $table->insert($data)->save();

    }
}
