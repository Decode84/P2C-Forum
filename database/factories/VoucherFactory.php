<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word,
            'type' => $this->faker->randomElement(['registration']),
            'expires_at' => $this->faker->optional()->dateTimeBetween(now()->addDays(7), now()->addDays(14)),
        ];
    }
}
