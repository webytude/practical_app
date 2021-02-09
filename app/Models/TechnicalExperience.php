<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalExperience extends Model
{
    use HasFactory;
    public $table = 'technical_experience';
    public function rel_user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
