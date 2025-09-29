<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = $this->faker->dateTime();
        $updated_at = $this->faker->dateTimeBetween($created_at,'now');
        $user_id = User::inRandomOrder()->first()->id;
        $first_name = $this->faker->firstName();
        $middle_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $gender = $this->faker->boolean();
        $birth_date = $this->faker->date();
        $username = $this->faker->username();
        $bio = $this->faker->paragraph();

        return compact(
            'created_at',
            'updated_at',
            'user_id',
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'birth_date',
            'username',
            'bio'
        );
    }
}
