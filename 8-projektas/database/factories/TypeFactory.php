<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $titlename=array("atlikta", "neatlikta", "vykdoma", "nebeaktuali");
        return [

            // 'title'=>$titlename[rand(0,3)],
        //   'description'=>$this->faker->sentence(3),

        ];
    }
}
