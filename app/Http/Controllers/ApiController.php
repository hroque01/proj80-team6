<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Typology;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Order;
use App\Mail\NewOrder;


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
            'response' => $orders,
        ]);
    }

    // Metodo per ordini:
    public function orderStore(Request $request) {
        
        $data = $request->validate([
            'create_date' => 'required|date',
            'create_time' => 'required|date_format:H:i',
            'order_number' => 'required|string',
            'total' => 'required|decimal:1,2',
            'customer_name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'restaurant_id' => 'required|integer',
            'completed' => 'filled|boolean',

            // Info carta pagamento
            //'card_number' => 'required|string',
            //'expiration_date' => 'required|string'
        ]);

        $order_number = rand(1, 1000);
        $data['order_number'] = $order_number;

        $create_time = Carbon::now('Europe/Rome')->format('H:i');
        $data['create_time'] = $create_time;

        $create_date = Carbon::now();
        $data['create_date'] = $create_date;

        $email = $data['email'];

        // $completed = (bool) rand(0, 1);
        // $data['completed'] = $completed;

        // $card_number = rand(100000, 999999);
        // $data['card_number'] = $card_number;

        // $expiration_date = rand(1000, 9999);
        // $data['expiration_date'] = $expiration_date;

        $order = Order::make($data);

        $restaurantId = $data['restaurant_id'];
        $restaurant = Restaurant::find($restaurantId); 

        $order -> restaurant() -> associate($restaurant);
        $order -> save();

        Mail::to($email)
            -> send(new NewOrder($order));

        return response() -> json([
            'success' => true,
            'response' => $order
        ]);
    }
}