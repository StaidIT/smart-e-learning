<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'action',
        'subject',
        'topic',
        'target',
        'from_role',
        'to_role',
        'feedback',
        'created_at',
    ];

    protected static function booted()
    {
        static::created(function () {
            $activities = static::orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->get();

            if ($activities->count() > 20) {
                $activities->slice(20)->each->delete();
            }
        });
    }
}