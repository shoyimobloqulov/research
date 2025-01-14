<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{
    protected $fillable = ['listening_id', 'answer'];
    public function listening() {
        return $this->belongsTo(Listening::class);
    }
}
