<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate_plan extends Model
{
    protected $fillable = [
        'rate_plan_name',
        'type',
        'selected_id',
        'description',
    ];
    public $timestamps = false;
    protected $table = 'rate_plans';    
}
