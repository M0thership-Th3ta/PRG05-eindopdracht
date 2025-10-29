<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'image',
        'user_id',
        'vtuber_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vtuber()
    {
        return $this->belongsTo(VTuber::class);
    }
}
