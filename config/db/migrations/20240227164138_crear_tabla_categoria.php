<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;


final class CrearTablaCategoria extends AbstractMigration
{
    
    public function change(): void
    {
        $tableCategoria = $this->table('categoria', ['id' => false, 'primary_key' => 'id_categoria']);
        $tableCategoria
            ->addColumn('id_categoria', 'integer', ['limit' => 11])
            ->addColumn('nombre', 'string', ['limit' => 250, 'default' => null, 'null' => true])
            ->addColumn('descripcion', 'string', ['limit' => 250, 'default' => null, 'null' => true])
            ->addIndex(['id_categoria'], ['unique' => true])
            ->save();

    }
}

