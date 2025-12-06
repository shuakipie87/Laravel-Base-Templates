<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);

        // create roles and assign created permissions

        // User Role
        $role = Role::create(['name' => 'User']);
        $role->givePermissionTo('view dashboard');

        // Manager Role
        $role = Role::create(['name' => 'Manager']);
        $role->givePermissionTo(['view dashboard', 'edit articles']);

        // Admin Role
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(['view dashboard', 'edit articles', 'delete articles', 'manage users']);

        // Super Admin Role (Granted via Gate::before in AppServiceProvider)
        $role = Role::create(['name' => 'Super Admin']);

        // Create Demo Admin
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role);
    }
}