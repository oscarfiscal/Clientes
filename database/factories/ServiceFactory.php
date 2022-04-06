<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
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
            'imagen' => $this->faker->imageUrl(),
            'tipo_servicio' => $this->faker->randomElement(['Avanzado', 'Basico']),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'observaciones' => $this->faker->text,
            'client_id' => rand(1,5),
        ];
    }
}
