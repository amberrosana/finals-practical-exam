<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(10)->create();

        $users->each(function ($user) {
            Post::factory(5)->create([
                'user_id' => $user->id, 
            ]);
        });
    }

    // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
}
