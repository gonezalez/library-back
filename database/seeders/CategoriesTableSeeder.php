<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few Categories in our database:
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->name,
                'description' => $faker->paragraph
            ]);
        }
    }
}
