<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class VisitaCliente extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
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
