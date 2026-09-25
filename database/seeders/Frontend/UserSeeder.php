<?php

namespace Database\Seeders\Frontend;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Mohamed',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
