<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->company(1),
            'author'=>$this->faker->name(),
            'description'=>$this->faker->sentence(2),
            'category_id'=>rand(1,10),
        ];
    }
}
