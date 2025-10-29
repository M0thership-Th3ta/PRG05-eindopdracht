<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vtuber extends Model
{
    protected $hidden = [
        'is_active'
    ];
    protected $fillable = [
        'name',
        'agency',
        'age',
        'gender',
        'height',
        'weight',
        'nationality',
        'zodiac_sign',
        'fandom_name',
        'emoji',
        'image',
        'birthday',
        'debut_date',
        'youtube_channel_id',
        'twitch_channel_id',
        'twitter_handle',
        'description',
        'image'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function isActive(): bool {
        return $this->is_active;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}


