<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageKnown extends Model
{
    use HasFactory;

    public function rel_user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
