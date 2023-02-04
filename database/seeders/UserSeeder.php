<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin account
        DB::table('users')->insert([
            'username' => 'admin',
            'hwid' => Str::random(32),
            'bio' => 'I do stuff and things that make everything work around here.',
            'email' => 'anon@anon.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
        ]);

        // Spatie assign role to the user
        $user = User::find(1);
        $user->assignRole('admin');

        // Moderator account
        DB::table('users')->insert([
            'username' => 'moderator',
            'hwid' => Str::random(32),
            'bio' => 'Member',
            'email' => 'mod@mod.com',
            'password' => Hash::make('moderator'),
            'created_at' => now(),
        ]);

        $user = User::find(2);
        $user->assignRole('moderator');

        // Member account
        DB::table('users')->insert([
            'username' => 'customer',
            'hwid' => Str::random(32),
            'bio' => 'customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('customer'),
            'created_at' => now(),
        ]);

        $user = User::find(3);
        $user->assignRole('customer');

        // Member account
        DB::table('users')->insert([
            'username' => 'member',
            'hwid' => Str::random(32),
            'bio' => 'Member',
            'email' => 'member@member.com',
            'password' => Hash::make('member'),
            'created_at' => now(),
        ]);

        $user = User::find(4);
        $user->assignRole('member');

        // Banned account
        DB::table('users')->insert([
            'username' => 'banned',
            'hwid' => Str::random(32),
            'bio' => 'banned',
            'email' => 'ban@ban.com',
            'password' => Hash::make('banned'),
            'created_at' => now(),
        ]);

        $user = User::find(5);
        $user->assignRole('banned');
    }
}
