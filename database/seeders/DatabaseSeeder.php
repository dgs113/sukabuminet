<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin123',
            'password' => bcrypt('berkahjaya')
        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);
        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga'
        ]);

        // Post::factory(50)->create();
    }
}
