<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'ingredients',
        'price',
        'image',
        'visible',

    ];

    //1 to M relation
    public function restaurants() {
        return $this -> belongsTo(Restaurant::class);
    }
    //M to M relation
    public function orders() {
        return $this -> belongsToMany(Order::class);
    }
}
