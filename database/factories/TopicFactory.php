<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generate random hex key for slug
        $slug = Str::random(10);

        return [
            'title' => $this->faker->unique()->words(3, true),
            'slug' => $slug,
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'reply_count' => 0,
            'view_count' => 0,
        ];
    }
}
