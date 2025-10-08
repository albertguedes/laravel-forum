<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Forum;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Forum::factory()->count(random_int(1,5))
                            ->create([
                                'user_id' => $user->id
                            ]);
        });
    }
}
