<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->company(2),
            'description'=>$this->faker->sentence(3),
            'logo' => $this->faker->imageUrl(300, 300, "animals", true),
            'contact_id' => Contact::factory()->create()->id
        ];
    }
}
