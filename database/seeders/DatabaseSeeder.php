<?php

namespace Database\Seeders;

use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\RolePermissionSeeder;
use Database\Seeders\Frontend\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,

        ]);


    }
}
