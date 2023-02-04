<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of awards
        $awards = [
            [
                'name' => 'Founder',
                'slug' => 'founder',
                'image' => 'https://i.imgur.com/muPvSVL.png',
                'description' => 'One of the first members of the community.',
            ],
            [
                'name' => 'Donator',
                'slug' => 'donator',
                'image' => 'https://i.imgur.com/1ZQZQYx.png',
                'description' => 'Our donators are the backbone of our community.',
            ],
        ];

        DB::table('awards')->insert($awards);

    }
}
