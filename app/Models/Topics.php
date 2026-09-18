<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasUuids;
    protected $table = 'topics';
    protected $fillable = [
        'order',
        'module_id',
        'topic_name',
        'slug'
    ];
}
