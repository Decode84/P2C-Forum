<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // secure random string
        $slug = Str::random(10);

        return [
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $slug,
            'user_id' => \App\Models\User::factory(),
            'topic_id' => \App\Models\Topic::factory(),
        ];
    }
}
