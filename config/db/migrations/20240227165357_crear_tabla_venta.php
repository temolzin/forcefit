<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaVenta extends AbstractMigration
{
    
    public function change(): void
    {
        $table = $this->table('venta', ['id' => false, 'primary_key' => 'id_venta']);
        $table
            ->addColumn('id_venta', 'integer', ['limit' => 11, 'identity' => true])
            ->addColumn('id_cliente', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addColumn('Fecha', 'date', ['default' => null, 'null' => true])
            ->addColumn('Total', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => null, 'null' => true])
            ->addIndex('id_cliente')
            ->addForeignKey('id_cliente', 'cliente', 'id_cliente', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addIndex(['id_venta'], ['unique' => true])
            ->save();

    }
}

