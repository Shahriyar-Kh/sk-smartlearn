<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // --- Define permissions ---
        $permissions = [
            // User management
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Course management
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'publish courses',

            // Dashboard access
            'access student dashboard',
            'access admin dashboard',

            // Profile management
            'edit own profile',
            'view profiles',

            // Analytics
            'view analytics',

            // System management
            'manage settings',
            'send notifications',
            'view activity log',
        ];

        // --- Create permissions safely ---
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // --- Create roles safely ---
        $studentRole = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        $adminRole   = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // --- Assign permissions ---
        $studentRole->syncPermissions([
            'access student dashboard',
            'edit own profile',
            'view courses',
        ]);

        $adminRole->syncPermissions(Permission::all());
    }
}
