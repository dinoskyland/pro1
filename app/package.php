<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $fillable = [
        'package_name',
        'version',
        'description',
    ];
}
