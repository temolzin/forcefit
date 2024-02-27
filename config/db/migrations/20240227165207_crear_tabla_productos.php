<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaProductos extends AbstractMigration
{
   
    public function change(): void
    {
        $table = $this->table('productos', ['id' => false, 'primary_key' => 'id_producto']);
        $table
            ->addColumn('id_producto', 'integer', ['limit' => 11, 'identity' => true])
            ->addColumn('Nombre', 'string', ['limit' => 250, 'default' => null, 'null' => true])
            ->addColumn('Descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
            ->addColumn('Precio', 'decimal', ['precision' => 10, 'scale' => 2, 'default' => null, 'null' => true])
            ->addColumn('Stock', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addColumn('Imagen_Producto', 'text', ['default' => null, 'null' => true])
            ->addColumn('id_categoria', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
            ->addIndex('id_categoria')
            ->addForeignKey('id_categoria', 'categoria', 'id_categoria', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addIndex(['id_producto'], ['unique' => true])
            ->save();

    }
}

