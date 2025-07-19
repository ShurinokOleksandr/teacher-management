<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Homework;    
class HomeworkAnswer extends Model
{
    protected $fillable = ['user_id', 'homework_id', 'homework_solution', 'status', 'student_question', 'grade'];
    protected $table = 'homework_answers';
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id');
    }
}
