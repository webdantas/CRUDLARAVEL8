<?php

namespace Database\Seeders;
use App\Models\People;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    public function run()
    {
        $people = [
            [
                'name'          => 'Jorge da Silva',
                'email'         => 'jorge@terra.com.br',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Flavia Monteiro',
                'email'         => 'flavia@globo.com',
                'category_id'   => '2',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Marcos Frota Ribeiro',
                'email'         => 'ribeiro@gmail.com',
                'category_id'   => '2',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Raphael Souza Santos',
                'email'         => 'rsantos@gmail.com',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Pedro Paulo Mota',
                'email'         => 'ppmota@gmail.com',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Winder Carvalho da Silva',
                'email'         => 'winder@hotmail.com',
                'category_id'   => '3',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Maria da Penha Albuquerque',
                'email'         => 'mpa@hotmail.com',
                'category_id'   => '3',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Rafael Garcia Souza',
                'email'         => 'rgsouza@hotmail.com',
                'category_id'   => '3',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Tabata Costa',
                'email'         => 'tabata_costa@gmail.com	',
                'category_id'   => '2',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Ronil Camarote',
                'email'         => 'camarote@terra.com.br',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Joaquim Barbosa',
                'email'         => 'barbosa@globo.com',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Eveline Maria Alcantra',
                'email'         => 'jev_alcantra@gmail.com',
                'category_id'   => '2',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'João Paulo Vieira',
                'email'         => 'jpvieria@gmail.com',
                'category_id'   => '1',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Carla Zamborlini',
                'email'         => 'zamborlini@terra.com.br',
                'category_id'   => '3',

                'created_at'    => now(),
                'updated_at'    => now()
            ],

        ];

        People::insert($people);
    }
}
