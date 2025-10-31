<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pronoun extends Model
{
    protected $fillable = ['name', 'temp'];

    public function profileDetails(): BelongsToMany
    {
        return $this->belongsToMany(ProfileDetail::class, 'profile_detail_pronoun');
    }
}
