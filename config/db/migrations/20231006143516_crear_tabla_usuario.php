<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CrearTablaUsuario extends AbstractMigration
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
        $table = $this->table('usuario', ['id' => false, 'primary_key' => 'id_usuario']);
        $table->addColumn('id_usuario', 'integer', ['limit' => 11, 'identity' => true])
              ->addColumn('nombreUsuario', 'string', ['limit' => 30, 'default' => null, 'null' => true])
              ->addColumn('apellidoPaternoUsuario', 'string', ['limit' => 30, 'default' => null, 'null' => true])
              ->addColumn('apellidoMaternoUsuario', 'string', ['limit' => 30, 'default' => null, 'null' => true])
              ->addColumn('emailUsuario', 'string', ['limit' => 30, 'default' => null, 'null' => true])
              ->addColumn('passwordUsuario', 'string', ['limit' => 40, 'default' => null, 'null' => true])
              ->addColumn('imagen', 'text', ['default' => null, 'null' => true])
              ->addColumn('calleUsuario', 'text', ['default' => null, 'null' => true])
              ->addColumn('estadoUsuario', 'text', ['default' => null, 'null' => true])
              ->addColumn('municipioUsuario', 'text', ['default' => null, 'null' => true])
              ->addColumn('coloniaUsuario', 'text', ['default' => null, 'null' => true])
              ->addColumn('codigoPostalUsuario', 'integer', ['limit' => 11, 'default' => null, 'null' => true])
              ->addColumn('id_rol', 'integer', ['limit' => 11, 'default' => null,'null' => false])
              ->addIndex('id_rol')
              ->addColumn('is_active', 'boolean', ['default' => false])
              ->addColumn('telefonoUsuario', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('isEmailNotified', 'boolean', ['null' => true])
              ->save();
    
        $table->addForeignKey('id_rol', 'rol', 'id_rol');
        $table->update();

    }
}
