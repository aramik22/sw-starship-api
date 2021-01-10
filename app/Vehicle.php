<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    const UPDATED_AT = 'last_updated_at';
    public $timestamps = false;
}
