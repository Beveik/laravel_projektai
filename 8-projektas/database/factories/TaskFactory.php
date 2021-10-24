<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title'=>$this->faker->name(),
          'description'=>$this->faker->sentence(3),
          'type_id'=>rand(1,4),
          'start_date'=>$this->faker->date(),
          'end_date'=>$this->faker->date(),
          'logo'=>$this->faker->imageUrl(300, 300, "animals", true),
        ];
    }
}
