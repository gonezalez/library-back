<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Book::truncate();
        $categories = Category::all()->pluck('id')->toArray();

        $faker = \Faker\Factory::create();

        // And now, let's create a few books in our database:
        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'userBorrowing' => $faker->name,
                'publicationDate' => $faker->dateTime,
                'category_id' => $faker->randomElement($categories)
            ]);
        }
    }
}
