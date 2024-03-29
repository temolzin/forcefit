<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPagoPlanGym extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pago_plan_gym_cliente', ['id' => false, 'primary_key' => 'id_pago']);
        $table->addColumn('id_pago', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_plan_gym',  'integer', ['null' => false])
              ->addColumn('id_cliente',  'integer', ['null' => false])
              ->addColumn('cantidad_pago', 'integer', ['null' => true])
              ->addColumn('fecha_hora_pago', 'datetime', ['null' => true])
              ->addColumn('vencimiento', 'date', ['null' => true])
              ->addColumn('tipo_pago', 'string', ['limit' => 250, 'null' => true])
              ->addIndex('id_plan_gym')
              ->addIndex('id_cliente')
              ->save();
            
        $table->addForeignKey('id_plan_gym', 'plan_gym', 'id_plan_gym');
        $table->addForeignKey('id_cliente', 'cliente', 'id_cliente');
        $table->update();

    }
}
