<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function ($category) {
            $category->posts()->forceDelete();
        });
    }

    protected $fillable = ['name'];
    
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
