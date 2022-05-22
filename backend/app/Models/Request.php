<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'buy_name',
        'number',
        'area',
        'city',
        'address',
        'comments',
    ];
    
    function requestproduct()
    {
        return $this->hasMany(RequestProduct::class);
    }
}
