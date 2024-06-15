<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Team;
use App\Models\User;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'company_id' => Company::factory()->create()->id,
        ];
    }

    /**
     * Configure the factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $user = User::factory()->create(); // Create a single user
            $team->users()->attach($user); // Attach the user to the team
        });
    }
}
