<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        Book::create([
            'book_name' => 'dfgdfgfdg',
            'image' =>'asian-owned.jpg',
            'author_name' => 'j kans',
            'published_date' => '2015-08-09',

        ]);
    }
}
