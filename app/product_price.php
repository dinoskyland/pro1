<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_price extends Model
{
    protected $fillable = [
        'product_id',
        'price',
        'description'
    ];
}
