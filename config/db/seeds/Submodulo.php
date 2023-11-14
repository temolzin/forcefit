<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Submodulo extends AbstractSeed
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
