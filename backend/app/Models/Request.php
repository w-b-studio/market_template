<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
    ];
    
    function requestproduct()
    {
        return $this->hasMany(RequestProduct::class);
    }
}
