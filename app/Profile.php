<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar', 'facebook', 'youtube', 'about', 'user_id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function getAvatarAttribute($avatar)
    {

        return starts_with($avatar, 'http') ? $avatar : asset("storage/{$avatar}");
    }
}
