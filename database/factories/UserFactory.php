<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Array of images
        $humanImages = [
            'https://i.pravatar.cc/150?img=1',
            'https://i.pravatar.cc/150?img=2',
            'https://i.pravatar.cc/150?img=3',
        ];

        $discordImages = [
            'https://pfps.gg/assets/pfps/9317-mikey.png',
            'https://pfps.gg/assets/pfps/8506-freddie-dredd-egirl.png',
            'https://pfps.gg/assets/pfps/7733-anime.png',
            'https://pfps.gg/assets/pfps/7309-cute-girl.gif',
            'https://pfps.gg/assets/pfps/2464-.gif',
            'https://pfps.gg/assets/pfps/8416-aesthetic-liquid.gif',
            'https://pfps.gg/assets/pfps/3401-idk.gif',
            'https://pfps.gg/assets/pfps/1682-purple-warm-cool-wow.gif',
            'https://pfps.gg/assets/pfps/4076-kuraa-best-anime-girl-pfp.png',
            'https://pfps.gg/assets/pfps/4726-gif-version-of-anime-cat-got-pat.png',
            'https://pfps.gg/assets/pfps/6672-yoriichi-tsugikuni.png',
            'https://pfps.gg/assets/pfps/3006-michiru-kagemori.gif',
            'https://pfps.gg/assets/pfps/1508-babdog.gif',
            'https://pfps.gg/assets/pfps/9284-duck.gif',
        ];

        $coverImages = [
            'https://w.wallhaven.cc/full/x6/wallhaven-x659kz.jpg',
            'https://w.wallhaven.cc/full/yx/wallhaven-yx7g8k.jpg',
            'https://w.wallhaven.cc/full/72/wallhaven-72ddzy.jpg',
            'https://w.wallhaven.cc/full/m9/wallhaven-m986qy.jpg',
            'https://w.wallhaven.cc/full/v9/wallhaven-v97ljl.png',
            'https://w.wallhaven.cc/full/we/wallhaven-weoqxp.jpg',
            'https://w.wallhaven.cc/full/3l/wallhaven-3lov33.jpg',
        ];

        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'hwid' => Str::random(32),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'bio' => fake()->paragraph(),
            // 'avatar' => $discordImages[array_rand($discordImages)],
            'cover' => $coverImages[array_rand($coverImages)],
            'reply_count' => 0,
            'topic_count' => 0,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
