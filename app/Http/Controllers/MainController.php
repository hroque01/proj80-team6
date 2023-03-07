<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;

use Illuminate\Support\Facades\Storage;

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
            'ingredients' => 'required|string',
            'price' => 'required|decimal:1',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $img_path  = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;

        $dish = Dish::create($data);

	    $dish -> save();

        return redirect() -> route('/');
    }
}
