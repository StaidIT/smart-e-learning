<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporayPoints extends Model
{
    protected $table = 'temporay_points';
    protected $fillable = [
        'user_id',
        'points'
    ];
}
