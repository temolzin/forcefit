<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTablaRol extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('rol');
        $table->changeColumn('descripcion', 'text');
        $table->update();
    }
}
