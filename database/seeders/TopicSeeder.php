<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::each(function (User $user) {
            for ($i=0; $i<5; $i++) {
                $forum_id = Forum::inRandomOrder()->first()->id;
                Topic::factory()->create([
                    'user_id' => $user->id,
                    'forum_id' => $forum_id
                ]);
            }
        });
    }
}
