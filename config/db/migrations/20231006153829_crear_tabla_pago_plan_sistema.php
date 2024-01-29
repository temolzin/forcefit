<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPagoPlanSistema extends AbstractMigration
{
    public function change(): void
    {   
        $table = $this->table('pago_plan_sistema', ['id' => false, 'primary_key' => 'id_pago']);
        $table->addColumn('id_pago', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('fecha_hora_pago', 'datetime', ['null' => true])
              ->addColumn('vencimiento', 'date', ['null' => true])
              ->addColumn('id_plan_sistema', 'integer', ['limit' => 11, 'null' => false])
              ->addColumn('id_usuario', 'integer', ['limit' => 11, 'null' => false])
              ->addIndex('id_plan_sistema')
              ->addIndex('id_usuario')
              ->addColumn('tipo_pago', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->save();

        $table->addForeignKey('id_plan_sistema', 'plan_sistema', 'id_plan_sistema');
        $table->addForeignKey('id_usuario', 'usuario', 'id_usuario');
        $table->update();

    }
}
