<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPermiso extends AbstractMigration
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
        $table = $this->table('permiso', ['id' => false, 'primary_key' => 'id_permiso']);
        $table->addColumn('id_permiso', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_rol', 'integer', ['limit' => 11, 'default' => null, 'null' => false])
              ->addIndex('id_rol')
              ->addColumn('id_modulo', 'integer', ['limit' => 11, 'default' => null, 'null' => false])
              ->addIndex('id_modulo')
              ->addColumn('c', 'integer', ['null' => true])
              ->addColumn('r', 'integer', ['null' => true])
              ->addColumn('u', 'integer', ['null' => true])
              ->addColumn('d', 'integer', ['null' => true])
              ->save();

        $table->addForeignKey('id_rol', 'rol', 'id_rol');
        $table->addForeignKey('id_modulo', 'modulo', 'id_modulo');
        $table->update();

    }
}
