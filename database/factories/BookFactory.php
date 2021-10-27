<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'volume_id' => $this->faker->unique->word(),
            'title' => $this->faker->word(),
            'author' => $this->faker->name,
            'full_rating' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->paragraph('4')
        ];
    }
}
