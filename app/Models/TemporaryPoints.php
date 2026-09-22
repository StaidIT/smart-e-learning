<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporaryPoints extends Model
{
    protected $table = 'temporary_points';
    protected $fillable = [
        'user_id',
        'points'
    ];
}
