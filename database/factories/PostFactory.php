<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_at = $this->faker->dateTime();
        $updated_at = $this->faker->dateTimeBetween($created_at,'now');
        $user_id = User::inRandomOrder()->first()->id;
        $topic_id = Topic::inRandomOrder()->first()->id;
        $category_id = Category::inRandomOrder()->first()->id;
        $parent_id = null;
        $title = trim($this->faker->unique()->sentence(4), '.');
        $slug = Str::slug($title,'-');
        $description = $this->faker->text(140);
        $content = $this->faker->text(2048);
        $published = $this->faker->boolean();

        return compact(
            'created_at',
            'updated_at',
            'user_id',
            'parent_id',
            'category_id',
            'topic_id',
            'title',
            'slug',
            'description',
            'content',
            'published'
        );
    }

    /**
     * Set actions after create a category.
     *
     * @return static
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Post $post)
        {
            $post->category()->associate(Category::inRandomOrder()->first());
            $post->tags()->sync(Tag::inRandomOrder()->limit(3)->pluck('id'));

            // Define a maximum number of attempts to find a parent category.
            $maxAttempts = 10;
            $attemptCount = 0;

            // Decide if the post is a main post or a child post.
            // Must have at least two posts on topic.
            if ($this->faker->boolean() && Post::where('topic_id', $post->topic_id)->count() > 1) {
                // Get a random parent post verifying that it is not a
                // descendent or a sibling, or the maximum number of attempts
                // has been reached.
                do {
                    $parent = Post::where('topic_id', $post->topic_id)->inRandomOrder()->first();
                } while (
                    $parent->isDescendantOf($post) ||
                    $parent->isSiblingOf($post) &&
                    (++$attemptCount < $maxAttempts)
                );
            }
        });
    }
}
