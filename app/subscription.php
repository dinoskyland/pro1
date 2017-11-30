<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    protected $fillable = [
        'rate_plan_id',
        'user_id',
        'activated_at',
        'billing_date',
        'suspend_date',
        'resuming_date',
        'temp_date',
        'current_balance',
        'payment_id',
        'time_unit_id',
        'status',
        'description',        
    ];
    
    public $timestamps = false;
    protected $table = 'subscriptions';
}
