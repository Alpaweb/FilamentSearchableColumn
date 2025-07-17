<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UserWithPostsSeeder extends Seeder
{
    public function run(): void
    {
        // On ajoute des utilisateurs (n'écrase pas les existants)
        User::factory()
            ->count(5)
            ->create()
            ->each(function (User $user) {
                // Génère 5 posts avec position de 1 à 5
                $posts = Post::factory()
                    ->count(5)
                    ->make()
                    ->each(function (Post $post, $index) use ($user) {
                        $post->position = $index + 1;
                        $user->posts()->save($post);
                    });
            });
    }
}
