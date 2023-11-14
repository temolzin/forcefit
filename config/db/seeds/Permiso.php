<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Permiso extends AbstractSeed
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
        $table = $this->table('permiso');
        $table->truncate();
        $data = [
            [
                'id_permiso' => 1,
                'id_rol' => 1,
                'id_modulo' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 2,
                'id_rol' => 1,
                'id_modulo' => 2,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 3,
                'id_rol' => 1,
                'id_modulo' => 3,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 4,
                'id_rol' => 1,
                'id_modulo' => 4,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 5,
                'id_rol' => 1,
                'id_modulo' => 5,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 6,
                'id_rol' => 1,
                'id_modulo' => 6,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 7,
                'id_rol' => 1,
                'id_modulo' => 7,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 8,
                'id_rol' => 2,
                'id_modulo' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 9,
                'id_rol' => 2,
                'id_modulo' => 2,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 10,
                'id_rol' => 2,
                'id_modulo' => 3,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 11,
                'id_rol' => 2,
                'id_modulo' => 4,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 12,
                'id_rol' => 2,
                'id_modulo' => 5,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 13,
                'id_rol' => 2,
                'id_modulo' => 6,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
            ],
            [
                'id_permiso' => 14,
                'id_rol' => 2,
                'id_modulo' => 7,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 15,
                'id_rol' => 2,
                'id_modulo' => 7,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
            [
                'id_permiso' => 16,
                'id_rol' => 2,
                'id_modulo' => 7,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
            ],
        ];

        $table->insert($data)->save();

    }
}
