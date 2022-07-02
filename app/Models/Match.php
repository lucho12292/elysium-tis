<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'winner',
        'date',
        'score1',
        'score2',
        'team_id_one',
        'team_id_two',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
