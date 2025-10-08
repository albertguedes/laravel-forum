<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Forum;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Forum::each(function (Forum $forum) {
            User::each(function (User $user) use ($forum) {
                if (rand(0, 1)) {
                    Topic::factory()->count(random_int(1, 5))->create([
                                        'forum_id' => $forum->id,
                                        'user_id' => $user->id,
                                    ]);
                }
            });
        });
    }
}
