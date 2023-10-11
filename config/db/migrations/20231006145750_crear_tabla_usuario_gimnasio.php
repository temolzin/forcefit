<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuarioGimnasio extends AbstractMigration
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
        $table = $this->table('usuario_gimnasio', ['id' => false]);
        $table->addColumn('id_usuario', 'integer', ['null' => false])
              ->addColumn('id_gimnasio', 'integer', ['null' => false])
              ->addColumn('id_plan_sistema', 'integer', ['null' => false])
              ->addColumn('fecha_inicio', 'date', ['null' => true])
              ->addColumn('fecha_termino', 'date', ['null' => true])
              ->addColumn('estatus', 'integer', ['limit' => 11, 'null' => true])
              ->addIndex('id_usuario')
              ->addIndex('id_gimnasio')
              ->addIndex('id_plan_sistema')
              ->save();
              
        $table->addForeignKey('id_usuario', 'usuario', 'id_usuario');
        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->addForeignKey('id_plan_sistema', 'plan_sistema', 'id_plan_sistema');
        $table->update();

    }
}
