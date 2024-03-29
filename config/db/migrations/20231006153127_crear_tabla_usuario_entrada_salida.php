<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuarioEntradaSalida extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('entrada_salida', ['id' => false]);
        $table->addColumn('id_cliente', 'integer',['limit' => 11, 'null' => false])
              ->addColumn('tipo', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('fecha_hora', 'datetime', ['null' => true])
              ->addIndex('id_cliente')
              ->save();
        
        $table->addForeignKey('id_cliente', 'cliente', 'id_cliente');
        $table->update();

    }
}
