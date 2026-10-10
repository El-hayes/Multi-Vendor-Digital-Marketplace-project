<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = new Admin();
        $admin->name = 'Super Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();
        // assign role
        $admin->assignRole('Super Admin');

        // Create Reviewer User
        $reviewer = new Admin();
        $reviewer->name = 'Reviewer';
        $reviewer->email = 'reviewer@gmail.com';
        $reviewer->password = bcrypt('password');
        $reviewer->save();
        // assign role
        $reviewer->assignRole('Reviewer');



    }
}
