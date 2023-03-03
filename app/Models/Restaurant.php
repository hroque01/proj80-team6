<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'opening_time',
        'closure_time',
        'delivery',
        'delivery_price',
        'delivery_time',
        'image',


    ];

}
