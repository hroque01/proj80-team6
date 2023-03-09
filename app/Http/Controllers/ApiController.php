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


    //Chiamata della rotta '/api/v1/restaurant/filtered'
    public function getFilteredRestaurants(Request $request) {

        //Questo parametro è una lista di ID di tipologie selezionate dall'utente per filtrare i ristoranti che ritorna un ARRAY
        $selectedTypologies = $request->get('typologies', []);

        //crea un oggetto query per recuperare i ristoranti della tabella 'restaurants'
        //La funzione with viene utilizzata per caricare le relazioni delle tipologie associate a ciascun ristorante
        $query = Restaurant::with('typologies');
        
        //SE l'array contiente gli elementi
        if (count($selectedTypologies) > 0) {

            //whereHas = clausola permette di filtrare i ristoranti
            //WhereIn = la tipologia dei ristoranti che hanno un ID contenuto nell'array
            $query->whereHas('typologies', function ($q) use ($selectedTypologies) {
                $q->whereIn('typologies.id', $selectedTypologies);
            });
        }
        
        //la query per recuperare i ristoranti
        $restaurants = $query->get();

        //si recuperano le tipologie associate a questi ristoranti nella tabella 'typologies' utilizzando la funzione whereIn, che cerca nella colonna "id" i valori presenti nell'array
        $typologies = Typology::whereIn('id', $restaurants->flatMap(function ($restaurant) {
            return $restaurant->typologies->pluck('id');
        }))->get();
        
        //Viene restituita la risposta come un oggetto JSON
        return response()->json([
            'success' => true,
            'response' => [
                'typologies' => $typologies,
                'restaurants' => $restaurants,
            ]
        ]);
    }
}
