<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class Productos extends AbstractSeed
{
    
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('productos');
        $table->truncate();
        $data = [
            ['Nombre' => 'Mancuernas Ajustables', 'Descripcion' => 'Set de mancuernas ajustables para entrenamiento de fuerza', 'Precio' => 149.99, 'Stock' => 30, 'id_categoria' => 1],
            ['Nombre' => 'Bandas de Resistencia', 'Descripcion' => 'Pack de bandas de resistencia para ejercicios variados', 'Precio' => 24.99, 'Stock' => 50, 'id_categoria' => 2],
            ['Nombre' => 'Proteína en Polvo', 'Descripcion' => 'Suplemento de proteína en polvo para la recuperación muscular', 'Precio' => 39.99, 'Stock' => 40, 'id_categoria' => 3],
            ['Nombre' => 'Leggings Deportivos', 'Descripcion' => 'Leggings cómodos y transpirables para actividades deportivas', 'Precio' => 29.99, 'Stock' => 60, 'id_categoria' => 4],
            ['Nombre' => 'Cinta de Correr', 'Descripcion' => 'Máquina de correr para entrenamientos cardiovasculares en casa', 'Precio' => 899.99, 'Stock' => 10, 'id_categoria' => 5],
            ['Nombre' => 'Banco de Pesas', 'Descripcion' => 'Banco de pesas ajustable para entrenamiento de musculación', 'Precio' => 199.99, 'Stock' => 20, 'id_categoria' => 6],
            ['Nombre' => 'Electrolitos en Polvo', 'Descripcion' => 'Suplemento de electrolitos en polvo para hidratación durante el ejercicio', 'Precio' => 14.99, 'Stock' => 80, 'id_categoria' => 7],
            ['Nombre' => 'Rodillo de Espuma', 'Descripcion' => 'Rodillo de espuma para masajes y recuperación muscular', 'Precio' => 19.99, 'Stock' => 35, 'id_categoria' => 8],
            ['Nombre' => 'Smartwatch Deportivo', 'Descripcion' => 'Reloj inteligente con funciones específicas para actividades deportivas', 'Precio' => 129.99, 'Stock' => 15, 'id_categoria' => 9],
        ];
        $table = $this->table('productos');
        $table->insert($data)->save();

    }
}

