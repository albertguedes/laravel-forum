<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;

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
        $sentence = $this->faker->unique()->sentence(4);

        $created_at  = $this->faker->dateTime();
        $updated_at  = $this->faker->dateTimeBetween($created_at,'now');
        $user_id   = User::inRandomOrder()->first()->id;
        $topic_id = Topic::inRandomOrder()->first()->id;
        //$parent_id = null;
        $title       = trim($sentence,'.');
        $slug        = Str::slug($title,'-');
        $description = $this->faker->text(140);
        $content     = $this->faker->text(2048);
        $category_id = Category::inRandomOrder()->first()->id;
        $published   = $this->faker->boolean();

        return compact(
            'created_at',
            'updated_at',
            'user_id',
            //'parent_id',
            'topic_id',
            'title',
            'slug',
            'description',
            'content',
            'category_id',
            'published'
        );

    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::inRandomOrder()->limit(3)->get();
            $post->tags()->attach($tags);
        });
    }

}
