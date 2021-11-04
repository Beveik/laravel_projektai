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
            'title' => $this->faker->company(),
            'isbn' => $this->faker->numerify('####################'),
            'pages' => $this->faker->numerify('##'),
            'about' => $this->faker->sentence(3),
            'author_id' => rand(1,20),

        ];
    }
}
