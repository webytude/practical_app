<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'contact',
        'education_detail',
        'preferred_location',
        'current_ctc',
        'expected_ctc',
        'notice_period',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rel_language()
    {
        return $this->hasMany(LanguageKnown::class, 'user_id', 'id');
    }

    public function rel_technicalex()
    {
        return $this->hasMany(TechnicalExperience::class, 'user_id', 'id');
    }

    public function rel_workex()
    {
        return $this->hasMany(WorkExperience::class, 'user_id', 'id');
    }
}
