<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;

class MainController extends Controller
{
    public function home() {
        $restaurants = Restaurant::all();

        $dishes = Dish::all();


        return view('pages.home', compact('restaurants', 'dishes'));
    }

    public function dishCreate() {

        return view('pages.dishCreate');
    }

    public function dishStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        return redirect() -> route('/');
    }
}
