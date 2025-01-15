<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchingResult extends Model
{
    protected $fillable = ['subject_id', 'user_answers', 'results', 'total_correct', 'total_incorrect','user_id'];
    protected $casts = ['user_answers' => 'array', 'results' => 'array',];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
