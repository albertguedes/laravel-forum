<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;
use App\Models\Topic;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::each(function (Topic $topic)
        {
            User::each(function (User $user) use ($topic)
            {
                if (rand(0, 1)) {
                    Post::factory()->count(random_int(1,5))
                                   ->create([
                                    'user_id' => $user->id,
                                    'topic_id' => $topic->id
                                   ]);
                }
            });
        });
    }
}
