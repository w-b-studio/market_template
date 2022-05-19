<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    protected $fillable = [
        'request_id', 'product_id'
    ];

    function product()
    {
        return $this->belongsTo(Product::class);
    }
    function request() {
        return $this->belongsTo(Request::class);
    }
}
