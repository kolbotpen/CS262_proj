<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'profile_picture',
        'provider', // Determine whether user is logged in with Third Party provider or not
        'provider_id', // Third Party provider ID (Facebook uses it)
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
