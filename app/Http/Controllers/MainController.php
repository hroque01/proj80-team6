<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Typology;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function home(Typology $typology) {

        $restaurants = Restaurant::all();

        $typologies = Typology::all();

        return view('pages.home', compact('restaurants', 'typologies', 'typology'));

    }

    public function restaurant(Restaurant $restaurant) {
        $restaurants = Restaurant::all();

        $dishes = Dish::all();

        $user = Auth::user();

        $restaurant = Restaurant::find($user->id); 

        return view('pages.restaurant', compact('restaurants', 'dishes', 'restaurant'));
    }

    // Metodo create (per form):
    public function dishCreate() {

        $restaurants = Restaurant::all();

        return view('pages.dishCreate', compact('restaurants'));
    }

    // Metodo create (per ricevere dati da form):
    public function dishStore(Request $request, Restaurant $restaurant) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable',
            'ingredients' => 'required',
            'price' => 'required|decimal:1,2',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $img_path  = Storage::put('uploads', $data['image']);
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

    // Metodo edit (per form):
    public function dishEdit(Dish $dish) {
        
        $restaurants = Restaurant::all();

        return view('pages.dishEdit', compact('dish', 'restaurants'));
    }

    // Metodo update (per ricevere dati modificati da form):
    public function dishUpdate(Request $request, Dish $dish) {

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
}


