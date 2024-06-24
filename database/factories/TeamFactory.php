<?php
namespace Database\Factories;

use App\Models\Company;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            // 'company_id' will be passed as an argument
        ];
    }

    /**
     * Run after creating the team for each company.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $company = $team->company; // Get the company associated with the team

            // Retrieve up to three users from the company
            $users = $company->users()->inRandomOrder()->limit(3)->get();

            // Attach the retrieved users to the team
            $team->users()->attach($users);
        });
    }

    /**
     * Indicate that the factory should relate to all existing companies.
     *
     * @return $this
     */
    public function forAllCompanies()
    {
        return $this->state(function (array $attributes) {
            return [
                'company_id' => Company::all()->random()->id,
            ];
        });
    }
}
