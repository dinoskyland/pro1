<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class time_unit extends Model
{
    protected $fillable = [
        'kind',
        'description',        
    ];
    public $timestamps = false;
    protected $table = 'time_units';    
}
