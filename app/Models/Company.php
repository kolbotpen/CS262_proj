<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'industry', 'description', 'visibility'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_to_user')
                    ->withPivot('is_boss')
                    ->withTimestamps();
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
}


