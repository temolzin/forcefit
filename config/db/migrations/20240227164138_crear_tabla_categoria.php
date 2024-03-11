<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;


final class CrearTablaCategoria extends AbstractMigration
{
    
    public function change(): void
    {
        $table = $this->table('categoria', ['id' => false, 'primary_key' => 'id_categoria']);
        $table->addColumn('id_categoria', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_gimnasio', 'integer', ['limit' => 11,'default' => null, 'null' => false])
              ->addIndex('id_gimnasio')
              ->addColumn('nombre', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->save();

        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->update();

    }
}

