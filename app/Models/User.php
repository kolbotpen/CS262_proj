<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    // protected $table = 'admins'; // Name of table for admin or user. Change it to 'admins' if you want to put it into admin session 
    protected $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'profile_picture',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_to_user');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_to_user')
                    ->withPivot('is_boss')
                    ->withTimestamps();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Accessor for the profile picture
    public function getProfilePictureAttribute($value)
    {
        return $value ? asset('storage/profiles/' . $value) : asset('assets/images/avatar.png');
    }
}
