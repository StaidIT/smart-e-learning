<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPretest extends Model
{
    protected $table = 'user_pretest';
    protected $fillable = [
        'user_id',
        'subject_id',
        'module_id',
        'status',
        'questions_type_passed',
        'coding_passed',
        'scored',
        'updated_at'
    ];
}
