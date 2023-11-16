<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class VisitaCliente extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('visita_cliente', ['id' => false, 'primary_key' => ' id_visita']);
        $table->addColumn(' id_visita', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_cliente', 'integer', ['limit' => 11, 'null' => false])
              ->addColumn('id_gimnasio', 'integer', ['limit' => 11, 'null' => false])
              ->addColumn('fecha', 'date', ['null' => true])
              ->addColumn('hora_entrada', 'time')
              ->addColumn('hora_salida', 'time')
              ->save();

        $table->addForeignKey('id_cliente', 'cliente', 'id_cliente');
        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->update();

    }
}
