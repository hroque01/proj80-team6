<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function home(Request $request) {
        $restaurants = Restaurant::all();

        $dishes = Dish::all();

        return view('pages.home', compact('restaurants', 'dishes'));
    }

//     public function home()
// {
//     // Recupera l'id dello user loggato (forse è inutile)
//     $user_id = Auth::user()->id();

//     // Recupera l'id del ristorante associato allo user loggato
//     $restaurant_id = Auth::user()->restaurant_id;

//     // Recupera tutti i piatti che hanno l'id del ristorante dell'utente loggato
//     $dishes = Dish::where('restaurant_id', $restaurant_id)->get();

//     // Recupera il nome del ristorante dell'utente loggato
//     $restaurant_name = User::find($user_id)->business_name;

//     return view('dashboard', compact('dishes', 'restaurant_name'));
// }

    // METODO CREATE DISH:
    public function dishCreate() {

        $restaurants = Restaurant::all();

        return view('pages.dishCreate', compact('restaurants'));
    }

    public function dishStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable',
            'ingredients' => 'required',
            'price' => 'required|decimal:1,2',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'restaurant_id' => 'required|integer',
        ]);

        $img_path  = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;

        $dish = Dish::make($data);
        $restaurant = Restaurant::find($data['restaurant_id']);

        $dish -> restaurant() -> associate($restaurant);
        $dish -> save();

        return redirect() -> route('dishCreate');
    }

    // METODO DELETE DISH:
    public function dishDelete(Dish $dish){

        $dish ->orders()->sync([]);
        $dish-> delete();

        return redirect()-> route('home');
    }
}


