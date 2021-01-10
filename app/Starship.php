<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Starship extends Model
{
    use HasApiTokens;
    const UPDATED_AT = 'last_updated_at';
    public $timestamps = false;

}
