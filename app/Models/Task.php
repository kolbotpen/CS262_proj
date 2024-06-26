<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'assigned_to', 'assigned_email', 'priority', 'progress','file_path', 'due_date'];

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
            case 'In-Progress':
                return 'pill-yellow'; // Assuming you want the same color as Medium
            case 'Not Started':
                return ''; // Default pill class, no additional color
            case 'Completed':
                return 'pill-green';
            default:
                return ''; // Default case if none of the above matches
        }
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
