<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'lastname', 
        'document_id', 
        'role'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }    
}
