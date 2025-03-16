<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cattle extends Model
{
    protected $fillable = [
        'identification_number',
        'avatar',
        'registration_number',
        'breed',
        'sex',
        'date_of_birth',
        'origin_of_cattle',
    ];
}
