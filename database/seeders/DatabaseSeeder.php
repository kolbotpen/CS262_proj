<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 50 users
        $users = User::factory(50)->create();

        // Create companies and assign users
        foreach (range(1, 5) as $index) {
            $company = Company::factory()->create();

            // Shuffle users and take 10 for each company
            $assignedUsers = $users->shuffle()->take(10);

            // Assign the first user as boss
            $company->users()->attach($assignedUsers[0]->id, ['is_boss' => 1]);

            // Assign the remaining 9 users as regular users
            foreach ($assignedUsers->slice(1) as $user) {
                $company->users()->attach($user->id, ['is_boss' => 0]);
            }
        }
        Team::factory()->count(10) // Create 5 teams (adjust count as needed)
        ->forAllCompanies() // Use the state for all companies
        ->create();
        // User for Testing (Kolbot)
        User::create([
            'name' => 'kolbot',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test1234'),
            'usertype' => 'admin',
        ]);
        // User for Testing (Ponloe)
        User::create([
            'name' => 'ponloe',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),
            'usertype' => 'admin',
        ]);
        // User for Testing (Ponloe)
        User::create([
            'name' => 'visoth',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => 'admin',
        ]);
    }
}
