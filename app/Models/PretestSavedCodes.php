<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PretestSavedCodes extends Model
{
    protected $table = 'user_pretest_code';
    protected $fillable = [
        'user_id',
        'question_id',
        'code'
    ];
}
