<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserScoreboard extends Model
{
    protected $table = 'user_scoreboard';
    protected $fillable = [
        'user_id',
        'total_score'
    ];
}
