<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Almacen>
 */
class AlmacenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>fake()->randomDigit(),
            'fecha_alta'=>fake()->date('Y-m-d'),
            'fecha_baja'=>fake()->date('Y-m-d'),
            'nombre_producto'=>fake()->name(),
            'descripcion_producto'=>fake()->realText($maxNbChars = 200, $indexSize = 2),
            'producto_id'=>rand(1,2)
        ];
    }
}
