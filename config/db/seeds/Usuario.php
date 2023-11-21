<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class Usuario extends AbstractSeed
{
    public function run(): void
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $table = $this->table('usuario');
        $table->truncate();
        $faker = Factory::create();
        $data = [
            [
                'id_usuario' => 1,
                'nombreUsuario' => 'Carmen',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'Martinez',
                'emailUsuario' => 'carmen@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'CARMEN.JPG',
                'calleUsuario' => '5 de febrero',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Tecamac',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'telefonoUsuario' => 5592018371,
                'emailUsuario' => 'carmen@gmail.com',
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 2,
                'nombreUsuario' => 'Elias',
                'apellidoPaternoUsuario' => 'Garcia',
                'apellidoMaternoUsuario' => 'Lopez',
                'emailUsuario' => 'elias@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'imagen2.jpg',
                'calleUsuario' => '5 de Mayo',
                'estadoUsuario' => 'Hidalgo',
                'municipioUsuario' => 'Huasca',
                'coloniaUsuario' => 'Manzano',
                'codigoPostalUsuario' => 77898,
                'telefonoUsuario' => 5592784671,
                'emailUsuario' => 'elias@gmail.com',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 3,
                'nombreUsuario' => 'Sergio',
                'apellidoPaternoUsuario' => 'Velasco',
                'apellidoMaternoUsuario' => 'Perez',
                'emailUsuario' => 'sergio@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'chaleco1.png',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'telefonoUsuario' => 5590678371,
                'emailUsuario' => 'sergio@gmail.com',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 4,
                'nombreUsuario' => 'Luis',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'Garcia',
                'emailUsuario' => 'luis@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'imagen8.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'telefonoUsuario' => 5578469271,
                'emailUsuario' => 'luis@gmail.com',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 5,
                'nombreUsuario' => 'Josefina',
                'apellidoPaternoUsuario' => 'Perez',
                'apellidoMaternoUsuario' => 'Osorio',
                'emailUsuario' => 'jose@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'imagen10.jpg',
                'calleUsuario' => '5 de febrero',
                'estadoUsuario' => 'Hidalgo',
                'municipioUsuario' => 'Pachuca',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 65678,
                'telefonoUsuario' => 5589763171,
                'emailUsuario' => 'josefina@gmail.com',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 6,
                'nombreUsuario' => 'Erika',
                'apellidoPaternoUsuario' => 'Lopez',
                'apellidoMaternoUsuario' => 'San Juan',
                'emailUsuario' => 'eri@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'imagen4.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'telefonoUsuario' => 5592906471,
                'emailUsuario' => 'erika@gmail.com',
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 7,
                'nombreUsuario' => 'Jaime',
                'apellidoPaternoUsuario' => 'Velasco',
                'apellidoMaternoUsuario' => 'Perez',
                'emailUsuario' => 'jaime@gmail.com',
                'passwordUsuario' => sha1('12345'),
                'imagen' => 'imagen8.jpg',
                'calleUsuario' => 'Cerrada 5 de Mayo',
                'estadoUsuario' => 'Mexico',
                'municipioUsuario' => 'Texcoco',
                'coloniaUsuario' => 'Centro',
                'codigoPostalUsuario' => 55740,
                'telefonoUsuario' => 5589560171,
                'emailUsuario' => 'jaime@gmail.com',
                'id_rol' => 2,
            ],
        ];

        for ($i = count($data) + 1; $i <= 40; $i++) {
            $data[] = [
                'id_usuario' => $i,
                'nombreUsuario' => $faker->firstName,
                'apellidoPaternoUsuario' => $faker->lastName,
                'apellidoMaternoUsuario' => $faker->lastName,
                'emailUsuario' => $faker->email,
                'passwordUsuario' => sha1('12345'),
                'telefonoUsuario' => $faker->phoneNumber,
                'imagen' => null,
                'calleUsuario' => $faker->streetAddress,
                'estadoUsuario' => $faker->state,
                'municipioUsuario' => $faker->city,
                'coloniaUsuario' => $faker->word,
                'codigoPostalUsuario' => $faker->postcode,
                'id_rol' => 2,
            ];
        }

        $table->insert($data)->save();

    }
}
