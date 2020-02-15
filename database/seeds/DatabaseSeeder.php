<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 10 categorie
        $categories = factory(Category::class, 10)->create();

        // 40 tags
        $tags = factory(Tag::class, 40)->create();

        // 10 utenti
        User::create([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        factory(User::class, 9)->create();

        $users = User::all();

        //  15 posts per utente
        foreach ($users as $user) {
            //  Post con categoria random fra quelle esistenti
            $posts = factory(Post::class, 15)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);

            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3));
            }
            //  Post con 3 random tags fra quelli esistenti
        }
    }
}
