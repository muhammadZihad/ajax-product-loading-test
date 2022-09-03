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
        $title = $this->faker->sentence(2);
        $type = ['best', 'top', 'random', 'featured'];

        return [
            'title' => rtrim($title, '.'),
            'price' => $this->faker->numberBetween(100, 1000),
            'type' => $type[array_rand($type)]
        ];
    }
}