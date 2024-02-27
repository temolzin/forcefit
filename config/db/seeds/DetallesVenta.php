<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class DetallesVenta extends AbstractSeed
{
   
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('ventas');
        $table->truncate();
        $data = [
            ['id_venta' => 1, 'id_producto' => 1, 'Cantidad' => 2, 'Precio_Unitario' => 74.99, 'Subtotal' => 149.98],
            ['id_venta' => 2, 'id_producto' => 3, 'Cantidad' => 3, 'Precio_Unitario' => 31.66, 'Subtotal' => 94.98],
            ['id_venta' => 3, 'id_producto' => 5, 'Cantidad' => 4, 'Precio_Unitario' => 39.99, 'Subtotal' => 159.96],
            ['id_venta' => 4, 'id_producto' => 7, 'Cantidad' => 5, 'Precio_Unitario' => 44.99, 'Subtotal' => 224.95],
            ['id_venta' => 5, 'id_producto' => 2, 'Cantidad' => 2, 'Precio_Unitario' => 29.99, 'Subtotal' => 59.98],
            ['id_venta' => 6, 'id_producto' => 6, 'Cantidad' => 1, 'Precio_Unitario' => 549.97, 'Subtotal' => 549.97],
            ['id_venta' => 7, 'id_producto' => 8, 'Cantidad' => 3, 'Precio_Unitario' => 14.99, 'Subtotal' => 44.97],
            ['id_venta' => 8, 'id_producto' => 4, 'Cantidad' => 1, 'Precio_Unitario' => 129.99, 'Subtotal' => 129.99],
            ['id_venta' => 9, 'id_producto' => 9, 'Cantidad' => 2, 'Precio_Unitario' => 192.48, 'Subtotal' => 384.95],
        ];
        $table = $this->table('detalles_venta');
        $table->insert($data)->save();

    }
}

