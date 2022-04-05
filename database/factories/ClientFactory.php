<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'imagen' => $this->faker->imageUrl(640, 480),
            'cedula' => $this->faker->numberBetween(1000000, 9999999),
            'correo' => $this->faker->email,
            'telefono' => $this->faker->phoneNumber,
            'observaciones' => $this->faker->sentence,
        ];
    }
}
