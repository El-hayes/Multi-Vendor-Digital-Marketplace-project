<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // call permissions function
        $this->createDefaultPermissions();

        // Create Super Admin Role
        $admin = new Role();
        $admin->name = 'Super Admin';
        $admin->guard_name = 'admin';
        $admin->save();

        // Create Reviewer Role
        $reviewer = new Role();
        $reviewer->name = 'Reviewer';
        $reviewer->guard_name = 'admin';
        $reviewer->save();

        // Assign reviewer permission to reviewer role
        $reviewer->givePermissionTo('review products');

    }

    // function for default permission
    public function createDefaultPermissions(): void
    {
        Permission::insert([
            [
                'name' => 'review products',
                'guard_name' => 'admin',
                'group_name' => 'Review Products'
            ]
        ]);
    } // End Method

}
