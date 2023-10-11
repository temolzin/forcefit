<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuarioCliente extends AbstractMigration
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
        $table = $this->table('cliente', ['id' => false, 'primary_key' => 'id_cliente']);
        $table->addColumn('id_cliente', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_gimnasio', 'integer', ['null' => false])
              ->addColumn('id_planGym', 'integer', ['null' => false])
              ->addColumn('nombre_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('apellido_paterno_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('apellido_materno_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('municipio_cliente', 'string', ['limit' => 60, 'null' => true])
              ->addColumn('colonia_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('calle_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('codigo_postal_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('numero_cliente', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('imagen_cliente', 'text', ['null' => true])
              ->addColumn('email_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('is_email_notified', 'boolean', ['null' => true])
              ->addColumn('is_active', 'boolean', ['default' => false])
              ->addIndex('id_gimnasio')
              ->addIndex('id_planGym')
              ->save();

        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->addForeignKey('id_planGym', 'plan_gym', 'id_planGym');
        $table->update();

    }
}
