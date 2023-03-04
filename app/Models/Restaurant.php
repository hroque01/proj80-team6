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

    // M to M relations
    public function typologies() {
        return $this -> belongsToMany(Typology::class);
    }

    // 1 to M relations
    public function dishes() {
        return $this -> hasMany(Dish::class);
    }

    public function orders() {
        return $this -> hasMany(Order::class);
    }

    // 1 to 1 relations
    public function user() {
        return $this -> belongsTo(User::class);
    }

}
