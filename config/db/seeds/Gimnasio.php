<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Gimnasio extends AbstractSeed
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
                'id_gimnasio' => 1,
                'nombre_gimnasio' => 'cats',
                'telefono' => '7713302789',
                'imagen' => 'logo2.png',
            ],
            [
                'id_gimnasio' => 2,
                'nombre_gimnasio' => 'Gatito',
                'telefono' => '7713302345',
                'imagen' => 'imagen3.jpg',
            ],
            [
                'id_gimnasio' => 3,
                'nombre_gimnasio' => 'Start',
                'telefono' => '5534567867',
                'imagen' => 'imagen3.jpg',
            ],
            [
                'id_gimnasio' => 4,
                'nombre_gimnasio' => 'dogs',
                'telefono' => '7789875433',
                'imagen' => 'BOGUI.jfif',
            ],
        ];

        $table = $this->table('gimnasio');
        $table->insert($data)->save();

    }
}
