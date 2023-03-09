<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Typology;
use App\Models\Restaurant;

class ApiController extends Controller
{
    public function getAllTypologies() {

        $typologies = Typology :: all();

        return response() -> json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
            ]
        ]);

    }

    public function getAllRestaurantsAllTypologies() {

        $typologies = Typology :: all();

        $restaurants = Restaurant :: all();


        return response() -> json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
                'restaurants' => $restaurants,
            ]
        ]);

    }
}
