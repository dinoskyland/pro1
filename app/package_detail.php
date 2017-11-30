<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_detail extends Model
{
    protected $fillable = [
        'package_id',
        'product_id',        
    ];
    public $timestamps = false;
    protected $table = 'package_details';    
}
