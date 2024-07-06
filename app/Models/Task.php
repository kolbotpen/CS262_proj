<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'team_id', 'priority', 'progress','file_path', 'due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class); 
    }
    public function priorityColor()
    {
        switch ($this->priority) {
            case 'High':
                return 'pill-red';
            case 'Medium':
                return 'pill-yellow';
            case 'Low':
                return 'pill-green';
            default:
                return ''; // Default case if none of the above matches
        }
    }
    public function progressColor()
    {
        switch ($this->progress){
            case 'In-Progress':
                return 'pill-yellow';
            case 'Not Started':
                return '';
            case 'Completed':
                return 'pill-green';
            default:
                return ''; // Default case if none of the above matches
        }
    }
}
