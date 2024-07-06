<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name','company_id'];

    // Define the relationship with User through the team_to_user table
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_to_user');
    }

    // Existing company relationship
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
