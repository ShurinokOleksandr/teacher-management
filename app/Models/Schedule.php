<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\User;
class Schedule extends Model
{
    protected $fillable = ['lesson_date', 'lesson_time', 'subject_id', 'user_id'];
    protected $table = 'schedules';
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'subject_id');
    }
}
