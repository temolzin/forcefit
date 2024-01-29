<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaRol extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('rol', ['id' => false, 'primary_key' => 'id_rol']);
        $table->addColumn('id_rol', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_rol', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->save();
    }

}
