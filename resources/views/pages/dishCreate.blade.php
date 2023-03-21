@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card create-crud">

                    {{-- logo --}}
                    <div class="card-header header-form">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                    </div>

                    <div class="card-body">
                        <h5 class="mt-3 mb-5">Aggiungi un nuovo piatto al tuo men&ugrave;</h5>

                        {{-- form --}}
                        <form method="POST" action="{{ route('dishStore') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="mb-4 row">
                                <label for="name" class="star col-md-3 col-form-label text-md-right">Nome del piatto</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Fai un po' di prove" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Descrizione</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" required></textarea>
                                    
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="ingredients" class="star col-md-3 col-form-label text-md-right">Ingredienti</label>
                                <div class="col-md-6">
                                    <input type="text" name="ingredients" class="form-control" placeholder="Ingredienti">
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="price" class="star col-md-3 col-form-label text-md-right">Prezzo</label>
                                <div class="col-md-6">
                                    <input type="number" step=".01" name="price" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image" class="star col-md-3 col-form-label text-md-right">Immagine</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4 row mt-5">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Aggiungi" class="btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        

            

    </div>   

@endsection