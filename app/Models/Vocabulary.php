<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $fillable = [
        'word',
        'definition',
        'chr',
        'type',
        'subject_id'
    ];
}
