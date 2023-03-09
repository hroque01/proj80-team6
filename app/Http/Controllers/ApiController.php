<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Typology;
use App\Models\Restaurant;

class ApiController extends Controller
{
    public function getAllTypologies() {
        $typologies = Typology::all();

        return response()->json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
            ]
        ]);
    }

    public function getFilteredRestaurants(Request $request) {
        $selectedTypologies = $request->get('typologies', []);
        $query = Restaurant::with('typologies');
    
        if (count($selectedTypologies) > 0) {
            $query->whereHas('typologies', function ($q) use ($selectedTypologies) {
                $q->whereIn('typologies.id', $selectedTypologies);
            });
        }
    
        $restaurants = $query->get();
        $typologies = Typology::whereIn('id', $restaurants->flatMap(function ($restaurant) {
            return $restaurant->typologies->pluck('id');
        }))->get();
    
        return response()->json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
                'restaurants' => $restaurants,
            ]
        ]);
    }
}
