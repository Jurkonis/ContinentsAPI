<?php

namespace Database\Factories;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContinentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Continent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area' => $this->faker->numberBetween($min = 1111111, $max = 9999999),
            'population' => $this->faker->numberBetween($min = 200000, $max = 500000),
            'density' => $this->faker->numberBetween($min = 0, $max = 200),
        ];
    }
}
