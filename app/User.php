<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->profile()->delete();
        });
    }

    protected $with = ['profile'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin',
    ];

    protected $casts = ['admin' => 'boolean'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function beAdmin()
    {
        $this->update(['admin' => true]);
    }
    
    public function revokeAdmin()
    {
        $this->update(['admin' => false]);
    }
}
