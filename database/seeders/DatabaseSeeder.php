<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 random users
        $users = User::factory(10)->create();

        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),  
        ]);

        Post::factory(5)->create([
            'user_id' => $testUser->id,  
        ]);

        $users->each(function ($user) {
            Post::factory(5)->create([
                'user_id' => $user->id, 
            ]);
        });
    }
}
