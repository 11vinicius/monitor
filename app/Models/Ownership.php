<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ownership extends Model
{
    protected $table = 'ownerships';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'registration_number',
        'lat',
        'long',
    ];  
}
