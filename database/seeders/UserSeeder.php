<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create first admin user.
        User::factory()->create([
            'email' => 'admin@fakemail.com',
            'password' => Hash::make('admin@fakemail.com'),
            'is_active' => true,
            'is_admin' => true
        ]);

        User::factory()->count(9)->create();
    }
}
