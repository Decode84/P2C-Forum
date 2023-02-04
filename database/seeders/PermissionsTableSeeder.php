<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view-panel']);
        Permission::create(['name' => 'view-admin-panel']);

        // User related
        Permission::create(['name' => 'update-avatar']);
        Permission::create(['name' => 'update-cover']);
        Permission::create(['name' => 'update-name']);
        Permission::create(['name' => 'update-bio']);

        // Post related
        Permission::create(['name' => 'create-reply']);
        Permission::create(['name' => 'read-reply']);
        Permission::create(['name' => 'update-reply']);
        Permission::create(['name' => 'delete-reply']);
        Permission::create(['name' => 'edit-reply']);

        // Topic related
        Permission::create(['name' => 'create-topic']);
        Permission::create(['name' => 'read-topic']);
        Permission::create(['name' => 'update-topic']);
        Permission::create(['name' => 'delete-topic']);
        Permission::create(['name' => 'edit-topic']);

        // HWID
        Permission::create(['name' => 'update-hwid']);

        // Admin related permissions
        Permission::create(['name' => 'mod-user']);

        // Create roles
        $admin = Role::create(['name' => 'admin']); // God of the forum
        $moderator = Role::create(['name' => 'moderator']); // Moderator
        $customer = Role::create(['name' => 'customer']); // Paying user
        $member = Role::create(['name' => 'member']); // Default role
        $banned = Role::create(['name' => 'banned']); // Banned role

        // Assign permissions to roles
        $member->givePermissionTo([
            'update-avatar',
            'update-cover',
            'update-name',
            'update-bio',
            'create-reply',
            'read-reply',
            'update-reply',
            'edit-reply',
            'create-topic',
            'read-topic',
            'update-topic',
            'edit-topic',
        ]);

        $customer->givePermissionTo([
            'update-avatar',
            'update-cover',
            'update-name',
            'update-bio',
            'create-reply',
            'read-reply',
            'update-reply',
            'edit-reply',
            'create-topic',
            'read-topic',
            'update-topic',
            'edit-topic',
            // CUSTOMER ONLY
            'view-panel',
        ]);

        $moderator->givePermissionTo([
            'update-avatar',
            'update-cover',
            'update-name',
            'update-bio',
            'create-reply',
            'read-reply',
            'update-reply',
            'edit-reply',
            'create-topic',
            'read-topic',
            'update-topic',
            'edit-topic',
            // MOD ONLY
            'delete-topic',
            'delete-reply',
            'update-hwid',
            'mod-user',
            'view-panel',
        ]);
    }
}
