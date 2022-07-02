<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'lastname',
        'document_id',
        'position',
        'height',
        'weight',
        'country',
        'picture'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
