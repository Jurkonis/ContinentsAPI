<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area' => $this->faker->numberBetween($min = 11111, $max = 99999),
            'population' => $this->faker->numberBetween($min = 2000, $max = 5000),
            'phone_code' => $this->faker->numberBetween($min = 100, $max = 999),
        ];
    }
}
