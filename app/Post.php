<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();
        
        static::created(function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }

    protected $fillable = ['title', 'body', 'image', 'category_id', 'slug', 'user_id'];
    
    protected $dates = ['deleted_at'];

    protected $with = ['category', 'tags', 'owner'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImageAttribute($image)
    {

        return starts_with($image, 'http') ? $image : asset("storage/{$image}");
    }

    public function setSlugAttribute($value)
    {
        $slug = str_slug($value, '-', app()->getLocale());
        
        while (static::where('id', '!=', $this->id)->where('slug', $slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }
}
