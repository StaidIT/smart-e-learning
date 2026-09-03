<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'topic_id',
        'question',
        'question_type',
        'answer',
        'updated_at'
    ];
}
