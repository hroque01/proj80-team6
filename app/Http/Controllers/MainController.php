<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Typology;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function home() {
        return redirect('login');
    }

    // Metodo per stampare in home lista restaurants, dishes:
    public function restaurant(Restaurant $restaurant) {
        $restaurants = Restaurant::all();

        $dishes = Dish::orderBy('name')->get();

        $user = Auth::user();

        $restaurant = Restaurant::find($user->id); 

        return view('pages.restaurant', compact('restaurants', 'dishes', 'restaurant'));
    }

    // Metodo Show dish
    public function dishShow(Dish $dish) {
        
        return view('pages.dishShow', compact('dish'));
    }

    // Metodo create dish (per form):
    public function dishCreate() {

        $restaurants = Restaurant::all();

        return view('pages.dishCreate', compact('restaurants'));
    }

    // Metodo create dish (per ricevere dati da form):
    public function dishStore(Request $request, Restaurant $restaurant) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable',
            'ingredients' => 'required',
            'price' => 'required|decimal:1,2',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $img_path  = Storage::put('dishes-image', $data['image']);
        $data['image'] = $img_path;

        $dish = Dish::make($data);

        $user = Auth::user();

        $restaurant = Restaurant::find($user->id); 

        $dish -> restaurant() -> associate($restaurant);
        $dish -> save();

        return redirect() -> route('restaurant', compact('restaurant'));
    }

    // Metodo delete dish:
    public function dishDelete(Dish $dish){

        $dish ->orders()->sync([]);
        $dish-> delete();

        return redirect()-> route('restaurant');
    }

    // Metodo edit dish(per form):
    public function dishEdit(Dish $dish) {
        
        $this->authorize('update-dish', $dish);
        
        $restaurants = Restaurant::all();
    
        return view('pages.dishEdit', compact('dish', 'restaurants'));
    }
    
    // Metodo update dish (per ricevere dati modificati da form):
    public function dishUpdate(Request $request, Dish $dish) {

        $this->authorize('update', $dish);

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable',
            'ingredients' => 'required',
            'price' => 'required|decimal:1,2',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'visible' => 'required|boolean',
        ]);

        $img_path  = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;

        $dish->update($data);

        $dish = Dish::find($dish->id);

        $restaurant = Restaurant::find($dish->restaurant_id);

        $dish->restaurant()->associate($restaurant);

        $dish->save();
        
        return redirect() -> route('restaurant');
    }

    // Metodo home orders:
    public function orderHome(Restaurant $restaurant) {

        $restaurants = Restaurant::all();

        $orders = Order::orderBy('create_date', 'desc')->get();

        $user = Auth::user();

        $restaurant = Restaurant::find($user->id); 

        return view('pages.orderHome', compact('restaurants', 'orders', 'restaurant'));
    }

    // Metodo Show order
    public function orderShow(Order $order) {
        
        return view('pages.orderShow', compact('order'));
    }

}


