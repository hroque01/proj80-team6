<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'image',

    ];

    // M to M relations
    public function restaurants() {
        return $this -> belongsToMany(Restaurant::class);
    }
}
