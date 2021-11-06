<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->company(),
            'description'=>$this->faker->sentence(5),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->phoneNumber(),
            'country'=>$this->faker->country(),
        ];
    }
}
