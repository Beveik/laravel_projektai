<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            'excerpt'=>$this->faker->sentence(1),
            'description'=>$this->faker->sentence(2),

        ];
    }
}
