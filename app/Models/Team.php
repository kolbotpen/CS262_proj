<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Define the relationship with User through the team_to_user table
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_to_user', 'team_id', 'user_id');
    }

    // Existing company relationship
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    
}
