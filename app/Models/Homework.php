<?php

namespace App\Models;

use App\Models\HomeworkAnswer;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['title', 'description', 'task_image', 'subject_id', 'user_id'];
    protected $table = 'homeworks';
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function homeworkAnswer()
    {
        return $this->belongsTo(HomeworkAnswer::class,'user_id');
    }
}
