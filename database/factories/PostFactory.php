<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->sentence,
        'slug' => Str::slug($title),
        'preview' => $faker->paragraph,
        'body' => $faker->paragraphs(6, true),
        'user_id' => factory(User::class),
        'category_id' => factory(Category::class),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    ];
});
