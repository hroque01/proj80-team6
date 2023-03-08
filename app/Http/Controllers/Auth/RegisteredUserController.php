<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Typology;
use App\Models\Restaurant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology::all();

        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:64', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:64'],
            'vat_number' => ['required', 'string', 'min:11', 'numeric', 'unique:users,vat_number'],
            'business_name' => ['required', 'string', 'max:64'],
            'description' => ['nullable'],
            'opening_time' => ['required', 'string'],
            'closure_time' => ['required', 'string'],
            'delivery_price' => ['required', 'decimal:1,2'],
            'typologies' => ['required', 'array'],
            'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'vat_number' => $request->vat_number,
        ]);
        
        $restaurant = $user->restaurant()->create([
            'business_name' => $request->business_name,
            'description' => $request->description,
            'address' => $request->address,
            'opening_time' => $request->opening_time,
            'closure_time' => $request->closure_time,
            'delivery_price' => $request->delivery_price,
            'image' => $request->image
        ]);

        $img_path  = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;

        $typologies = Typology::find($data['typologies']);
        $restaurant -> typologies() -> attach($typologies);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}