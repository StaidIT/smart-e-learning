<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasUuids;
    protected $table = 'questions';
    protected $fillable = [
        'module_id',
        'question',
        'question_type',
        'answer',
        'explanation',
        'updated_at'
    ];
}
