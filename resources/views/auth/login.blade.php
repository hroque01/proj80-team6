@extends('layouts.app')

@section('content')

<div class="wrapper-log">

    <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                
                <div class="card">

                    {{-- img background --}}
                    <div class="card-header header-form">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                    </div>

                    <div class="card-body">

                        {{-- form --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- email --}}
                            <div class="mb-4 row">
                                <label for="email" class="star col-md-4 col-form-label text-md-right">{{ __('Il tuo indirizzo e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="email@esempio.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="mb-4 row">
                                <label for="password" class="star col-md-4 col-form-label text-md-right">{{ __('La tua password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="almeno 8 caratteri" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ricorda password --}}
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricorda la password') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- login --}}
                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-log">
                                        {{ __('Log in') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn" href="{{ route('password.request') }}">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="new-account mb-4 row mt-5">
                                <div class="col text-center">
                                    <div>Sei nuovo su <span>Deliveboo</span>?</div>
                                    <a href="/register">Crea il tuo account</a>
                                </div>
                            </div>
                        </form>
                        {{-- chiusura form --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    


@endsection
