<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of sections
        $sections = [
            [
                'title' => 'General',
                'slug' => 'general',
            ],
            [
                'title' => 'Counter-Strike',
                'slug' => 'counter-strike',
            ],
            [
                'title' => 'Off-Topic',
                'slug' => 'off-topic',
            ],
            [
                'title' => 'Graveyard',
                'slug' => 'graveyard',
            ],
        ];

        DB::table('sections')->insert($sections);

        $generalCategory = [
            [
                'title' => 'Announcements & updates',
                'description' => 'Announcements and updates about the community.',
                'slug' => 'announcements-updates',
                'section_id' => 1,
                'created_at' => now(),
            ],
            [
                'title' => 'General discussion',
                'description' => 'General discussion about the community.',
                'slug' => 'general-discussion',
                'section_id' => 1,
                'created_at' => now(),
            ],
            [
                'title' => 'Introductions',
                'description' => 'Introduce yourself to the community.',
                'slug' => 'introductions',
                'section_id' => 1,
                'created_at' => now(),
            ],
            [
                'title' => 'Suggestions',
                'description' => 'Suggestions for the community.',
                'slug' => 'suggestions',
                'section_id' => 1,
                'created_at' => now(),
            ],
            [
                'title' => 'Development',
                'description' => 'Development of the community.',
                'slug' => 'development',
                'section_id' => 1,
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($generalCategory);

        $offTopicCategory = [
            [
                'title' => 'Off-topic discussion',
                'description' => 'Off-topic discussion.',
                'slug' => 'off-topic-discussion',
                'section_id' => 2,
                'created_at' => now(),
            ],
            [
                'title' => 'Games',
                'description' => 'Different games you play.',
                'slug' => 'off-topic-games',
                'section_id' => 2,
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($offTopicCategory);

        $counterStrikeCategory = [
            [
                'title' => 'Discussion',
                'description' => 'Discussion about Counter-Strike.',
                'slug' => 'discussion',
                'section_id' => 3,
                'created_at' => now(),
            ],
            [
                'title' => 'Media',
                'description' => 'Media about Counter-Strike.',
                'slug' => 'media',
                'section_id' => 3,
                'created_at' => now(),
            ],
            [
                'title' => 'Coding',
                'description' => 'Coding about Counter-Strike.',
                'slug' => 'coding',
                'section_id' => 3,
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($counterStrikeCategory);

        $graveyardCategory = [
            [
                'title' => 'Archived',
                'description' => 'Archived topics.',
                'slug' => 'archived',
                'section_id' => 4,
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($graveyardCategory);


        // Create 5 topics for each category and assign them to a user at random and give that user a role of member
        foreach (Category::all() as $category) {
            for ($i = 0; $i < 5; $i++) {
                $topic = \App\Models\Topic::factory()->create([
                    'category_id' => $category->id,
                    'user_id' => \App\Models\User::all()->random()->id,
                ]);

                // Create 5 replies for each topic and assign them to a user at random and give that user a role of member
                for ($i = 0; $i < 5; $i++) {
                    \App\Models\Reply::factory()->create([
                        'topic_id' => $topic->id,
                        'user_id' => \App\Models\User::all()->random()->id,
                    ]);
                }
            }
        }
    }
}
