<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'name' => 'Rizky Albani',
                'username' => 'rzkyalbani',
                'password' => bcrypt('password'),
                'profile_picture' => 'profile-pictures/Zi2KilwrXeSZyPclvVwUAyrxgTHmRrZQRvQNZItl.png'
            ],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'password' => bcrypt('password'),
                'profile_picture' => 'profile-pictures/Zi2KilwrXeSZyPclvVwUAyrxgTHmRrZQRvQNZItl.png'
            ]
        ]);
    }
}
