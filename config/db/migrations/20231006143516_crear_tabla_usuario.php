<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuario extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('usuario', ['id' => false, 'primary_key' => 'id_usuario']);
        $table->addColumn('id_usuario', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombre', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('apellido_paterno', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('apellido_materno', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('email', 'string', ['limit' => 250, 'default' => null, 'null' => true])
              ->addColumn('password_usuario', 'string', ['limit' => 40, 'default' => null, 'null' => true])
              ->addColumn('imagen', 'text', ['default' => null, 'null' => true])
              ->addColumn('calle', 'text', ['default' => null, 'null' => true])
              ->addColumn('estado', 'text', ['default' => null, 'null' => true])
              ->addColumn('municipio', 'text', ['default' => null, 'null' => true])
              ->addColumn('colonia', 'text', ['default' => null, 'null' => true])
              ->addColumn('codigo_postal', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
              ->addColumn('id_rol', 'integer', ['limit' => 11, 'default' => null,'null' => false])
              ->addIndex('id_rol')
              ->addColumn('is_active', 'boolean', ['default' => false])
              ->addColumn('telefono', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('is_email_notified', 'boolean', ['null' => true])
              ->save();
    
        $table->addForeignKey('id_rol', 'rol', 'id_rol');
        $table->update();

    }
}
