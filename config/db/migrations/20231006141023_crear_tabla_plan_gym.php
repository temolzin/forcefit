<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPlanGym extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('plan_gym', ['id' => false, 'primary_key' => 'id_planGym']);
        $table->addColumn('id_planGym', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_gimnasio', 'integer', ['limit' => 11,'default' => null, 'null' => false])
              ->addIndex('id_gimnasio')
              ->addColumn('nombrePlanGym', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcionPlanGym', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('costoPlanGym', 'decimal', ['precision' => 9, 'scale' => 2, 'default' => null, 'null' => true])
              ->save();

        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->update();
    }
}
