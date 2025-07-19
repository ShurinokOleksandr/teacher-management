<?php

namespace App\Models;

use App\Models\Homework;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['title', 'description'];
    protected $table = 'subjects';
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'subject_id');
    }
    public function homeworks()
    {
        return $this->hasMany(Homework::class, 'subject_id');
    }
}
