<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'key',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($apiKey) {
            $apiKey->uuid = Str::uuid();
            $apiKey->key = Str::random(40);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
