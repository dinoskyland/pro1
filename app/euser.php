<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class euser extends Model
{
    protected $fillable = [
        'email',
        'pwd',        
    ];
    public $timestamps = false;
    protected $table = 'eusers'; 
}
