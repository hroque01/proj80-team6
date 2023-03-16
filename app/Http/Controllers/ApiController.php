<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Typology;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Order;

use Carbon\Carbon;

class ApiController extends Controller
{
    public function getAllTypologies() {

        // $typologies = Typology::all();
        $typologies = Typology::orderBy('name', 'asc')->get();
        
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
        $typologies = Typology::orderBy('name')->get();
    
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
    

    public function getDishesAndRestaurants(Restaurant $restaurant) {
        $dishes = $restaurant->dishes;

        $restaurants = Restaurant::all();
    
        return response()->json([
            'success' => true,
            'response' => [
                'dishes' => $dishes,
                'restaurants' => $restaurants,
            ]
        ]);
    }

    public function getOrders(Order $order) {

        $orders = Order::all();
    
        return response()->json([
            'success' => true,
            'response' => [
                'orders' => $orders,
            ]
        ]);
    }

    // Metodo per ordini:
    public function orderStore(Request $request, Restaurant $restaurant) {
        
        $data = $request->validate([
            'create_time' => 'date_format:H:i',
            'order_number' => 'string|unique:orders,order_number',
            'total' => 'required|decimal:1,2',
            'customer_name' => 'required|string|max:64',
            'address' => 'required|string|max:64',
            'email' => 'required|string|email|max:64',
            'phone_number' => 'required|string|max:32'
        ]);

        $order_number = rand(1, 1000);
        $data['order_number'] = $order_number;

        $create_time = Carbon::now('Europe/Rome')->format('H:i');

        $data['create_time'] = $create_time;

        $order = Order::make($data);

        $user = Auth::user();

        $restaurant = Restaurant::find($user->id); 

        $order -> restaurant() -> associate($restaurant);
        $order -> save();

        return response() -> json([
            'success' => true,
            'response' => $order
        ]);
    }
}
