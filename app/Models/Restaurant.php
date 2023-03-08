<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'address',
        'description',
        'opening_time',
        'closure_time',
        'delivery_price',
        'image',

    ];

     // 1 to 1 relations
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    // M to M relations
    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    // 1 to M relations
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    // 1 to M relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}