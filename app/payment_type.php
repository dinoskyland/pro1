<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_type extends Model
{
    protected $fillable = [
        'p_kind',
        'description',
    ];
    public $timestamps = false;
    protected $table = 'payment_types';
}
