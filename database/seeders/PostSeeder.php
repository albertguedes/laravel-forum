<?php

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
        User::each(function (User $user)
        {
            for ($i=0; $i<5; $i++) {
                Post::factory()->create([
                    'user_id' => $user->id,
                    'topic_id' => Topic::inRandomOrder()->first()->id,
                ]);
            }
        });
    }
}
