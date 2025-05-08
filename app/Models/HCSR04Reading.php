<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HCSR04Reading extends Model
{
    use HasFactory;

    protected $table = 'hc_sr04_readings';

    protected $fillable = [
        'distance',
    ];
}
