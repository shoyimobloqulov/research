<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningResult extends Model
{
    protected $fillable = ['listening_id', 'user_answers', 'results', 'total_correct', 'total_incorrect','user_id'];
    protected $casts = ['user_answers' => 'array', 'results' => 'array',];

    public function listening(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Listening::class);
    }

    public function subject(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subject::class,'listening_id');
    }
}
