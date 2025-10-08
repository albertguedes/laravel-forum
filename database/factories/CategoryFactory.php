<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Helpers\CategoryHelper;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_at  = $this->faker->dateTime();
        $updated_at  = $this->faker->dateTimeBetween($created_at,'now');
        $parent_id   = null;
        $title       = $this->faker->unique()->words(2,true);
        $slug        = Str::slug($title,'-');
        $description = $this->faker->paragraph();
        $is_active   = $this->faker->boolean();

        return compact(
            'created_at',
            'updated_at',
            'parent_id',
            'title',
            'slug',
            'description',
            'is_active'
        );
    }

    /**
     * Set actions after create a category.
     *
     * @return static
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Category $category)
        {
            // Define a maximum number of attempts to find a parent category.
            $maxAttempts = 10;
            $attemptCount = 0;

            // Decide if the category is a main category or a child category.
            if ($this->faker->boolean() && Category::count() > 1) {
                // Get a random parent category verifying that it is not a
                // descendent or a sibling, or the maximum number of attempts
                // has been reached.
                do {
                    $parent = Category::inRandomOrder()->first();
                } while (
                    $parent->isDescendantOf($category) ||
                    $parent->isSiblingOf($category) &&
                    (++$attemptCount < $maxAttempts)
                );
            }
        });
    }
}
