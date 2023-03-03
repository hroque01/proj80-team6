<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'password',
        'email',
        'address',
        'vat_number',
    ];

    // 1 to 1 relation
    public function restaurant() {
        return $this -> belongsTo(Restaurant::class);
    }
}
