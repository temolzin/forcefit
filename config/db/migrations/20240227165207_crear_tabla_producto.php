<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaProducto extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('producto', ['id' => false, 'primary_key' => 'id_producto']);
        $table->addColumn('id_producto', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('precio', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => null, 'null' => true])
              ->addColumn('stock', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
              ->addColumn('imagen_producto', 'text', ['default' => null, 'null' => true])
              ->addColumn('id_categoria', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
              ->addColumn('id_gimnasio', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
              ->addIndex('id_categoria')
              ->addIndex('id_gimnasio')
              ->save();

        $table->addForeignKey('id_categoria', 'categoria', 'id_categoria');
        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->update();
    }
}

