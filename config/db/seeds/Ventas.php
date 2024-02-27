<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class Ventas extends AbstractSeed
{
    
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('ventas');
        $table->truncate();
        $data = [
            ['id_cliente' => 1, 'Fecha' => '2023-01-15', 'Total' => 149.99],
            ['id_cliente' => 2, 'Fecha' => '2023-02-20', 'Total' => 94.98],
            ['id_cliente' => 3, 'Fecha' => '2023-03-10', 'Total' => 159.96],
            ['id_cliente' => 4, 'Fecha' => '2023-04-05', 'Total' => 224.95],
            ['id_cliente' => 5, 'Fecha' => '2023-05-12', 'Total' => 59.98],
            ['id_cliente' => 6, 'Fecha' => '2023-06-18', 'Total' => 549.97],
            ['id_cliente' => 7, 'Fecha' => '2023-07-22', 'Total' => 44.97],
            ['id_cliente' => 8, 'Fecha' => '2023-08-30', 'Total' => 129.99],
            ['id_cliente' => 9, 'Fecha' => '2023-09-08', 'Total' => 384.95],
        ];
        $table = $this->table('ventas');
        $table->insert($data)->save();

    }
}

