<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(5)->create();
        Author::factory(5)->create();
        Book::factory(10)->has(Category::factory(rand(1,10)))->has(Author::factory(rand(1,10)))->create();

    }
}
