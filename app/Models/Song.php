<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Song extends Model
{
    //
    use HasFactory;
    protected $fillable = ['nombre', 'artista','podcast_id'];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
