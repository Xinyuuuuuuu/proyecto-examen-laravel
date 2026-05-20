<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Podcast extends Model
{
    use HasFactory; 
    protected $fillable = ['titulo', 'autor'];

    public function songs():HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

