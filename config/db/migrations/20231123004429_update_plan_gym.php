<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdatePlanGym extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('plan_gym');
        $table->changeColumn('descripcionPlanGym', 'text');
        $table->update();
    }
}
