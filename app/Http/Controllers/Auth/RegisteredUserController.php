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
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['string'],
            'vat_number' => ['string'],
            'restaurant_description' => ['nullable', 'string', 'max:255'],
            'typologies' => ['required', 'array']
        ]);

        $user = User::create([
            'business_name' => $request->business_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'vat_number' => $request->vat_number,
        ]);
        
        $restaurant = $user->restaurant()->create([
            'description' => $request->restaurant_description,
        ]);

        $typologies = Typology::find($data['typologies']);
        $restaurant -> typologies() -> attach($typologies);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}