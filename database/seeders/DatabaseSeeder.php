<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create teams and associated users
        Team::factory()->count(5)->create()->each(function ($team) {
            $user = User::factory()->create();
            $team->users()->attach($user->id);
        });
        // User for Testing (Kolbot)
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test1234'),
            'usertype' => 'admin',
        ]);
    }
}
