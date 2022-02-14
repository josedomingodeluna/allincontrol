<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Mueble',
            'description' => 'Todo tipo de enseres o bienes hechos o diseñados con un material resistente que se utilizan para decorar casas',
        ]);
    }
}
