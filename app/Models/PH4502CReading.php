<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PH4502CReading extends Model
{
    use HasFactory;

    protected $table = 'ph4502c_readings';

    protected $fillable = [
        'ph_value',
    ];
}
