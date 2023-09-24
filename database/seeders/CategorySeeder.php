<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         \App\Models\Category::factory(10)->create();

         \App\Models\Category::factory()->create([
             'name' => 'Makanan',
         ]);

        \App\Models\Category::factory()->create([
            'name' => 'Minuman',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Body Care',
        ]);
    }
}
