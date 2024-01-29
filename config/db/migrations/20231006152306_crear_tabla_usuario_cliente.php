<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuarioCliente extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('cliente', ['id' => false, 'primary_key' => 'id_cliente']);
        $table->addColumn('id_cliente', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('id_gimnasio', 'integer', ['null' => false])
              ->addColumn('id_plan_gym', 'integer', ['null' => false])
              ->addColumn('nombre_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('apellido_paterno_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('apellido_materno_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('municipio_cliente', 'string', ['limit' =>250, 'null' => true])
              ->addColumn('colonia_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('calle_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('codigo_postal_cliente', 'string', ['limit' => 30, 'null' => true])
              ->addColumn('numero_cliente', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('imagen_cliente', 'text', ['null' => true])
              ->addColumn('email_cliente', 'string', ['limit' => 250, 'null' => true])
              ->addColumn('is_email_notified', 'boolean', ['null' => true])
              ->addColumn('is_active', 'boolean', ['default' => false])
              ->addIndex('id_gimnasio')
              ->addIndex('id_plan_gym')
              ->save();

        $table->addForeignKey('id_gimnasio', 'gimnasio', 'id_gimnasio');
        $table->addForeignKey('id_plan_gym', 'plan_gym', 'id_plan_gym');
        $table->update();

    }
}
