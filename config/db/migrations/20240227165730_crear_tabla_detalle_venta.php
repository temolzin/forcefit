<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaDetalleVenta extends AbstractMigration
{
    
    public function change(): void
    {
        $table = $this->table('detalle_venta', ['id' => false, 'primary_key' => 'id_detalle']);
        $table
            ->addColumn('id_detalle', 'integer', ['limit' => 11, 'identity' => true])
            ->addColumn('id_venta', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addColumn('id_producto', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addColumn('Cantidad', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addColumn('Precio_Unitario', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => null, 'null' => true])
            ->addColumn('Subtotal', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => null, 'null' => true])
            ->addIndex('id_venta')
            ->addIndex('id_producto')
            ->addForeignKey('id_venta', 'venta', 'id_venta', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addForeignKey('id_producto', 'producto', 'id_producto', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addIndex(['id_detalle'], ['unique' => true])
            ->save();

    }
}

