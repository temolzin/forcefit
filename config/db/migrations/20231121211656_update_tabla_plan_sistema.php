<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTablaPlanSistema extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('plan_sistema');
        $table->changeColumn('descripcion_plan_sistema', 'text');
        $table->update();
    }
}
