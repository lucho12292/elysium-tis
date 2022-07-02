<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 
        'country',
        'startDate',
        'endDate',  
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
