<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaGimnasio extends AbstractMigration
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
        $table = $this->table('gimnasio', ['id' => false, 'primary_key' => 'id_gimnasio']);
        $table->addColumn('id_gimnasio', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_gimnasio', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('telefono', 'string', ['limit' => 10, 'default' => null, 'null' => true])
              ->addColumn('imagen', 'text', ['default' => null, 'null' => true])
              ->save();

    }
}
