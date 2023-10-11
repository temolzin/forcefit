<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaPagoPlanGym extends AbstractMigration
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
        $table = $this->table('pago_plan_gym_cliente', ['id' => false, 'primary_key' => 'id_pago']);
        $table->addColumn('id_pago', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_planGym',  'integer', ['null' => false])
              ->addColumn('id_cliente',  'integer', ['null' => false])
              ->addColumn('cantidad_pago', 'integer', ['null' => true])
              ->addColumn('fecha_hora_pago', 'datetime', ['null' => true])
              ->addColumn('vencimiento', 'date', ['null' => true])
              ->addColumn('tipo_Pago', 'string', ['limit' => 250, 'null' => true])
              ->addIndex('id_planGym')
              ->addIndex('id_cliente')
              ->save();
            
        $table->addForeignKey('id_planGym', 'plan_gym', 'id_planGym');
        $table->addForeignKey('id_cliente', 'cliente', 'id_cliente');
        $table->update();

    }
}