<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaSubmodulo extends AbstractMigration
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
    public function change()
    {
        $table = $this->table('submodulo', ['id' => false, 'primary_key' => 'id_submodulo']);
    
        $table->addColumn('id_submodulo', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_submodulo', 'string', ['limit' => 30, 'default' => null, 'null' => true])
              ->addColumn('icono', 'text', ['default' => null, 'null' => true])
              ->addColumn('id_modulo', 'integer', ['limit' => 11, 'null' => false])
              ->addIndex('id_modulo')
              ->save();
    
        $table->addForeignKey('id_modulo', 'modulo', 'id_modulo');
        $table->update();
    }
}
