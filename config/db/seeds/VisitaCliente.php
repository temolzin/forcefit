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
        $faker = Factory::create();
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
        
        $existingClientes = $this->fetchAll('SELECT id_cliente FROM cliente');
        $existingGimnasios = $this->fetchAll('SELECT id_gimnasio FROM gimnasio');
        
        for ($i = count($data) + 1; $i <= 60; $i++) {
            $fechaVisita = $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d');
            $horaEntrada = $faker->time('H:i:s');
            $horaSalida = $faker->time('H:i:s', $horaEntrada);
            $data[] = [
                'id_visita' => $i,
                'id_cliente' => $faker->randomElement($existingClientes)['id_cliente'],
                'id_gimnasio' => $faker->randomElement($existingGimnasios)['id_gimnasio'],
                'fecha' => $fechaVisita,
                'hora_entrada' => $horaEntrada,
                'hora_salida' => $horaSalida,
            ];
        }

        $table->insert($data)->save();
    }
}
