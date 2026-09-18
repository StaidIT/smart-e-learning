<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AnsweredQuestions extends Model
{
    use HasUuids;
    public $timestamps = false;
    protected $table = 'answered_questions';
    protected $fillable = [
        'user_id',
        'module_id',
        'question_id',
        'answered_at'
    ];
}
