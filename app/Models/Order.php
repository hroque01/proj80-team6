<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'create_time',
        'order_number',
        'total',
        'customer_name',
        'customer_surname',
        'address',
        'email',
        'phone_number',

    ];

    //M to M relation
    public function dishes() {
        return $this -> belongsToMany(Dish::class);
    }

    //1 to M relation
    public function restaurant() {
        return $this -> belongsTo(Restaurant::class);
    }
}
