<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class Categoria extends AbstractSeed
{
    
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('categoria');
        $table->truncate();
        $data = [
            ['id_categoria' => 1, 'nombre' => 'Equipamiento de Entrenamiento', 'descripcion' => 'Productos esenciales para el entrenamiento en el gimnasio'],
            ['id_categoria' => 2, 'nombre' => 'Accesorios para Entrenamiento', 'descripcion' => 'Accesorios que complementan y mejoran la experiencia de entrenamiento'],
            ['id_categoria' => 3, 'nombre' => 'Suplementos Nutricionales', 'descripcion' => 'Productos para complementar la dieta y mejorar el rendimiento'],
            ['id_categoria' => 4, 'nombre' => 'Ropa Deportiva', 'descripcion' => 'Ropa cómoda y especializada para actividades físicas'],
            ['id_categoria' => 5, 'nombre' => 'Aparatos Cardiovasculares', 'descripcion' => 'Equipos para ejercicios cardiovasculares y de resistencia'],
            ['id_categoria' => 6, 'nombre' => 'Aparatos de Musculación', 'descripcion' => 'Equipos diseñados para fortalecer y tonificar los músculos'],
            ['id_categoria' => 7, 'nombre' => 'Hidratación y Nutrición Deportiva', 'descripcion' => 'Productos para mantenerse hidratado y nutrido durante el entrenamiento'],
            ['id_categoria' => 8, 'nombre' => 'Accesorios de Recuperación', 'descripcion' => 'Productos para ayudar en la recuperación muscular y la prevención de lesiones'],
            ['id_categoria' => 9, 'nombre' => 'Electrónica Deportiva', 'descripcion' => 'Dispositivos electrónicos diseñados para el monitoreo y mejora del rendimiento'],
        ];

        $table = $this->table('categoria');
        $table->insert($data)->save();
    

    }
}

