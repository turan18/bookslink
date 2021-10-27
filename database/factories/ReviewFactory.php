<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'rating' => $this->faker->numberBetween(1,5),
            'review_body' => $this->faker->paragraph('3'),
            'upvote' => $this->faker->numberBetween(1,200),
            'downvote' => $this->faker->numberBetween(1,200),
        ];
    }
}
