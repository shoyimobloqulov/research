<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchingResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vocabulary_id',
        'is_correct',
    ];
}
