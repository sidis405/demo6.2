<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];
    // protected $appends = ['has_uploaded_image'];
    // protected $hidden = ['category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Getters / Accessors
    // public function getTitleAttribute($title)
    // {
    //     return strtoupper($title);
    // }

    // Setters / Mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function setCoverAttribute(UploadedFile $cover): void
    {
        $this->attributes['cover'] = $cover->store('covers');
    }

    public function getCoverAttribute($cover): string
    {
        return $cover ?? 'covers/default.png';
    }

    // has_uploaded_image
    public function getHasUploadedImageAttribute()
    {
        return 'pippo';
    }

    // public function toArray()
    // {
    //     return [
    //         'id' => $this->id,
    //         'category_id' => $this->category_id,
    //         'user_id' => $this->user_id,
    //         'title' => $this->title,
    //         'has_uploaded_image' => $this->has_uploaded_image,
    //     ];
    // }
}
