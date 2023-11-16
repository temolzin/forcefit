<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaModulo extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('modulo', ['id' => false, 'primary_key' => 'id_modulo']);
    
        $table->addColumn('id_modulo', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_modulo', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('icono', 'text', ['default' => null, 'null' => true])
              ->addColumn('posicion', 'integer', ['limit' => 20, 'default' => null,'null' => true])
              ->save();
    
    }
}
