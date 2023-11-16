<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaGimnasio extends AbstractMigration
{
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
