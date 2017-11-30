<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_price extends Model
{
    protected $fillable = [
        'package_id',
        'price',
        'description',
        'change_date',
    ];
    public $timestamps = false;
    protected $table = 'package_prices';    
}
