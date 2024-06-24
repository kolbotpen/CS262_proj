<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'industry', 'description', 'visibility'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_to_user')
                    ->withPivot('is_boss')
                    ->withTimestamps();
    }
    public function boss(): BelongsToMany
    {
        return $this->users()->wherePivot('is_boss', true);
    }
    public function creator()
    {
        return $this->belongsToMany(User::class, 'company_to_user')->wherePivot('is_boss', 1);
    }
    // THIS IS FOR GENERATING THE CODE FOR JOINING COMPANY
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            $company->company_code = self::generateUniqueCompanyCode();
        });
    }

    public static function generateUniqueCompanyCode()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (self::where('company_code', $code)->exists());

        return $code;
    }
    // THIS IS FOR SHOWING ONLY PUBLIC COMPANIES IN BROWSE-SEARCH
    public function scopePublic($query)
    {
        return $query->where('visibility', 'public');
    }
    public function tasks()
    {
        return $this->hasManyThrough(
            Task::class, // The model to access through the relationship
            Team::class, // The intermediate model
            'company_id', // Foreign key on the Team model
            'team_id', // Foreign key on the Task model
            'id', // Local key on the Company model
            'id'  // Local key on the Team model
        );
    }
}


