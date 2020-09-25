<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $casts = [
        'prepaidcost' => 'float',
        'postpaidcost' => 'float',
        'specs' => 'array'
    ];

    protected $fillable = [
        'brand',
        'model',
        'imageSrc',
        'specs',
        'prepaidcost',
        'postpaidcost',
    ];
}
