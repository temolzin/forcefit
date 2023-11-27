<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTablaPagoPlanSistema extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pago_plan_sistema');
        $table->addColumn('cantidad_pago', 'float', ['default' => null, 'null' => false]);
        $table->update();
    }
}
