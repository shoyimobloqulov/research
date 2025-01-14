<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
    protected $fillable = ['content'];
    public function correctAnswers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CorrectAnswer::class);
    }

    public function results(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ListeningResult::class);
    }
}
