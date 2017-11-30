<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'version',
        'description',
    ];
    public $timestamps = false;
    protected $table = 'producsts';    
}
