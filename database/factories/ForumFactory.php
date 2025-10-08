<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Category;
use App\Models\Forum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    protected $model = Forum::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at  = $this->faker->dateTime();
        $updated_at  = $this->faker->dateTimeBetween($created_at,'now');
        $user_id = User::inRandomOrder()->first()->id;
        $category_id = Category::inRandomOrder()->first()->id;
        $title = trim($this->faker->unique()->sentence(4), '.');
        $slug = Str::slug($title);
        $description = $this->faker->paragraph();
        $is_active = $this->faker->boolean();

        return compact(
            'created_at',
            'updated_at',
            'user_id',
            'category_id',
            'title',
            'slug',
            'description',
            'is_active'
        );
    }
}
