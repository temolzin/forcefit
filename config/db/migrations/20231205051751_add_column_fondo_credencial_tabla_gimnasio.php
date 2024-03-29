<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddColumnFondoCredencialTablaGimnasio extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('gimnasio');
        $table->addColumn('fondo_credencial', 'string', ['limit' => 255]);
        $table->update();
    }
}
