<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Cliente extends AbstractSeed
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
			    'id_cliente' => 1,
                'id_gimnasio' => 1,
                'id_planGym' => 1,
                'nombre_cliente' => 'Erika',
                'apellido_paterno_cliente' => 'Lopez',
                'apellido_materno_cliente' => 'Velasco',
                'municipio_cliente' => 'Tecamac',
                'colonia_cliente' => 'Felipe villa Nueva',
                'calle_cliente' => 'Calvario',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '5589098567',
                'imagen_cliente' => 'imagen3.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 2,
                'id_gimnasio' => 1,
                'id_planGym' => 2,
                'nombre_cliente' => 'Martin',
                'apellido_paterno_cliente' => 'Garcia',
                'apellido_materno_cliente' => 'Martinez',
                'municipio_cliente' => 'Tecamac',
                'colonia_cliente' => 'tecamac',
                'calle_cliente' => '5 de Marzo',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '7754323456',
                'imagen_cliente' => 'imagen1.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 3,
                'id_gimnasio' => 1,
                'id_planGym' => 3,
                'nombre_cliente' => 'Cecilia',
                'apellido_paterno_cliente' => 'Lopez',
                'apellido_materno_cliente' => 'Garcia',
                'municipio_cliente' => 'Texcoco',
                'colonia_cliente' => 'Centro',
                'calle_cliente' => 'Boca negra',
                'codigo_postal_cliente' => '66789',
                'numero_cliente' => '7765432457',
                'imagen_cliente' => 'imagen10.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 4,
                'id_gimnasio' => 2,
                'id_planGym' => 4,
                'nombre_cliente' => 'Monserat',
                'apellido_paterno_cliente' => 'Osorio',
                'apellido_materno_cliente' => 'Lopez',
                'municipio_cliente' => 'tecamac',
                'colonia_cliente' => 'Felipe villa Nueva',
                'calle_cliente' => 'Calvario',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '5567865434',
                'imagen_cliente' => 'imagen10.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 5,
                'id_gimnasio' => 2,
                'id_planGym' => 5,
                'nombre_cliente' => 'Gerardo',
                'apellido_paterno_cliente' => 'Garcia',
                'apellido_materno_cliente' => 'San juan',
                'municipio_cliente' => 'Tecamac',
                'colonia_cliente' => 'tecamac',
                'calle_cliente' => 'Calvario',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '5678765432',
                'imagen_cliente' => 'imagen9.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 6,
                'id_gimnasio' => 2,
                'id_planGym' => 6,
                'nombre_cliente' => 'Alberto',
                'apellido_paterno_cliente' => 'Perez',
                'apellido_materno_cliente' => 'Perez',
                'municipio_cliente' => 'San Juan',
                'colonia_cliente' => '5 De mayo',
                'calle_cliente' => 'cen',
                'codigo_postal_cliente' => '89876',
                'numero_cliente' => '897654345',
                'imagen_cliente' => null,
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 7,
                'id_gimnasio' => 3,
                'id_planGym' => 7,
                'nombre_cliente' => 'Luciana',
                'apellido_paterno_cliente' => 'López',
                'apellido_materno_cliente' => 'San juan',
                'municipio_cliente' => 'San Bartolo',
                'colonia_cliente' => 'Centro',
                'calle_cliente' => '5 de Agosto',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '7719028008',
                'imagen_cliente' => 'imagen4.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 8,
                'id_gimnasio' => 3,
                'id_planGym' => 8,
                'nombre_cliente' => 'Gerardo',
                'apellido_paterno_cliente' => 'Garcia',
                'apellido_materno_cliente' => 'Martinez',
                'municipio_cliente' => 'Tecamac',
                'colonia_cliente' => 'Felipe villa Nueva',
                'calle_cliente' => '5 de Marzo',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '7754323456',
                'imagen_cliente' => 'imagen7.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
            [
			    'id_cliente' => 9,
                'id_gimnasio' => 4,
                'id_planGym' => 10,
                'nombre_cliente' => 'Jesus',
                'apellido_paterno_cliente' => 'Lopez',
                'apellido_materno_cliente' => 'Martinez',
                'municipio_cliente' => 'Tecamac',
                'colonia_cliente' => 'tecamac',
                'calle_cliente' => '5 de Marzo',
                'codigo_postal_cliente' => '55740',
                'numero_cliente' => '7719028008',
                'imagen_cliente' => 'imagen7.jpg',
                'email_cliente' => null,
                'is_email_notified' => null,
                'is_active' => 0,
            ],
        ];

        $table = $this->table('cliente');
        $table->insert($data)->save();

    }
}
