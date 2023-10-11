<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPlanSistema extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('plan_sistema', ['id' => false, 'primary_key' => 'id_plan_sistema']);
        $table->addColumn('id_plan_sistema', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre_plan_sistema', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('descripcion_plan_sistema', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('costo', 'decimal', ['precision' => 9, 'scale' => 2, 'null' => true])
              ->save();
    }
}
