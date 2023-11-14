<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaModulo extends AbstractMigration
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
        $table = $this->table('modulo', ['id' => false, 'primary_key' => 'id_modulo']);
    
        $table->addColumn('id_modulo', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_modulo', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('icono', 'text', ['default' => null, 'null' => true])
              ->addColumn('posicion', 'integer', ['limit' => 30, 'default' => null,'null' => true])
              ->save();
    }
}
