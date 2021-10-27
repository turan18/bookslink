<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Follower;
use App\Models\Review;
use App\Models\SharedBook;
use App\Models\User;
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
//        User::factory(3)->create();
//        Book::factory(3)->create();
        Review::factory(3)->create();
        Follower::factory(3)->create();
        SharedBook::factory(3)->create();
    }
}
