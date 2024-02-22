<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(100)->create();
        // Category::factory(3)
        //     ->has(Blog::factory()->count(20))
        //     ->create();

        // Blog::factory(20)
        //     ->has(Comment::factory()->count(20))
        //     ->create();


        // BlogUser::factory(20)->create();

        User::factory(3)
            ->has(Blog::factory()->count(10), 'subscribedBlogs')
            ->create();
    }
}
