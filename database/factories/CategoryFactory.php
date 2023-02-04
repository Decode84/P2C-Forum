<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->sentence,
            'section_id' => \App\Models\Section::factory(),
            'slug' => $this->faker->unique()->slug(),
            'topic_count' => 0,
        ];
    }
}
