<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $category = [
            [
                'name'          => 'Admin',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Gerente',

                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Normal',

                'created_at'    => now(),
                'updated_at'    => now()
            ],

        ];

        Category::insert($category);
    }
}
