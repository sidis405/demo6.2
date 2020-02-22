<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('sidebar', function ($view) {
            $sidebarCategories = Category::whereHas('posts')
                ->withCount('posts')
                ->orderBy('posts_count', 'DESC')
                ->get();

            $sidebarTags = Tag::whereHas('posts')
                ->withCount('posts')
                ->get();

            // select year(created_at) year, monthName(created_at) month, count(*) published from posts group by year, month order by created_at DESC

            $archive = Post::selectRaw('year(created_at) year, monthName(created_at) month, count(*) published')
                ->groupBy('year', 'month')
                ->orderByRaw('min(created_at) DESC')
                ->get();

            return $view->with('sidebarCategories', $sidebarCategories)
                ->with('archive', $archive)
                ->with('sidebarTags', $sidebarTags);
        });

        View::composer('posts._form', function ($view) {
            return $view->with('categories', Category::all())->with('tags', Tag::all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
