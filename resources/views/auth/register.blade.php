@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-reg">
                <div class="card-header header-reg">
                    <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- info personali --}}
                        <h5>Informazioni personali</h5>
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

                        <div class="mb-4 row">
                            <label for="password" class="star col-md-4 col-form-label text-md-right">{{ __('Crea una password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="almeno 8 caratteri" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="star col-md-4 col-form-label text-md-right">{{ __('Conferma la password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="almeno 8 caratteri" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- info attività --}}
                        <h5>Informazioni attività</h5>
                        <div class="mb-4 row">
                            <label for="vat_number" class="star col-md-4 col-form-label text-md-right">{{ __('La tua partita iva') }}</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="text" placeholder="24681012141" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required>

                                @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="business_name" class="star col-md-4 col-form-label text-md-right">{{ __('Ragione Sociale') }}</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text" placeholder="Ristorante Srl di Mario Rossi" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required>

                                @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="star col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" placeholder="Via Team Sei, 10 " class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="opening_time" class="star col-md-4 col-form-label text-md-right">{{ __('Orario apertura') }}</label>

                            <div class="col-md-6">
                                <input id="opening_time" type="time" class="form-control @error('opening_time') is-invalid @enderror" name="opening_time" value="{{ old('opening_time') }}" required>

                                @error('opening_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="closure_time" class="star col-md-4 col-form-label text-md-right">{{ __('Orario chiusura') }}</label>

                            <div class="col-md-6">
                                <input id="closure_time" type="time" class="form-control @error('opening_time') is-invalid @enderror" name="closure_time" value="{{ old('closure_time') }}" required>

                                @error('closure_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="delivery_price" class="star col-md-4 col-form-label text-md-right">{{ __('Prezzo consegna') }}</label>

                            <div class="col-md-6">
                                <input id="delivery_price" step=".01" type="number" placeholder="1.50" class="form-control @error('delivery_price') is-invalid @enderror" name="delivery_price" value="{{ old('delivery_price') }}" required >
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="image" class="star col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- info tipologia --}}
                        <h5>
                            Informazioni tipologia
                        </h5>
                        <p class="star">Quali delle seguenti cucine offre il tuo ristorante?</p>

                        <div class="row">
                            <div class="col-4">
                              @foreach ($typologies->take(5) as $typology)
                                <div class="typologies">
                                  <input type="checkbox" name="typologies[]" id="{{$typology->id}}" value="{{$typology -> id}}">
                                  <label for="typologies">{{$typology->name}}</label>
                                </div>
                              @endforeach
                            </div>
                            <div class="col-4">
                              @foreach ($typologies->slice(5, 4) as $typology)
                                <div class="typologies">
                                  <input type="checkbox" name="typologies[]" id="{{$typology->id}}" value="{{$typology -> id}}">
                                  <label for="typologies">{{$typology->name}}</label>
                                </div>
                              @endforeach
                            </div>
                            <div class="col-4">
                              @foreach ($typologies->slice(9, 4) as $typology)
                                <div class="typologies">
                                  <input type="checkbox" name="typologies[]" id="{{$typology->id}}" value="{{$typology -> id}}">
                                  <label for="typologies">{{$typology->name}}</label>
                                </div>
                              @endforeach
                            </div>
                          </div>
                          
                          
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" id="button">
                                    {{ __('Registra') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection