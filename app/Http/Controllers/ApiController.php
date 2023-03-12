<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Typology;
use App\Models\Dish;
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


    //Chiamata della rotta '/api/v1/restaurant/filtered'
    public function getFilteredRestaurants(Request $request) {
        // Questo parametro è una lista di ID di tipologie selezionate dall'utente per filtrare i ristoranti che ritorna un ARRAY
        $selectedTypologies = $request->get('typologies', []);
    
        // Crea un oggetto query per recuperare i ristoranti della tabella 'restaurants'
        // La funzione with viene utilizzata per caricare le relazioni delle tipologie associate a ciascun ristorante
        $query = Restaurant::with('typologies');
    
        // Se l'array contiene elementi, filtra i ristoranti in base alle tipologie selezionate dall'utente
        if (count($selectedTypologies) > 0) {
            $query->whereHas('typologies', function ($q) use ($selectedTypologies) {
                $q->whereIn('typologies.id', $selectedTypologies);
            });
        }
    
        // Recupera tutte le tipologie nella tabella 'typologies'
        $typologies = Typology::all();
    
        // Recupera i ristoranti in base alla query definita sopra
        $restaurants = $query->get();
    
        // Restituisce la risposta come un oggetto JSON
        return response()->json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
                'restaurants' => $restaurants,
            ]
        ]);
    }
    

    public function getDishes() {
        $dishes = Dish::all();

        return response()->json([
            'success' => true,
            'response' => [
                'dishes' => $dishes,
            ]
        ]);
    }
}
