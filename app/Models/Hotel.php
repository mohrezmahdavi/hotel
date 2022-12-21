<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    
    protected $guarded = [];

    public function scopeCheapest($query)
    {
        return $query->where('MinRate', '!=' ,'')->where('MinRate', '!=' ,null)->orderBy('MinRate', 'asc');
    }

    public function scopeMostPopular($query)
    {
        return $query->orderBy('Popularity', 'desc');
    }
}
