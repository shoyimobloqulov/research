<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['test_id', 'text', 'is_correct'];

    public function test(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
