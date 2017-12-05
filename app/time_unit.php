<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class time_unit extends Model
{
    protected $fillable = [
        'kind',
        'description'        
    ];
}
