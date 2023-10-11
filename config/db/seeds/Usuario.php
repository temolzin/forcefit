<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Usuario extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'id_usuario' => 1,
                'nombreUsuario' => 'Carmen',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'Martinez',
                'emailUsuario' => 'carmen@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'CARMEN.JPG',
                'calleUsuario' => '5 de febrero',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Tecamac',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 2,
                'nombreUsuario' => 'Elias',
                'apellidoPaternoUsuario' => 'Garcia',
                'apellidoMaternoUsuario' => 'Lopez',
                'emailUsuario' => 'elias@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'imagen2.jpg',
                'calleUsuario' => '5 de Mayo',
                'estadoUsuario' => 'Hidalgo',
                'municipioUsuario' => 'Huasca',
                'coloniaUsuario' => 'Manzano',
                'codigoPostalUsuario' => 77898,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 3,
                'nombreUsuario' => 'Sergio',
                'apellidoPaternoUsuario' => 'Velasco',
                'apellidoMaternoUsuario' => 'Perez',
                'emailUsuario' => 'sergio@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'chaleco1.png',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 4,
                'nombreUsuario' => 'Luis',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'Garcia',
                'emailUsuario' => 'luis@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'imagen8.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 5,
                'nombreUsuario' => 'Josefina',
                'apellidoPaternoUsuario' => 'Perez',
                'apellidoMaternoUsuario' => 'Osorio',
                'emailUsuario' => 'jose@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'imagen10.jpg',
                'calleUsuario' => '5 de febrero',
                'estadoUsuario' => 'Hidalgo',
                'municipioUsuario' => 'Pachuca',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 65678,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 6,
                'nombreUsuario' => 'Erika',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'San Juan',
                'emailUsuario' => 'eri@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'imagen4.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 7,
                'nombreUsuario' => 'Jaime',
                'apellidoPaternoUsuario' => 'Velasco',
                'apellidoMaternoUsuario' => 'Perez',
                'emailUsuario' => 'jaime@gmail.com',
                'passwordUsuario' => 'gigi12345',
                'imagen' => 'imagen8.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'id_rol' => 2,
            ],
        ];

        $table = $this->table('usuario');
        $table->insert($data)->save();

    }
}
