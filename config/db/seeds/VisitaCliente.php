<?php


use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class VisitaCliente extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('visita_cliente');
        $table->truncate();
        $data = [
            [
                'id_visita' => 1,
                'id_cliente' => 1,
                'id_gimnasio' => 3,
                'fecha' => '2023-08-18',
                'hora_entrada' => '17:36:42',
                'hora_salida' => '21:36:42',
            ]
        ];

        $table->insert($data)->save();
    }
}
