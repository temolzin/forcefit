<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPlanGym extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('plan_gym', ['id' => false, 'primary_key' => 'id_plan_gym']);
        $table->addColumn('id_plan_gym', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_gimnasio', 'integer', ['limit' => 11,'default' => null, 'null' => false])
              ->addIndex('id_gimnasio')
              ->addColumn('nombre_plan_gym', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('descripcion_plan_gym', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('costo_plan_gym', 'decimal', ['precision' => 9, 'scale' => 2, 'default' => null, 'null' => true])
              ->save();

        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->update();
    }
}
