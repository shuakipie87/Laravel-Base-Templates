<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // User
        $role = Role::create(['name' => 'User']);

        // Manager
        $role = Role::create(['name' => 'Manager']);
        $role->givePermissionTo('publish articles');
        $role->givePermissionTo('unpublish articles');

        // Admin
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(['edit articles', 'delete articles', 'publish articles', 'unpublish articles']);

        // Super Admin
        $role = Role::create(['name' => 'Super Admin']);
        // Super Admin gets all permissions via Gate::before in AppServiceProvider

        // Create Demo Admin
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role);
    }
}