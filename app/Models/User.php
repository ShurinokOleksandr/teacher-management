<?php

namespace App\Models;

 
use App\Models\Homework;
use App\Models\Schedule;
use App\Models\HomeworkAnswer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function homeworkAnswers()
    {
        return $this->hasMany(HomeworkAnswer::class, 'user_id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'user_id');
    }
    public function homeworks()
    {
        return $this->hasMany(Homework::class, 'user_id');
    }
}
// написать фейковіе данніе и начинать писать апи , сначала регистрацию