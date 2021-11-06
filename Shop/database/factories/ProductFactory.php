<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'excerpt'=>$this->faker->sentence(2),
            'description'=>$this->faker->sentence(5),
            'price'=>$this->faker->randomFloat(2, 0, 999),
            'image'=>$this->faker->imageUrl(300, 300, "animals", true),
            'category_id'=>rand(1,30),
        ];
    }
}
