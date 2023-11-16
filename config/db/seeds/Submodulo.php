<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Submodulo extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('submodulo');
        $table->truncate();
        $data = [
            [
                'id_submodulo' => 1,
                'nombre_submodulo' => 'Rol',
                'icono' => null,
                'id_modulo' => 2,
            ],
            [
                'id_submodulo' => 2,
                'nombre_submodulo' => 'Usuario',
                'icono' => null,
                'id_modulo' => 2,
            ],
        ];

        $table->insert($data)->save();

    }
}
