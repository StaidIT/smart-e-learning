<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    protected $table = 'choices';
    protected $fillable = [
        'question_id',
        'choice_A',
        'choice_B',
        'choice_C',
        'choice_D',
        'updated_at'
    ];
}
