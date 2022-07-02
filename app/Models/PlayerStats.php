<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerStats extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'playedMatches',
        'points',
        'rebounds',
        'assists',
        'steals',
        'fouls',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
