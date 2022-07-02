<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'lastname', 
        'email', 
        'password', 
        'document_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
