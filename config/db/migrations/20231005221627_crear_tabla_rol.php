<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaRol extends AbstractMigration
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
        $table = $this->table('rol', ['id' => false, 'primary_key' => 'id_rol']);
        $table->addColumn('id_rol', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombreRol', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->save();
    }

}
