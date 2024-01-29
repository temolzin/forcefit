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
        //$faker = Factory::create();
        $data = [
            [
                'id_usuario' => 1,
                'nombre' => 'Carmen',
                'apellido_paterno' => 'Lopez',
                'apellido_materno' => 'Martinez',
                'email' => 'carmen@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'CARMEN.JPG',
                'calle' => '5 de febrero',
                'estado' => 'Mexico',
                'municipio' => 'Tecamac',
                'colonia' => 'Centro',
                'codigo_postal' => 55740,
                'telefono' => 5592018371,
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 2,
                'nombre' => 'Elias',
                'apellido_paterno' => 'Garcia',
                'apellido_materno' => 'Lopez',
                'email' => 'elias@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'imagen2.jpg',
                'calle' => '5 de Mayo',
                'estado' => 'Hidalgo',
                'municipio' => 'Huasca',
                'colonia' => 'Manzano',
                'codigo_postal' => 77898,
                'telefono' => 5592784671,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 3,
                'nombre' => 'Sergio',
                'apellido_paterno' => 'Velasco',
                'apellido_materno' => 'Perez',
                'email' => 'sergio@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'chaleco1.png',
                'calle' => 'Cerrada 5 de Mayo',
                'estado' => 'Mexico',
                'municipio' => 'Texcoco',
                'colonia' => 'Centro',
                'codigo_postal' => 55740,
                'telefono' => 5590678371,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 4,
                'nombre' => 'Luis',
                'apellido_paterno' => 'Lopez',
                'apellido_materno' => 'Garcia',
                'email' => 'luis@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'imagen8.jpg',
                'calle' => 'Cerrada 5 de Mayo',
                'estado' => 'Mexico',
                'municipio' => 'Texcoco',
                'colonia' => 'Centro',
                'codigo_postal' => 55740,
                'telefono' => 5578469271,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 5,
                'nombre' => 'Josefina',
                'apellido_paterno' => 'Perez',
                'apellido_materno' => 'Osorio',
                'email' => 'jose@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'imagen10.jpg',
                'calle' => '5 de febrero',
                'estado' => 'Hidalgo',
                'municipio' => 'Pachuca',
                'colonia' => 'Centro',
                'codigo_postal' => 65678,
                'telefono' => 5589763171,
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 6,
                'nombre' => 'Erika',
                'apellido_paterno' => 'Lopez',
                'apellido_materno' => 'San Juan',
                'email' => 'eri@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'imagen4.jpg',
                'calle' => 'Cerrada 5 de Mayo',
                'estado' => 'Mexico',
                'municipio' => 'Texcoco',
                'colonia' => 'Centro',
                'codigo_postal' => 55740,
                'telefono' => 5592906471,
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 7,
                'nombre' => 'Jaime',
                'apellido_paterno' => 'Velasco',
                'apellido_materno' => 'Perez',
                'email' => 'jaime@gmail.com',
                'password_usuario' => sha1('12345'),
                'imagen' => 'imagen8.jpg',
                'calle' => 'Cerrada 5 de Mayo',
                'estado' => 'Mexico',
                'municipio' => 'Texcoco',
                'colonia' => 'Centro',
                'codigo_postal' => 55740,
                'telefono' => 5589560171,
                'id_rol' => 2,
            ],
        ];

        /*for ($i = count($data) + 1; $i <= 40; $i++) {
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
        }*/

        $table->insert($data)->save();

    }
}
