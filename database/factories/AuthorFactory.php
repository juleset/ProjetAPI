<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->uuid,
            'name'=>$this->faker->lastName,
            'firstname'=>$this->faker->firstName,
            'birthday'=>$this->faker->date('Y-m-d'),
            'death_date'=>$this->faker->date('Y-m-d'),
        ];
    }
}
